<div class="people view">

    <h1><?php echo __('Pegawai'); ?></h1>

    <table width="100%" cellpadd	ing="0" cellspacing="0">
		<tr>
			<td width="20%"><?php echo __('Nama Depan'); ?></td>
			<td><?php echo h($person['Person']['person_first_name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Nama Belakang'); ?></td>
			<td><?php echo h($person['Person']['person_last_name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Panggilan'); ?></td>
			<td><?php echo h($person['Person']['person_salutation']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Jenis Kelamin'); ?></td>
			<td><?php echo h($person['Person']['person_gender']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Ic No'); ?></td>
			<td><?php echo h($person['Person']['person_ic_no']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('No. Pajak (NPWP)'); ?></td>
			<td><?php echo h($person['Person']['person_tax_no']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Alamat'); ?></td>
			<td><?php echo h($person['Person']['person_email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Kota / Propinsi / Kode Pos'); ?></td>
			<td><?php echo h($person['Person']['person_city']) . ' / ' . $person['Person']['person_province'] . ' / ' . $person['Person']['person_zip_code']; ?></td>
		</tr>
		<tr>
			<td><?php echo __('Email'); ?></td>
			<td><?php echo h($person['Person']['person_email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Telepon Rumah'); ?></td>
			<td><?php echo h($person['Person']['person_home_phone']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Telepon Kantor'); ?></td>
			<td><?php echo h($person['Person']['person_mobile_phone']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Tempat, Tanggal Lahir'); ?></td>
			<td><?php echo h($person['Person']['person_birth_place']) . ', ' . $person['Person']['person_birth_date']; ?></td>
		</tr>
		<tr>
			<td><?php echo __('Status Perkawinan'); ?></td>
			<td><?php echo h($person['Person']['person_marital_status']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Pendidikan Terakhir'); ?></td>
			<td><?php echo h($person['Person']['person_last_education']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Pekerjaan'); ?></td>
			<td><?php echo h($person['Person']['person_occupation']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Agama'); ?></td>
			<td><?php echo h($person['Person']['person_religion']); ?></td>
		</tr>

    </table>

	<?php echo $this->element('btnBack'); ?>
</div>