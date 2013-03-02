<?php
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 10);

# DESCRIPTION
$this->PhpExcel->xls->getProperties()->setCreator("Citra Kencana Apps")
		->setLastModifiedBy("Citra Kencana Apps")
		->setTitle("Data Supplier")
		->setSubject("Data Supplier")
		->setDescription("Data Supplier Citra Kencana, created with PHPExcel")
		->setKeywords("Data Supplier Citra Kencana")
		->setCategory("Daftar");

$this->PhpExcel->addMergedData(array(
	'PERATURAN DAERAH KABUPATEN TANJUNG JABUNG BARAT',
	'NOMOR 7 TAHUN 2011 TENTANG RETRIBUSI PELAYANAN KESEHATAN',
	'PADA RUMAH SAKIT DAERAH K.H. DAUD ARIF KUALA TUNGKAL',
	'Jl. Syarif Hidayatullah No.14 Kode Pos. 36514 Telp. (0742) 21621 Kuala Tungkal',
	'',
		), 'A', 'F');

for ($i = '1'; $i <= '4'; $i++) {
	$this->PhpExcel->setFontFormatting('A' . $i, 'bold');
}
$this->PhpExcel->setBorder('A4:F4', 'bottom', 1);

# header differentiated by serviceGrade
$registrationType = '';
switch ($checkout['Checkout']['service_grade']) {
	case '0':
		$registrationType = 'Instalasi Pelayanan: Ruangan ICU / ICCU / HCU';
		break;
	case '1':
		$registrationType = 'Instalasi Pelayanan: Rawat Inap Ruangan VIP';
		break;
	case '2':
		$registrationType = 'Instalasi Pelayanan: Rawat Inap Kelas Utama';
		break;
	case '3':
		$registrationType = 'Instalasi Pelayanan: Rawat Inap Kelas I';
		break;
	case '4':
		$registrationType = 'Instalasi Pelayanan: Rawat Inap Kelas II';
		break;
	case '5':
		$registrationType = 'Instalasi Pelayanan: Rawat Inap Kelas III';
		break;
	default:
		$registrationType = 'Instalasi Pelayanan: Rawat Jalan';
		break;
}

# patient age:
$now = strtotime($checkout['Checkout']['created_date']);
$born = ($person['Person']['person_birth_date'] == '') ? $now : strtotime($person['Person']['person_birth_date']);
$second_diff = $now - $born;
$age_month = floor($second_diff/3600/24/30.5);
$age_year = floor($second_diff/3600/24/365);
$age = ($age_month >= 12) ? $age_year . ' thn' : $age_month . ' bln' ;
$name = $person['Person']['person_first_name'] . ' ' . $person['Person']['person_last_name'];
$no = $checkout['PatientRegistration']['id'];

$this->PhpExcel->xls->getActiveSheet()->mergeCells('A' . $this->PhpExcel->row . ':' . 'B' . $this->PhpExcel->row);
$this->PhpExcel->xls->getActiveSheet()->mergeCells('C' . $this->PhpExcel->row . ':' . 'F' . $this->PhpExcel->row);
$this->PhpExcel->addData(array($registrationType, '', 'Kuala Tungkal, ' . date('d F Y'), '', '', ''));
$this->PhpExcel->xls->getActiveSheet()->mergeCells('A' . $this->PhpExcel->row . ':' . 'B' . $this->PhpExcel->row);
$this->PhpExcel->xls->getActiveSheet()->mergeCells('C' . $this->PhpExcel->row . ':' . 'F' . $this->PhpExcel->row);
$this->PhpExcel->addData(array("Nama Pasien: $name, Umur: $age, No. $no", '', 'Provider: ', '', '', ''));
$this->PhpExcel->xls->getActiveSheet()->mergeCells('A' . $this->PhpExcel->row . ':' . 'B' . $this->PhpExcel->row);
$this->PhpExcel->xls->getActiveSheet()->mergeCells('C' . $this->PhpExcel->row . ':' . 'F' . $this->PhpExcel->row);
$this->PhpExcel->addData(array('No. Register: ' . $checkout['PatientRegistration']['id'], '', 'Teller/Kasir: ', '', '', ''));
$this->PhpExcel->addData(array(''));

# header alignment
$this->PhpExcel->setAlignment('10', 'center');

$table = array(
	array('label' => __('No'), 'width' => '4', 'filter' => false),
	array('label' => __('Jenis Layanan'), 'width' => '72', 'filter' => false),
	array('label' => __('Tarif'), 'width' => '13'),
	array('label' => __('Satuan'), 'width' => '15', 'wrap' => false),
	array('label' => __('Jumlah'), 'width' => '7'),
	array('label' => __('Total'), 'width' => '14'),
);

// heading
$this->PhpExcel->addTableHeader($table, array('offset' => '0', 'name' => 'Cambria', 'bold' => true));

