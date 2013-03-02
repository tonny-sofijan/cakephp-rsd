<div class="hospitalizations form">

    <h1><?php echo __('Add Hospitalization'); ?></h1>

    <?php echo $this->Form->create('Hospitalization');?>

    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                    <td width="20%"><label for="destination_room"><?php echo __('destination_room'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('destination_room'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="treatment_level"><?php echo __('treatment_level'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('treatment_level'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="date_in"><?php echo __('date_in'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('date_in'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="date_out"><?php echo __('date_out'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('date_out'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="disposition"><?php echo __('disposition'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('disposition'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="note"><?php echo __('note'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('note'); ?>
                    </td>
                </tr>
                        
    </table>
    
    <?php echo $this->element('btnSaveUpdate', array('formId' => 'HospitalizationAddForm', 'text' => __('Save'))); ?>    
    <?php echo $this->Form->end();?>
</div>