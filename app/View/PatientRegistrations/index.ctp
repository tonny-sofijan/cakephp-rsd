<div class="patientRegistrations index">
    <h1><?php echo __('Pendaftaran Pasien'); ?></h1>

    <div class="search">
        <?php echo $this->Form->create('PatientRegistration'); ?>
        <div class="buttonWrapper clearfix">
            <?php echo $this->Form->select('c', $options, array('empty' => false)); ?>
            <?php echo $this->Form->input('q', array('label' => false, 'div' => false, 'class' => 'text w_15')) ?>
            <?php echo $this->Form->button('cari', array('type' => 'submit', 'class' => 'linkIco')); ?>
            <?php echo $this->Form->end(); ?>

            <div style="float: right;">
                <span class="btnClose last">
                    <?php echo $this->Html->link(__('Pendaftaran Pasien'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
                </span>
            </div>
        </div>
    </div>

    <div class="giveMeSpace"></div>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('patient_id', 'Pasien'); ?></th>
            <th><?php echo $this->Paginator->sort('registration_type', 'Jenis Kunjungan'); ?></th>
            <th><?php echo $this->Paginator->sort('registration_cost', 'Biaya'); ?></th>
            <th><?php echo $this->Paginator->sort('created_date'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
        <?php foreach ($patientRegistrations as $patientRegistration): ?>
            <tr>
                <td><?php echo h($patientRegistration['PatientRegistration']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($patientRegistration['Patient']['Person']['person_first_name'] . ' ' . $patientRegistration['Patient']['Person']['person_last_name'], array('controller' => 'patients', 'action' => 'view', $patientRegistration['Patient']['id'])); ?>
                </td>
                <td><?php echo $this->Converter->registrationType($patientRegistration['PatientRegistration']['registration_type']); ?></td>
                <td><?php echo $this->Converter->formatNumber($patientRegistration['PatientRegistration']['registration_cost']); ?>&nbsp;</td>
                <td><?php echo h($patientRegistration['PatientRegistration']['created_date']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Lihat'), array('action' => 'view', $patientRegistration['PatientRegistration']['id']), array('class' => 'link view')); ?> | 
                    <?php echo $this->Html->link(__('Ubah'), array('action' => 'edit', $patientRegistration['PatientRegistration']['id']), array('class' => 'link edit')); ?> | 
                    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $patientRegistration['PatientRegistration']['id']), array('class' => 'link delete'), __('Apakah Anda yakin akan menghapus %s untuk kunjungan %s?', $patientRegistration['Patient']['Person']['person_first_name'], $this->Converter->registrationType($patientRegistration['PatientRegistration']['registration_type']))); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('admPagination'); ?>
</div>
