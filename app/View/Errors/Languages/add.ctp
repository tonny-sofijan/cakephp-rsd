<div class="languages form">

    <h2><?php echo __('Add Language'); ?></h2>    

    <?php echo $this->Form->create('Language');?>

    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                    <td width="20%"><label for="lang_name"><?php echo __('lang_name'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('lang_name'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="lang_code"><?php echo __('lang_code'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('lang_code'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="lang_active"><?php echo __('lang_active'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('lang_active'); ?>
                    </td>
                </tr>
                        <?php echo $this->element('btnSaveUpdate', array('formId' => 'LanguageAddForm', 'text' => __('Save'))); ?>    </table>
    
    <?php echo $this->Form->end();?>
</div>