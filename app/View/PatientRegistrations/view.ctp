<div class="patientRegistrations view">

    <h1><?php echo __('Rincian Registrasi Pasien'); ?></h1>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><?php echo __('Nomor Pendaftaran'); ?></td>
            <td>
                <?php echo ($patientRegistration['PatientRegistration']['id']); ?>
                &nbsp;
                <?php echo $this->Html->link('checkout', array('controller' => 'checkouts', 'action' => 'add', $patientRegistration['PatientRegistration']['id'])); ?>
            </td>
        </tr>
        <tr>
            <td  colspan="2"><strong>DATA PASIEN</strong></td>
        </tr>
        <tr>
            <td width="20%"><?php echo __('Nama Pasien'); ?></td>
            <td><?php echo $this->Html->link($patient['Person']['person_first_name'] . ' ' . $patient['Person']['person_last_name'], array('controller' => 'patients', 'action' => 'view', $patient['Patient']['id'])); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Alamat Pasien'); ?></td>
            <td><?php echo h($patient['Person']['person_address']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Telp. Rumah Pasien'); ?></td>
            <td><?php echo h($patient['Person']['person_home_phone']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Ponsel Pasien'); ?></td>
            <td><?php echo h($patient['Person']['person_mobile_phone']); ?></td>
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
            <td><?php echo __('Keterangan Pasien'); ?></td>
            <td><?php echo h($patient['Patient']['note']); ?></td>
        </tr>
        <?php if (isset($hospitalization['Hospitalization']['id'])): ?>
            <tr>
                <td  colspan="2"><strong>DATA RAWAT INAP</strong></td>
            </tr>
            <tr>
                <td width="20%"><?php echo __('Ruang Tujuan'); ?></td>
                <td><?php echo $this->Converter->destinationRoom($hospitalization['Hospitalization']['destination_room']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Kelas Rawat'); ?></td>
                <td><?php echo $this->Converter->treatmentLevel($hospitalization['Hospitalization']['treatment_level']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Tanggal Masuk'); ?></td>
                <td><?php echo h($hospitalization['Hospitalization']['date_in']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Tanggal Keluar'); ?></td>
                <td><?php echo h($hospitalization['Hospitalization']['date_out']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Tanggal Disposisi'); ?></td>
                <td><?php echo $this->Converter->disposition($hospitalization['Hospitalization']['disposition']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Catatan'); ?></td>
                <td><?php echo h($hospitalization['Hospitalization']['note']); ?></td>
            </tr>
        <?php elseif (isset($outpatient['Outpatient']['id'])): ?>
            <tr>
                <td  colspan="2"><strong>DATA RAWAT JALAN</strong></td>
            </tr>
            <tr>
                <td><?php echo __('Penyebab kecelakaan'); ?></td>
                <td><?php echo $outpatient['Outpatient']['cause_of_accident']; ?></td>
            </tr>
            <tr>
                <td><?php echo __('Jenis Kunjungan'); ?></td>
                <td><?php echo $this->Converter->oldNew($outpatient['Outpatient']['type_of_visit']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Jenis Kasus'); ?></td>
                <td><?php echo $this->Converter->oldNew($outpatient['Outpatient']['type_of_case']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Cara Datang'); ?></td>
                <td><?php echo $this->Converter->arrivedWith($outpatient['Outpatient']['arrived_with']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Darurat'); ?></td>
                <td><?php echo $this->Converter->trueFalse($outpatient['Outpatient']['emergency']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Triase'); ?></td>
                <td><?php echo $this->Converter->oldNew($outpatient['Outpatient']['triage']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Penyebab Datang'); ?></td>
                <td><?php echo $this->Converter->visitCause($outpatient['Outpatient']['cause_of_visit']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Cara Bayar'); ?></td>
                <td><?php echo $this->Converter->paymentMethod($outpatient['Outpatient']['payment_method']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Ruang Tujuan'); ?></td>
                <td><?php echo $this->Converter->destinationRoom($outpatient['Outpatient']['destination_room']); ?></td>
            </tr>
        <?php elseif (isset($intensiveCare['IntensiveCare']['id'])): ?>
            <tr>
                <td  colspan="2"><strong>DATA IGD</strong></td>
            </tr>
            <tr>
                <td><?php echo __('Penyebab kecelakaan'); ?></td>
                <td><?php echo $intensiveCare['IntensiveCare']['cause_of_accident']; ?></td>
            </tr>
            <tr>
                <td><?php echo __('Jenis Kunjungan'); ?></td>
                <td><?php echo $this->Converter->oldNew($intensiveCare['IntensiveCare']['type_of_visit']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Jenis Kasus'); ?></td>
                <td><?php echo $this->Converter->oldNew($intensiveCare['IntensiveCare']['type_of_case']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Cara Datang'); ?></td>
                <td><?php echo $this->Converter->arrivedWith($intensiveCare['IntensiveCare']['arrived_with']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Darurat'); ?></td>
                <td><?php echo $this->Converter->trueFalse($intensiveCare['IntensiveCare']['emergency']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Triase'); ?></td>
                <td><?php echo $this->Converter->oldNew($intensiveCare['IntensiveCare']['triage']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Penyebab Datang'); ?></td>
                <td><?php echo $this->Converter->visitCause($intensiveCare['IntensiveCare']['cause_of_visit']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Cara Bayar'); ?></td>
                <td><?php echo $this->Converter->paymentMethod($intensiveCare['IntensiveCare']['payment_method']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Ruang Tujuan'); ?></td>
                <td><?php echo $this->Converter->destinationRoom($intensiveCare['IntensiveCare']['destination_room']); ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td  colspan="2"><strong>DATA REGISTRASI PASIEN</strong></td>
        </tr>
        <tr>
            <td><?php echo __('Tanggal Registrasi'); ?></td>
            <td><?php echo h($patientRegistration['PatientRegistration']['created_date']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Terakhir diubah'); ?></td>
            <td><?php echo h($patientRegistration['PatientRegistration']['updated_date']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Dibuat oleh'); ?></td>
            <td><?php echo h($patientRegistration['PatientRegistration']['created_by']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Diubah oleh'); ?></td>
            <td><?php echo h($patientRegistration['PatientRegistration']['updated_by']); ?></td>
        </tr>
    </table>

    <?php echo $this->element('btnBack'); ?>
</div>
<br />

<?php if ($medicalRecords !== false): ?>
    <div class="medicalRecords index">
        <h1><?php echo __('Rekam Medis'); ?></h1>

        <div class="search">
            <?php echo $this->Form->create('MedicalRecord'); ?>
            <div class="buttonWrapper clearfix">
                <?php echo $this->Form->select('c', $options, array('empty' => false)); ?>
                <?php echo $this->Form->input('q', array('label' => false, 'div' => false, 'class' => 'text w_15')) ?>
                <?php echo $this->Form->button('cari', array('type' => 'submit', 'class' => 'linkIco')); ?>
                <?php echo $this->Form->end(); ?>

                <div style="float: right;">
                    <span class="btnClose last">
                        <?php echo $this->Html->link(__('Data Medis'), array('controller' => 'medical_records', 'action' => 'add', $patientRegistration['PatientRegistration']['id']), array('class' => 'linkIco icoAdd')); ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="giveMeSpace"></div>

        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('patient_registration_id', 'Reg. ID'); ?></th>                
                <th><?php echo $this->Paginator->sort('doctor_id', 'Dokter'); ?></th>
                <th><?php echo $this->Paginator->sort('irc10_id', 'Kode ICD10'); ?></th>
                <th><?php echo $this->Paginator->sort('prescription_id', 'Resep'); ?></th>
                <th><?php echo $this->Paginator->sort('created_date', 'Tanggal'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php $i = $this->Paginator->counter('{:start}'); ?>
            <?php foreach ($medicalRecords as $medicalRecord): ?>
                <tr>
                    <td><?php echo h($medicalRecord['MedicalRecord']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($medicalRecord['PatientRegistration']['id'], array('controller' => 'patient_registrations', 'action' => 'view', $medicalRecord['PatientRegistration']['id'])); ?>
                    </td>                    
                    <td>
                        <?php echo $this->Html->link($medicalRecord['Doctor']['Person']['person_first_name'] . ' ' . $medicalRecord['Doctor']['Person']['person_last_name'], array('controller' => 'doctors', 'action' => 'view', $medicalRecord['Doctor']['Doctor']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($medicalRecord['Icd10']['icd'], array('controller' => 'icd10s', 'action' => 'view', $medicalRecord['Icd10']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($medicalRecord['Prescription']['id'], array('controller' => 'prescriptions', 'action' => 'view', $medicalRecord['Prescription']['id'])); ?>
                    </td>
                    <td><?php echo h($medicalRecord['MedicalRecord']['created_date']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Resep'), array('controller' => 'prescriptions', 'action' => 'add', $medicalRecord['MedicalRecord']['id']), array('class' => 'link add')); ?> | 
                        <?php echo $this->Html->link(__('Lihat'), array('controller' => 'medical_records', 'action' => 'view', $medicalRecord['MedicalRecord']['id']), array('class' => 'link view')); ?> | 
                        <?php echo $this->Html->link(__('Ubah'), array('controller' => 'medical_records', 'action' => 'edit', $medicalRecord['MedicalRecord']['id']), array('class' => 'link edit')); ?> | 
                        <?php echo $this->Form->postLink(__('Hapus'), array('controller' => 'medical_records', 'action' => 'delete', $medicalRecord['MedicalRecord']['id']), array('class' => 'link delete'), __('Apakah Anda yakin akan menghapus rekam medis dokter %s %s?', $medicalRecord['Doctor']['Person']['person_first_name'], $medicalRecord['Doctor']['Person']['person_last_name'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $this->element('admPagination'); ?>
    </div>
<?php endif; ?>