<div class="patients form">

    <h1><?php echo __('Tambah Pasien'); ?></h1>

	<?php echo $this->Form->create('Patient'); ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="patient_no"><?php echo __('No. Pasien'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('patient_no', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_10 numbersOnly',
					'type' => 'text'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_salutation"><?php echo __('Panggilan'); ?></label></td>
            <td><?php echo $this->Form->select('Person.person_salutation', $this->Constant->getSalutationList(), array('empty' => false, 'value' => isset($this->request->data['Person']['person_salutation']) ? $this->request->data['Person']['person_salutation'] : '')); ?></td>
        </tr>
        <tr>
            <td><label for="person_first_name"><?php echo __('Nama Depan'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_first_name', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_20'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_last_name"><?php echo __('Nama Belakang'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_last_name', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_20'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_gender"><?php echo __('Jenis Kelamin'); ?></label></td>
            <td><?php echo $this->Form->select('Person.person_gender', $this->Constant->getGenderList(), array('empty' => false, 'value' => isset($this->request->data['Person']['person_gender']) ? $this->request->data['Person']['person_gender'] : '')); ?></td>
        </tr>
        <tr>
            <td><label for="person_birth_place"><?php echo __('Tempat Lahir'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_birth_place', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_20'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_birth_date"><?php echo __('Tanggal Lahir'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_birth_date', array(
					'label' => false,
					'div' => false,
					'type' => 'text',
					'class' => 'text w_10 datepicker'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_religion"><?php echo __('Agama'); ?></label></td>
            <td>
				<?php
				echo $this->Form->select('Person.person_religion', $this->Constant->getReligionList(), array('empty' => false))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_ic_no"><?php echo __('No. IC'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_ic_no', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_20'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_tax_no"><?php echo __('No. Pajak (NPWP)'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_tax_no', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_20'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="patient_guarantor"><?php echo __('Penjamin Pasien'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('patient_guarantor', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_20'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="note"><?php echo __('Catatan Pasien'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('note', array(
					'label' => false,
					'div' => false,
					'class' => 'text'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_address"><?php echo __('Alamat'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_address', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_40'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_city"><?php echo __('Kota'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_city', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_15'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_province"><?php echo __('Propinsi'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_province', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_15'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_zip_code"><?php echo __('Kode Pos'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_zip_code', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_5 numbersOnly',
					'style' => 'text-align: left',
					'type' => 'text'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_email"><?php echo __('Email'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_email', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_20'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_home_phone"><?php echo __('Telp. Rumah'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_home_phone', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_20'
				))
				?>
            </td>
        </tr>
        <tr>
            <td><label for="person_mobile_phone"><?php echo __('Telp. Selular'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_mobile_phone', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_20'
				))
				?>
            </td>
        </tr>        
        <tr>
            <td><label for="person_marital_status"><?php echo __('Status Menikah'); ?></label></td>
            <td><?php echo $this->Form->select('Person.person_marital_status', $this->Constant->getMaritalStatusList(), array('empty' => false, 'value' => isset($this->request->data['Person']['person_marital_status']) ? $this->request->data['Person']['person_marital_status'] : '')); ?></td>
        </tr>
        <tr>
            <td><label for="person_last_education"><?php echo __('Pendidikan Terakhir'); ?></label></td>
            <td><?php echo $this->Form->select('Person.person_last_education', $this->Constant->getLastEducationList(), array('empty' => false, 'value' => isset($this->request->data['Person']['person_last_education']) ? $this->request->data['Person']['person_last_education'] : '')); ?></td>
        </tr>
        <tr>
            <td><label for="person_occupation"><?php echo __('Pekerjaan'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_occupation', array(
					'label' => false,
					'div' => false,
					'class' => 'text w_20'
				))
				?>
            </td>
        </tr>

        <tr>
            <td><label for="person_note"><?php echo __('Keterangan'); ?></label></td>
            <td>
				<?php
				echo $this->Form->input('Person.person_note', array(
					'label' => false,
					'div' => false,
					'class' => 'text'
				))
				?>
            </td>
        </tr>
    </table>

	<?php echo $this->element('btnSaveUpdate', array('formId' => 'PatientAddForm', 'text' => __('Simpan'))); ?>    
	<?php echo $this->Form->end(); ?>
</div>