<div class="mailLogs form">

    <h1><?php echo __('Edit Mail Log'); ?></h1>

    <?php echo $this->Form->create('MailLog');?>

    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                    <td width="20%"><label for="id"><?php echo __('id'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('id'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="mail_type"><?php echo __('mail_type'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('mail_type'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="mail_pk"><?php echo __('mail_pk'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('mail_pk'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="user_id"><?php echo __('user_id'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('user_id'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="mail_prev_status"><?php echo __('mail_prev_status'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('mail_prev_status'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="mail_current_status"><?php echo __('mail_current_status'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('mail_current_status'); ?>
                    </td>
                </tr>
                        
    </table>
    
    <?php echo $this->element('btnSaveUpdate', array('formId' => 'MailLogEditForm', 'text' => __('Update'))); ?>    
    <?php echo $this->Form->end();?>
</div>