// Number format
#$this->PhpExcel->setNumberFormat('C');
#$this->PhpExcel->setNumberFormat('F');
$dataCount = count($checkout['CheckoutDetail']);
// data
$i = 0;
foreach ($checkout['CheckoutDetail'] as $checkoutDetail) {
	$i++;
	$this->PhpExcel->addTableRow(array(
		$i,
		$checkoutDetail['ServiceType']['type_of_service'],
		$checkoutDetail['cd_cost'],
		$this->Converter->serviceTypeUnit($checkoutDetail['ServiceType']['unit']),
		$checkoutDetail['cd_qty'],
		$checkoutDetail['cd_cost'] * $checkoutDetail['cd_qty'],
	));
}

$row = $this->PhpExcel->row - 1;
$this->PhpExcel->setBorder('A10:' . 'F' . $row, 'allborders', 1);
$this->PhpExcel->setBorder('F' . $this->PhpExcel->row . ':' . 'F' . $this->PhpExcel->row, 'allborders', 1);
$this->PhpExcel->addData(array('', '', 'Jumlah yang harus Dibayar', '', '', '=SUM(F10:F' . $row . ')'));
$this->PhpExcel->xls->getActiveSheet()->mergeCells('C' . ($row + 1) . ':' . 'E' . ($row + 1));
$this->PhpExcel->addTableFooter();

$this->PhpExcel->addMergedData(array(
	'',
	'Bill dibuat rangkap 5 (Asli: Pasien, Lembar2: Kasir, Lembar3: DPPKAD, Lembar4: Banwasda, Lember5: Arsip Instalasi Pelayanan',
		), 'A', 'F', 'left');

$this->PhpExcel->output();
exit();
?>
<div class="checkouts view">

    <table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td width="20%"><?php echo __('Patient Registration'); ?></td>
			<td><?php echo $this->Html->link($checkout['PatientRegistration']['id'], array('controller' => 'patient_registrations', 'action' => 'view', $checkout['PatientRegistration']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Service Grade'); ?></td>
			<td><?php echo $this->Converter->serviceGrade($checkout['Checkout']['service_grade']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Total Cost'); ?></td>
			<td>Rp <?php echo number_format($checkout['Checkout']['total_cost'], 0, ',', '.'); ?>,-</td>
		</tr>
		<tr>
			<td><?php echo __('Note'); ?></td>
			<td><?php echo h($checkout['Checkout']['note']); ?></td>
		</tr>

    </table>
</div>


<div class="checkoutDetails index">
    <div class="buttonWrapper clearfix">
		<span class="btnClose last">
			<?php echo $this->Html->link(__('Simpan Excel'), array('controller' => 'to_excel', 'action' => 'checkout', $checkout['Checkout']['id']), array('class' => 'linkIco icoAdd')); ?>
		</span>
        <div style="float: right;">
            <span class="btnClose last">
				<?php echo $this->Html->link(__('Jenis Layanan'), array('controller' => 'checkout_details', 'action' => 'add', $checkout['Checkout']['id']), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
			<th>Jenis Layanan</th>
			<th>Tarif</th>
			<th>Satuan</th>
			<th>Jumlah</th>
			<th>Total</th>
			<th width="150px"><?php echo __('Actions'); ?></th>
        </tr>
		<?php $i = $this->Paginator->counter('{:start}'); ?>
		<?php $gtotal = 0; ?>
		<?php foreach ($checkoutDetails as $checkoutDetail): ?>
			<?php $gtotal += $checkoutDetail['CheckoutDetail']['cd_qty'] * $checkoutDetail['CheckoutDetail']['cd_cost']; ?>
			<tr>
				<td><?php echo $i++; ?>.</td>
				<td>
					<?php echo $this->Html->link($checkoutDetail['ServiceType']['type_of_service'], array('controller' => 'service_types', 'action' => 'view', $checkoutDetail['ServiceType']['id'])); ?>
				</td>
				<td><?php echo number_format($checkoutDetail['CheckoutDetail']['cd_cost'], 0, ',', '.'); ?>&nbsp;</td>
				<td><?php echo number_format($checkoutDetail['ServiceType']['unit'], 0, ',', '.'); ?>&nbsp;</td>
				<td><?php echo h($checkoutDetail['CheckoutDetail']['cd_qty']); ?>&nbsp;</td>
				<td><?php echo number_format($checkoutDetail['CheckoutDetail']['cd_qty'] * $checkoutDetail['CheckoutDetail']['cd_cost'], 0, ',', '.'); ?>&nbsp;</td>
				<td>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'checkout_details', 'action' => 'delete', $checkoutDetail['CheckoutDetail']['id']), array('class' => 'link delete'), __('Are you sure you want to delete %s?', $checkoutDetail['CheckoutDetail']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td class="right">TOTAL</td>
			<td><?php echo number_format($gtotal, 0, ',', '.'); ?>&nbsp;</td>
			<td><?php echo $this->Html->link('CETAK', array('action' => 'printout')); ?>&nbsp;</td>
		</tr>
    </table>

	<?php echo $this->element('admPagination'); ?>

</div>

