<div class="medicalRecords index">
    <h1><?php echo __('Rekam Medis'); ?></h1>

    <div class="search">
        <?php echo $this->Form->create('MedicalRecord'); ?>
        <div class="buttonWrapper clearfix">
            <?php echo $this->Form->select('c', $options, array('empty' => false)); ?>
            <?php echo $this->Form->input('q', array('label' => false, 'div' => false, 'class' => 'text w_15')) ?>
            <?php echo $this->Form->button('cari', array('type' => 'submit', 'class' => 'linkIco')); ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

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
                    <?php echo $this->Html->link(__('View'), array('controller' => 'medical_records', 'action' => 'view', $medicalRecord['MedicalRecord']['id']), array('class' => 'link view')); ?>
                    
                    <?php if ($this->Access->userData['UserRole']['role_priority'] != $this->Access->rolePriorities['pharmacy']): ?>
                         | 
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'medical_records', 'action' => 'edit', $medicalRecord['MedicalRecord']['id']), array('class' => 'link edit')); ?> | 
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'medical_records', 'action' => 'delete', $medicalRecord['MedicalRecord']['id']), array('class' => 'link delete'), __('Are you sure you want to delete # %s?', $medicalRecord['MedicalRecord']['id'])); ?>
                    <?php endif; ?>
                    
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('admPagination'); ?>
</div>
