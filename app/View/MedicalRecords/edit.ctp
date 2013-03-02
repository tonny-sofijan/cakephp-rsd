<div class="medicalRecords form">

    <h1><?php echo __('Ubah Rekam Medis'); ?></h1>

    <?php echo $this->Form->create('MedicalRecord'); ?>

    <?php
        echo $this->Form->hidden('id');
        echo $this->Form->hidden('patient_registration_id');
        echo $this->Form->hidden('doctor_id', array('id' => 'doctor_id'));
        echo $this->Form->hidden('icd10_id', array('id' => 'icd10_id'));
    ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <!--tr>
            <td width="20%"><label for="patient_registration_id">< ?php echo __('ID Registrasi Pasien'); ?></label></td>
            <td><input type="text" name="data[MedicalRecord][patient_registration_id]" id="patient_no" class="text w_10" maxlength="10" value="< ?php echo isset($this->request->data['MedicalRecord']['patient_registration_id']) ? $this->request->data['MedicalRecord']['patient_registration_id'] : $patient_registration_id; ?>" readonly="readonly" /></td>
        </tr-->
        <tr>
            <td width="20%"><label for="doctor_id"><?php echo __('Dokter'); ?></label></td>
            <td>
                <?php echo __('%s / %s %s / %s',
                    $this->request->data['Doctor']['doctor_specialty'],
                    $this->request->data['Person']['person_first_name'],
                    $this->request->data['Person']['person_last_name'],
                    $this->request->data['Person']['person_mobile_phone']); ?>
            </td>
        </tr>
        <tr>
            <td><label for="icd10_id"><?php echo __('Kode ICD 10'); ?></label></td>
            <td>
                <?php echo __('%s / %s / %s', 
                    $this->request->data['Icd10']['icd'],
                    $this->request->data['Icd10']['dtd_code'],
                    $this->request->data['Icd10']['dtd_group']); ?>
            </td>
        </tr>
        <tr>
            <td><label for="diagnosis"><?php echo __('Diagnosa'); ?></label></td>
            <td>
                <?php echo $this->Form->input('diagnosis', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text'
                )); ?>
            </td>
        </tr>        
        <tr>
            <td><label for="medical_instruction"><?php echo __('Tindakan Medis'); ?></label></td>
            <td>
                <?php echo $this->Form->input('medical_instruction', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="medical_support"><?php echo __('Penunjang Medis'); ?></label></td>
            <td>
                <?php echo $this->Form->input('medical_support', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="medical_record_note"><?php echo __('Keterangan'); ?></label></td>
            <td>
                <?php echo $this->Form->input('medical_record_note', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text'
                )); ?>
            </td>
        </tr>
    </table>

    <?php echo $this->element('btnSaveUpdate', array('formId' => 'MedicalRecordEditForm', 'text' => __('Ubah'))); ?>    
    <?php echo $this->Form->end(); ?>
</div>
