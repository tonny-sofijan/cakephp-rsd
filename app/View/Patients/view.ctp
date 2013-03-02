<div class="people view">

    <h1><?php echo __('Data Pasien'); ?></h1>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td  colspan="2"><strong><?php echo $this->Html->link('Lihat Rekam Medis', array('action' => 'medical_records', $patient['Patient']['id'])); ?></strong></td>
        </tr>
        <tr>
            <td width="20%"><?php echo __('No. Pasien'); ?></td>
            <td><?php echo h($patient['Patient']['patient_no']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Panggilan'); ?></td>
            <td><?php echo $this->Converter->salutation($patient['Person']['person_salutation']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Nama Depan'); ?></td>
            <td><?php echo h($patient['Person']['person_first_name']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Nama Belakang'); ?></td>
            <td><?php echo h($patient['Person']['person_last_name']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Jenis Kelamin'); ?></td>
            <td><?php echo $this->Converter->gender($patient['Person']['person_gender']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Tempat, Tanggal Lahir'); ?></td>
            <td>
				<?php echo h($patient['Person']['person_birth_place']) . ', ' . $patient['Person']['person_birth_date']; ?>
				<?php
				# age:
				$now = strtotime(date('Y-m-d'));
				$born = ($patient['Person']['person_birth_date'] == '') ? $now : strtotime($patient['Person']['person_birth_date']);
				$second_diff = $now - $born;
				$age_month = floor($second_diff / 3600 / 24 / 30.5);
				$age_year = floor($second_diff / 3600 / 24 / 365);
				$age = ($age_month >= 12) ? $age_year . ' thn' : $age_month . ' bln';
				echo " ($age)";
				?>
			</td>
        </tr>
        <tr>
            <td><?php echo __('Agama'); ?></td>
            <td><?php echo $this->Converter->religion($patient['Person']['person_religion']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Ic No'); ?></td>
            <td><?php echo h($patient['Person']['person_ic_no']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('No. Pajak (NPWP)'); ?></td>
            <td><?php echo h($patient['Person']['person_tax_no']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Penjamin Pasien'); ?></td>
            <td><?php echo h($patient['Patient']['patient_guarantor']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Catatan Pasien'); ?></td>
            <td><?php echo h($patient['Patient']['note']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Alamat'); ?></td>
            <td><?php echo h($patient['Person']['person_email']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Kota / Propinsi / Kode Pos'); ?></td>
            <td><?php echo h($patient['Person']['person_city']) . ' / ' . $patient['Person']['person_province'] . ' / ' . $patient['Person']['person_zip_code']; ?></td>
        </tr>
        <tr>
            <td><?php echo __('Email'); ?></td>
            <td><?php echo h($patient['Person']['person_email']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Telepon Rumah'); ?></td>
            <td><?php echo h($patient['Person']['person_home_phone']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Telepon Kantor'); ?></td>
            <td><?php echo h($patient['Person']['person_mobile_phone']); ?></td>
        </tr>        
        <tr>
            <td><?php echo __('Status Menikah'); ?></td>
            <td><?php echo $this->Converter->maritalStatus($patient['Person']['person_marital_status']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Pendidikan Terakhir'); ?></td>
            <td><?php echo $this->Converter->lastEducation($patient['Person']['person_last_education']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Pekerjaan'); ?></td>
            <td><?php echo h($patient['Person']['person_occupation']); ?></td>
        </tr>        
        <tr>
            <td><?php echo __('Keterangan'); ?></td>
            <td><?php echo h($patient['Patient']['note']); ?></td>
        </tr>
    </table>

    <?php echo $this->element('btnBack'); ?>
</div>

<div class="medicalRecords index">
    <h3><?php echo __('Rekam Medis'); ?></h3>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('patient_registration_id', 'Reg. ID'); ?></th>
            <th><?php echo $this->Paginator->sort('created_date', 'Tanggal'); ?></th>
            <th><?php echo $this->Paginator->sort('doctor_id', 'Dokter'); ?></th>
            <th><?php echo $this->Paginator->sort('irc10_id', 'Kode ICD10'); ?></th>
            <th><?php echo $this->Paginator->sort('prescription_id', 'Resep'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
        <?php foreach ($medicalRecords as $medicalRecord): ?>
            <tr>
                <td><?php echo h($medicalRecord['MedicalRecord']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($medicalRecord['PatientRegistration']['id'], array('controller' => 'patient_registrations', 'action' => 'view', $medicalRecord['PatientRegistration']['id'])); ?>
                </td>
                <td><?php echo h($medicalRecord['MedicalRecord']['created_date']); ?>&nbsp;</td>
                <td><?php echo h($medicalRecord['MedicalRecord']['doctor_id']); ?>&nbsp;</td>
                <td><?php echo h($medicalRecord['MedicalRecord']['icd10_id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($medicalRecord['Prescription']['id'], array('controller' => 'prescriptions', 'action' => 'view', $medicalRecord['Prescription']['id'])); ?>
                </td>
                <td class="actions">
                    <!--?php echo $this->Html->link(__('Resep'), array('controller' => 'medical_records', 'action' => 'add', $medicalRecord['MedicalRecord']['id']), array('class' => 'link add')); ?> | -->
                    <?php echo $this->Html->link(__('View'), array('controller' => 'medical_records', 'action' => 'view', $medicalRecord['MedicalRecord']['id']), array('class' => 'link view')); ?> | 
                    <?php echo $this->Html->link(__('Edit'), array('controller' => 'medical_records', 'action' => 'edit', $medicalRecord['MedicalRecord']['id']), array('class' => 'link edit')); ?> | 
                    <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'medical_records', 'action' => 'delete', $medicalRecord['MedicalRecord']['id']), array('class' => 'link delete'), __('Are you sure you want to delete # %s?', $medicalRecord['MedicalRecord']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('admPagination'); ?>
</div>
