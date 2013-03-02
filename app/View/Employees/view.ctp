<div class="people view">

    <h1><?php echo __('Pegawai'); ?></h1>

    <table width="100%" cellpadd	ing="0" cellspacing="0">
		<tr>
			<td width="20%"><?php echo __('Nama Depan'); ?></td>
			<td><?php echo h($employee['Person']['person_first_name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Nama Belakang'); ?></td>
			<td><?php echo h($employee['Person']['person_last_name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Panggilan'); ?></td>
			<td><?php echo h($employee['Person']['person_salutation']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Jenis Kelamin'); ?></td>
			<td><?php echo h($employee['Person']['person_gender']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Ic No'); ?></td>
			<td><?php echo h($employee['Person']['person_ic_no']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('No. Pajak (NPWP)'); ?></td>
			<td><?php echo h($employee['Person']['person_tax_no']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Alamat'); ?></td>
			<td><?php echo h($employee['Person']['person_email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Kota / Propinsi / Kode Pos'); ?></td>
			<td><?php echo h($employee['Person']['person_city']) . ' / ' . $employee['Person']['person_province'] . ' / ' . $employee['Person']['person_zip_code']; ?></td>
		</tr>
		<tr>
			<td><?php echo __('Email'); ?></td>
			<td><?php echo h($employee['Person']['person_email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Telepon Rumah'); ?></td>
			<td><?php echo h($employee['Person']['person_home_phone']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Telepon Kantor'); ?></td>
			<td><?php echo h($employee['Person']['person_mobile_phone']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Tempat, Tanggal Lahir'); ?></td>
			<td>
				<?php echo h($employee['Person']['person_birth_place']) . ', ' . $employee['Person']['person_birth_date']; ?>
				<?php
				# age:
				$now = strtotime(date('Y-m-d'));
				$born = ($employee['Person']['person_birth_date'] == '') ? $now : strtotime($employee['Person']['person_birth_date']);
				$second_diff = $now - $born;
				$age_month = floor($second_diff / 3600 / 24 / 30.5);
				$age_year = floor($second_diff / 3600 / 24 / 365);
				$age = ($age_month >= 12) ? $age_year . ' thn' : $age_month . ' bln';
				echo " ($age)";
				?>
			</td>
		</tr>
		<tr>
			<td><?php echo __('Status Perkawinan'); ?></td>
			<td><?php echo h($employee['Person']['person_marital_status']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Pendidikan Terakhir'); ?></td>
			<td><?php echo h($employee['Person']['person_last_education']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Pekerjaan'); ?></td>
			<td><?php echo h($employee['Person']['person_occupation']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Agama'); ?></td>
			<td><?php echo $this->Converter->religion($employee['Person']['person_religion']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Posisi'); ?></td>
			<td><?php echo h($employee['Employee']['position']); ?></td>
		</tr>

    </table>

	<?php echo $this->element('btnBack'); ?>
</div>