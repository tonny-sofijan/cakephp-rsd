<div class="prescriptions form">

    <h1><?php echo __('Buka Resep Baru'); ?></h1>

    <?php echo $this->Form->create('Prescription'); ?>
    
    <?php 
        echo $this->Form->hidden('medical_record_id', array('value' => $medicalRecord['MedicalRecord']['id']));
        echo $this->Form->hidden('patient_registration_id', array('value' => $medicalRecord['MedicalRecord']['patient_registration_id']));
    ?>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="doctor_id"><?php echo __('Dokter'); ?></label></td>
            <td>
                <?php echo __('%s / %s %s / %s',
                    $medicalRecord['Doctor']['doctor_specialty'],
                    $medicalRecord['Person']['person_first_name'],
                    $medicalRecord['Person']['person_last_name'],
                    $medicalRecord['Person']['person_mobile_phone']); ?>
            </td>
        </tr>
        <tr>
            <td><label for="icd10_id"><?php echo __('Kode ICD 10'); ?></label></td>
            <td>
                <?php echo __('%s / %s / %s', 
                    $medicalRecord['Icd10']['icd'],
                    $medicalRecord['Icd10']['dtd_code'],
                    $medicalRecord['Icd10']['dtd_group']); ?>
            </td>
        </tr>
        <tr>
            <td width="20%"><label for="total"><?php echo __('Total'); ?></label></td>
            <td>
                <?php echo $this->Form->input('total', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_10 numbersOnly autoNumeric',
                    'type' => 'text'
                )); ?>
            </td>
        </tr>
    </table>

    <?php echo $this->element('btnSaveUpdate', array('formId' => 'PrescriptionAddForm', 'text' => __('Simpan'))); ?>    
    <?php echo $this->Form->end(); ?>
</div>