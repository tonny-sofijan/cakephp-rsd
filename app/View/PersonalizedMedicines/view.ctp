<div class="personalizedMedicines view">

    <h1><?php echo __('Rincian Obat Racik'); ?></h1>

    <table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td width="20%"><?php echo __('No. Seri Obat'); ?></td>
			<td><?php echo h($personalizedMedicine['PersonalizedMedicine']['serial']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Nama Obat'); ?></td>
			<td><?php echo h($personalizedMedicine['PersonalizedMedicine']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Merk Obat'); ?></td>
			<td><?php echo h($personalizedMedicine['PersonalizedMedicine']['brand']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Jenis Obat'); ?></td>
			<td><?php echo h($personalizedMedicine['PersonalizedMedicine']['type']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Kategori Obat'); ?></td>
			<td><?php echo h($personalizedMedicine['PersonalizedMedicine']['category']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Harga Modal'); ?></td>
			<td><?php echo number_format($personalizedMedicine['PersonalizedMedicine']['price_of_capital'], 0, ',', '.'); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Harga Jual'); ?></td>
			<td><?php echo number_format($personalizedMedicine['PersonalizedMedicine']['selling_price'], 0, ',', '.'); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Stok Obat'); ?></td>
			<td><?php echo number_format($personalizedMedicine['PersonalizedMedicine']['stock'], 0, ',', '.'); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Satuan / Ukuran'); ?></td>
			<td><?php echo $this->Converter->medicineUnits($personalizedMedicine['PersonalizedMedicine']['unit_of_measure']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Tanggal Rekam Medis'); ?></td>
			<td><?php echo h($personalizedMedicine['PersonalizedMedicine']['created_date']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Terakhir diubah'); ?></td>
			<td><?php echo h($personalizedMedicine['PersonalizedMedicine']['updated_date']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Dibuat oleh'); ?></td>
			<td><?php echo h($personalizedMedicine['PersonalizedMedicine']['created_by']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Diubah oleh'); ?></td>
			<td><?php echo h($personalizedMedicine['PersonalizedMedicine']['updated_by']); ?></td>
		</tr>
    </table>

	<?php echo $this->element('btnBack'); ?>
</div>