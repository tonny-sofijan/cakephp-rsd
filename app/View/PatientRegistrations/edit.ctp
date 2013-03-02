<div class="patientRegistrations form">
    <h1><?php echo __('Pendaftaran Pasien'); ?></h1>
    
    <form>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%"><label for="registration_type"><?php echo __('Jenis Pendaftaran'); ?></label></td>
                <td>
                    <?php echo $this->Form->hidden('registration_type', array('id' => 'registration_type', 'value' => $this->request->data['PatientRegistration']['registration_type'])); ?>
                    <?php echo $this->Converter->registrationType($this->request->data['PatientRegistration']['registration_type']); ?>
                </td>
            </tr>
        </table>
    </form>

    <?php echo $this->Form->create('PatientRegistration'); ?>
    
    <?php 
        echo $this->Form->hidden('id');
        echo $this->Form->hidden('Hospitalization.id');
        echo $this->Form->hidden('Outpatient.id');
        echo $this->Form->hidden('IntensiveCare.id');
        echo $this->Form->hidden('patient_id', array('id' => 'patient_id'));
        echo $this->Form->hidden('registration_type', array('id' => 'reg_type'));
        echo $this->Form->hidden('old_reg_type', array('value' => $this->request->data['PatientRegistration']['registration_type'])); 
    ?>    

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="PatientRegistrationPatientInfo"><?php echo __('Pasien'); ?></label></td>
            <td><?php echo __('%s %s %s / %s', $this->request->data['Patient']['patient_no'], $this->request->data['Person']['person_first_name'], $this->request->data['Person']['person_last_name'], $this->request->data['Person']['person_mobile_phone']); ?></td>
        </tr>
        
        <tr id="hospitalization">
            <td colspan="2" class="container">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="20%"><label for="destination_room"><?php echo __('Ruang tujuan'); ?></label></td>
                        <td><?php echo $this->Form->select('Hospitalization.destination_room', $this->Constant->getDestinationRoom(), array('empty' => false, 'value' => isset($this->request->data['Hospitalization']['destination_room']) ? $this->request->data['Hospitalization']['destination_room'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="treatment_level"><?php echo __('Kelas Rawat'); ?></label></td>
                        <td><?php echo $this->Form->select('Hospitalization.treatment_level', $this->Constant->getTreatmentLevel(), array('empty' => false, 'value' => isset($this->request->data['Hospitalization']['treatment_level']) ? $this->request->data['Hospitalization']['treatment_level'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="HospitalizationDateIn"><?php echo __('Tanggal Masuk'); ?></label></td>
                        <td>
                            <?php echo $this->Form->input('Hospitalization.date_in', array(
                                'label' => false,
                                'div' => false,
                                'type' => 'text',
                                'class' => 'datepicker text w_10'
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="HospitalizationDateOut"><?php echo __('Tanggal Keluar'); ?></label></td>
                        <td>
                            <?php echo $this->Form->input('Hospitalization.date_out', array(
                                'label' => false,
                                'div' => false,
                                'type' => 'text',
                                'class' => 'datepicker text w_10'
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="disposition"><?php echo __('Cara Disposisi'); ?></label></td>
                        <td><?php echo $this->Form->select('Hospitalization.disposition', $this->Constant->getDisposition(), array('empty' => false, 'value' => isset($this->request->data['Hospitalization']['disposition']) ? $this->request->data['Hospitalization']['disposition'] : '')); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr id="outpatient">
            <td colspan="2" class="container">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="20%"><label for="OutpatientCauseOfAccident"><?php echo __('Penyebab Kecelakaan'); ?></label></td>
                        <td>
                            <?php echo $this->Form->input('Outpatient.cause_of_accident', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_40'
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="type_of_visit"><?php echo __('Jenis kunjungan'); ?></label></td>
                        <td><?php echo $this->Form->select('Outpatient.type_of_visit', $this->Constant->getOldNew(), array('empty' => false, 'value' => isset($this->request->data['Outpatient']['type_of_visit']) ? $this->request->data['Outpatient']['type_of_visit'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="type_of_case"><?php echo __('Jenis kasus'); ?></label></td>
                        <td><?php echo $this->Form->select('Outpatient.type_of_case', $this->Constant->getOldNew(), array('empty' => false, 'value' => isset($this->request->data['Outpatient']['type_of_case']) ? $this->request->data['Outpatient']['type_of_case'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="arrived_with"><?php echo __('Cara datang'); ?></label></td>
                        <td><?php echo $this->Form->select('Outpatient.arrived_with', $this->Constant->getArrivedWith(), array('empty' => false, 'value' => isset($this->request->data['Outpatient']['arrived_with']) ? $this->request->data['Outpatient']['arrived_with'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="emergency"><?php echo __('Darurat'); ?></label></td>
                        <td><?php echo $this->Form->select('Outpatient.emergency', $this->Constant->getTrueFalse(), array('empty' => false, 'value' => isset($this->request->data['Outpatient']['emergency']) ? $this->request->data['Outpatient']['emergency'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="triage"><?php echo __('Triase'); ?></label></td>
                        <td><?php echo $this->Form->select('Outpatient.triage', $this->Constant->getTriage(), array('empty' => false, 'value' => isset($this->request->data['Outpatient']['triage']) ? $this->request->data['Outpatient']['triage'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="cause_of_visit"><?php echo __('Penyebab datang'); ?></label></td>
                        <td><?php echo $this->Form->select('Outpatient.cause_of_visit', $this->Constant->getVisitCause(), array('empty' => false, 'value' => isset($this->request->data['Outpatient']['cause_of_visit']) ? $this->request->data['Outpatient']['cause_of_visit'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="payment_method"><?php echo __('Cara pembayaran'); ?></label></td>
                        <td><?php echo $this->Form->select('Outpatient.payment_method', $this->Constant->getPaymentMethod(), array('empty' => false, 'value' => isset($this->request->data['Outpatient']['payment_method']) ? $this->request->data['Outpatient']['payment_method'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="destination_room"><?php echo __('Ruang tujuan'); ?></label></td>
                        <td><?php echo $this->Form->select('Outpatient.destination_room', $this->Constant->getDestinationRoom(), array('empty' => false, 'value' => isset($this->request->data['Outpatient']['destination_room']) ? $this->request->data['Outpatient']['destination_room'] : '')); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr id="intensiveCare">
            <td colspan="2" class="container">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="20%"><label for="IntensiveCareCauseOfAccident"><?php echo __('Penyebab Kecelakaan'); ?></label></td>
                        <td>
                            <?php echo $this->Form->input('IntensiveCare.cause_of_accident', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_40'
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="type_of_visit"><?php echo __('Jenis kunjungan'); ?></label></td>
                        <td><?php echo $this->Form->select('IntensiveCare.type_of_visit', $this->Constant->getOldNew(), array('empty' => false, 'value' => isset($this->request->data['IntensiveCare']['type_of_visit']) ? $this->request->data['IntensiveCare']['type_of_visit'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="type_of_case"><?php echo __('Jenis kasus'); ?></label></td>
                        <td><?php echo $this->Form->select('IntensiveCare.type_of_case', $this->Constant->getOldNew(), array('empty' => false, 'value' => isset($this->request->data['IntensiveCare']['type_of_case']) ? $this->request->data['IntensiveCare']['type_of_case'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="arrived_with"><?php echo __('Cara datang'); ?></label></td>
                        <td><?php echo $this->Form->select('IntensiveCare.arrived_with', $this->Constant->getArrivedWith(), array('empty' => false, 'value' => isset($this->request->data['IntensiveCare']['arrived_with']) ? $this->request->data['IntensiveCare']['arrived_with'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="emergency"><?php echo __('Darurat'); ?></label></td>
                        <td><?php echo $this->Form->select('IntensiveCare.emergency', $this->Constant->getTrueFalse(), array('empty' => false, 'value' => isset($this->request->data['IntensiveCare']['emergency']) ? $this->request->data['IntensiveCare']['emergency'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="triage"><?php echo __('Triase'); ?></label></td>
                        <td><?php echo $this->Form->select('IntensiveCare.triage', $this->Constant->getTriage(), array('empty' => false, 'value' => isset($this->request->data['IntensiveCare']['triage']) ? $this->request->data['IntensiveCare']['triage'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="cause_of_visit"><?php echo __('Penyebab datang'); ?></label></td>
                        <td><?php echo $this->Form->select('IntensiveCare.cause_of_visit', $this->Constant->getVisitCause(), array('empty' => false, 'value' => isset($this->request->data['IntensiveCare']['cause_of_visit']) ? $this->request->data['IntensiveCare']['cause_of_visit'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="payment_method"><?php echo __('Cara pembayaran'); ?></label></td>
                        <td><?php echo $this->Form->select('IntensiveCare.payment_method', $this->Constant->getPaymentMethod(), array('empty' => false, 'value' => isset($this->request->data['IntensiveCare']['payment_method']) ? $this->request->data['IntensiveCare']['payment_method'] : '')); ?></td>
                    </tr>
                    <tr>
                        <td><label for="destination_room"><?php echo __('Ruang tujuan'); ?></label></td>
                        <td><?php echo $this->Form->select('IntensiveCare.destination_room', $this->Constant->getDestinationRoom(), array('empty' => false, 'value' => isset($this->request->data['IntensiveCare']['destination_room']) ? $this->request->data['IntensiveCare']['destination_room'] : '')); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td><label for="PatientRegistrationRegistrationCost"><?php echo __('Biaya Registrasi'); ?></label></td>
            <td>
                <?php echo $this->Form->input('registration_cost', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_10 numbersOnly autoNumeric',
                    'type' => 'text',
                    'value' => $this->Converter->formatNumber($this->request->data['PatientRegistration']['registration_cost'])
                )); ?>
            </td>
        </tr>
    </table>

    <?php echo $this->element('btnSaveUpdate', array('formId' => 'PatientRegistrationEditForm', 'text' => __('Ubah'))); ?>
    <?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {
		
        var regType = $('#registration_type').val();
        regTypeOnChange(regType);
        
        function regTypeOnChange(regType) {
            if (regType == 'hospitalization') {
                $('#hospitalization').show();
                $('#outpatient').hide();
                $('#intensiveCare').hide();
                $('#reg_type').val('hospitalization');
            } else if (regType == 'outpatient') {
                $('#hospitalization').hide();
                $('#outpatient').show();
                $('#intensiveCare').hide();
                $('#reg_type').val('outpatient');
            } else {
                $('#hospitalization').hide();
                $('#outpatient').hide();
                $('#intensiveCare').show();
                $('#reg_type').val('icu');
            }
        }
        
    });	
</script>
