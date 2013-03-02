<div class="arosAcos index">
    <h1><?php echo __('Aros Acos'); ?></h1>

    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
                <?php echo $this->Html->link(__('New Aros Aco'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
            <th><?php echo $this->Paginator->sort('aro_id'); ?></th>
            <th><?php echo $this->Paginator->sort('aco_id'); ?></th>
            <th><?php echo __('Granted'); ?></th>
            <th width="150px"><?php echo __('Actions'); ?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
        <?php foreach ($arosAcos as $arosAco): ?>
            <tr>
                <td><?php echo $i++; ?>.</td>
                <td><?php echo $this->Html->link($arosAco['Detail']['UserRole']['role_name'], array('controller' => 'aros', 'action' => 'view', $arosAco['Aro']['id'])); ?></td>
                <td><?php echo $this->Html->link($arosAco['Aco']['fullAlias'], array('controller' => 'acos', 'action' => 'view', $arosAco['Aco']['id'])); ?></td>
                <td><?php echo $this->Converter->yesNo(h($arosAco['ArosAcoModel']['_create'])); ?></td>
                <td>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $arosAco['ArosAcoModel']['id']), array('class' => 'link delete'), __('Anda yakin akan menghapus %s?', $arosAco['Aco']['fullAlias'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php echo $this->element('admPagination'); ?>
</div>