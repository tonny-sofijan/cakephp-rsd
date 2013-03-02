<div class="codesets form">

    <h1><?php echo __('Edit Codeset'); ?></h1>

    <?php echo $this->Form->create('Codeset');?>

    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                    <td width="20%"><label for="id"><?php echo __('id'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('id'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="cset_name"><?php echo __('cset_name'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('cset_name'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="cset_code"><?php echo __('cset_code'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('cset_code'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="cset_value"><?php echo __('cset_value'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('cset_value'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="cset_description"><?php echo __('cset_description'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('cset_description'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="cset_parent_code"><?php echo __('cset_parent_code'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('cset_parent_code'); ?>
                    </td>
                </tr>
                        
    </table>
    
    <?php echo $this->element('btnSaveUpdate', array('formId' => 'CodesetEditForm', 'text' => __('Update'))); ?>    
    <?php echo $this->Form->end();?>
</div>