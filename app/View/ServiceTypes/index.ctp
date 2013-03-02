
<div class="serviceTypes index">

    <h1><?php echo __('Jenis Layanan'); ?></h1>

    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
                <?php echo $this->Html->link(__('Tambah Jenis Layanan'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
            <th><?php echo $this->Paginator->sort('no', __('No. Layanan')); ?></th>
            <th><?php echo $this->Paginator->sort('type_of_service', __('Jenis Layanan')); ?></th>
            <th><?php echo $this->Paginator->sort('unit', __('Unit')); ?></th>
            <th width="150px"><?php echo __('Actions'); ?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
        <?php foreach ($serviceTypes as $serviceType): ?>
            <tr>
                <td><?php echo $i++; ?>.</td>
                <td><?php echo h($serviceType['ServiceType']['no']); ?>&nbsp;</td>
                <td><?php echo h($serviceType['ServiceType']['type_of_service']); ?>&nbsp;</td>
                <td><?php echo $this->Converter->serviceTypeUnit($serviceType['ServiceType']['unit']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('Lihat'), array('action' => 'view', $serviceType['ServiceType']['id']), array('class' => 'link view')); ?> |
                    <?php echo $this->Html->link(__('Ubah'), array('action' => 'edit', $serviceType['ServiceType']['id']), array('class' => 'link edit')); ?> |
                    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $serviceType['ServiceType']['id']), array('class' => 'link delete'), __('Apakah Anda yakin akan menghapus %s?', $serviceType['ServiceType']['no'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php echo $this->element('admPagination'); ?>

</div>
