<div class="patients index">

    <h1><?php echo __('Pasien'); ?></h1>

    <div class="search">
        <?php echo $this->Form->create('Patient'); ?>
        <div class="buttonWrapper clearfix">
            <?php echo $this->Form->select('c', $options, array('empty' => false)); ?>
            <?php echo $this->Form->input('q', array('label' => false, 'div' => false, 'class' => 'text w_15')) ?>
            <?php echo $this->Form->button('cari', array('type' => 'submit', 'class' => 'linkIco')); ?>
            <?php echo $this->Form->end(); ?>

            <div style="float: right;">
                <span class="btnClose last">
                    <?php echo $this->Html->link(__('Tambah Pasien'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
                </span>
            </div>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('person_id', 'Nama'); ?></th>
            <th><?php echo $this->Paginator->sort('patient_no', 'No. Pasien'); ?></th>
            <th><?php echo $this->Paginator->sort('patient_guarantor', 'Penjamin'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
        <?php foreach ($patients as $patient): ?>
            <tr>
                <td><?php echo h($patient['Patient']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($patient['Person']['person_first_name'] . ' ' . $patient['Person']['person_last_name'], array('controller' => 'people', 'action' => 'view', $patient['Person']['id'])); ?>
                </td>
                <td><?php echo h($patient['Patient']['patient_no']); ?>&nbsp;</td>
                <td><?php echo h($patient['Patient']['patient_guarantor']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Lihat'), array('action' => 'view', $patient['Patient']['id']), array('class' => 'link view')); ?> | 
                    <?php echo $this->Html->link(__('Ubah'), array('action' => 'edit', $patient['Patient']['id']), array('class' => 'link edit')); ?> | 
                    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $patient['Patient']['id']), array('class' => 'link delete'), __('Apakah Anda yakin akan menghapus %s %s?', $patient['Person']['person_first_name'], $patient['Person']['person_last_name'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('admPagination'); ?>
</div>
