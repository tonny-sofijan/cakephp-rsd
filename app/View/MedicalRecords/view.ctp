<div class="medicalRecords view">

    <h1><?php echo __('Data Medis Pasien'); ?></h1>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="2"><strong><?php echo $this->Html->link('Buka / Lihat Resep', array('controller' => 'prescriptions', 'action' => 'add', $medicalRecord['MedicalRecord']['id'])); ?></strong></td>
        </tr>
        <tr>
            <td width="20%"><?php echo __('Nomor Pendaftaran'); ?></td>
            <td><?php echo $this->Html->link($medicalRecord['MedicalRecord']['patient_registration_id'], array('controller' => 'patient_registrations', 'action' => 'view', $medicalRecord['MedicalRecord']['patient_registration_id'])); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Nama Pasien'); ?></td>
            <td><?php echo $this->Html->link($patient['Person']['person_first_name'] . ' ' . $patient['Person']['person_last_name'], array('controller' => 'patients', 'action' => 'view', $patient['Patient']['id'])); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Nama Dokter'); ?></td>
            <td><?php echo $this->Html->link($doctor['Person']['person_first_name'] . ' ' . $doctor['Person']['person_last_name'], array('controller' => 'doctors', 'action' => 'view', $doctor['Doctor']['id'])); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Diagnosa'); ?></td>
            <td><?php echo h($medicalRecord['MedicalRecord']['diagnosis']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('ICD 10'); ?></td>
            <td><?php echo $this->Html->link($medicalRecord['Icd10']['icd'], array('controller' => 'icd10s', 'action' => 'view', $medicalRecord['Icd10']['id'])) . ', ' . $medicalRecord['Icd10']['dtd_group']; ?></td>
        </tr>
        <tr>
            <td><?php echo __('Tindakan Medis'); ?></td>
            <td><?php echo h($medicalRecord['MedicalRecord']['medical_instruction']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Penunjang Medis'); ?></td>
            <td><?php echo h($medicalRecord['MedicalRecord']['medical_support']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Catatan Rekam Medis'); ?></td>
            <td><?php echo h($medicalRecord['MedicalRecord']['medical_record_note']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Tanggal Rekam Medis'); ?></td>
            <td><?php echo h($medicalRecord['MedicalRecord']['created_date']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Terakhir diubah'); ?></td>
            <td><?php echo h($medicalRecord['MedicalRecord']['updated_date']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Dibuat oleh'); ?></td>
            <td><?php echo h($medicalRecord['MedicalRecord']['created_by']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Diubah oleh'); ?></td>
            <td><?php echo h($medicalRecord['MedicalRecord']['updated_by']); ?></td>
        </tr>
    </table>

    <?php echo $this->element('btnBack'); ?>
</div>