<div class="arosAcos form">
    <h1><?php echo __('Add Aros Aco'); ?></h1>
    
    <?php echo $this->Form->create('ArosAcoModel'); ?>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="aro_id"><?php echo __('Aro'); ?></label></td>
            <td><?php echo $this->Form->select('aro_id', $newAros, array('empty' => false)); ?></td>
        </tr>
        <tr>
            <td><label for="aco_id"><?php echo __('Aco'); ?></label></td>
            <td><?php echo $this->Form->select('aco_id', $newAcos, array('empty' => false)); ?></td>
        </tr
        <tr>
            <td><label for="granted"><?php echo __('Granted'); ?></label></td>
            <td><?php echo $this->Form->radio('granted', $this->Constant->getYesNoList('n'), array('legend' => false, 'value' => '1')); ?></td>
        </tr>
    </table>
    
    <?php echo $this->element('btnSaveUpdate', array('formId' => 'ArosAcoModelAddForm', 'text' => __('Save'))); ?>
    
    <?php echo $this->Form->end(); ?>    
</div>