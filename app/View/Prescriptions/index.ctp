<div class="prescriptions index">
    <h1><?php echo __('Resep Obat'); ?></h1>

    <div class="search">
        <?php echo $this->Form->create('Prescription'); ?>
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
            <th><?php echo $this->Paginator->sort('total'); ?></th>
            <th><?php echo $this->Paginator->sort('total', __('Ditebus')); ?></th>
            <th><?php echo $this->Paginator->sort('created_date'); ?></th>
            <th><?php echo $this->Paginator->sort('updated_date'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
        <?php foreach ($prescriptions as $prescription): ?>
            <tr>
                <td><?php echo h($prescription['Prescription']['id']); ?>&nbsp;</td>
                <td><?php echo h($prescription['Prescription']['total']); ?>&nbsp;</td>
                <td><?php echo $this->Converter->yesNo($prescription['Prescription']['redeemed']); ?>&nbsp;</td>
                <td><?php echo h($prescription['Prescription']['created_date']); ?>&nbsp;</td>
                <td><?php echo h($prescription['Prescription']['updated_date']); ?>&nbsp;</td>
                <td class="actions">
                    <?php if ($prescription['Prescription']['redeemed'] == 0): ?>
                        <?php echo $this->Html->link(__('Rincian'), array('action' => 'view', $prescription['Prescription']['id']), array('class' => 'link view')); ?>
                        
                        <?php if ($this->Access->userData['UserRole']['role_priority'] != $this->Access->rolePriorities['pharmacy']): ?>
                         | 
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $prescription['Prescription']['id']), array('class' => 'link edit')); ?> | 
                        <?php echo $this->Form->postLink(__('Tebus'), array('action' => 'redeem', $prescription['Prescription']['id']), array('class' => 'link add'), __('Apakah Anda yakin akan menebus resep %s?', $prescription['Prescription']['id'])); ?> |                    
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->Access->userData['UserRole']['role_priority'] != $this->Access->rolePriorities['pharmacy']): ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $prescription['Prescription']['id']), array('class' => 'link delete'), __('Apakah Anda yakin akan menebus resep %s?', $prescription['Prescription']['id'])); ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('admPagination'); ?>
</div>
