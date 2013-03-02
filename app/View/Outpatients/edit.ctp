<div class="outpatients form">

    <h1><?php echo __('Edit Outpatient'); ?></h1>

    <?php echo $this->Form->create('Outpatient');?>

    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                    <td width="20%"><label for="id"><?php echo __('id'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('id'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="cause_of_accident"><?php echo __('cause_of_accident'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('cause_of_accident'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="type_of_visit"><?php echo __('type_of_visit'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('type_of_visit'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="type_of_case"><?php echo __('type_of_case'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('type_of_case'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="arrived_with"><?php echo __('arrived_with'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('arrived_with'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="emergency"><?php echo __('emergency'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('emergency'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="triage"><?php echo __('triage'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('triage'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="cause_of_visit"><?php echo __('cause_of_visit'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('cause_of_visit'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="payment_method"><?php echo __('payment_method'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('payment_method'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="destination_room"><?php echo __('destination_room'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('destination_room'); ?>
                    </td>
                </tr>
                        
    </table>
    
    <?php echo $this->element('btnSaveUpdate', array('formId' => 'OutpatientEditForm', 'text' => __('Update'))); ?>    
    <?php echo $this->Form->end();?>
</div>