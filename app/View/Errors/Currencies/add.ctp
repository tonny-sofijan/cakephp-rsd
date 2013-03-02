<div class="currencies form">

    <h2><?php echo __('Add Currency'); ?></h2>    

    <?php echo $this->Form->create('Currency');?>

    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                    <td width="20%"><label for="curr_name"><?php echo __('curr_name'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('curr_name'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="curr_code"><?php echo __('curr_code'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('curr_code'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="curr_rate"><?php echo __('curr_rate'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('curr_rate'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="curr_active"><?php echo __('curr_active'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('curr_active'); ?>
                    </td>
                </tr>
                        <?php echo $this->element('btnSaveUpdate', array('formId' => 'CurrencyAddForm', 'text' => __('Save'))); ?>    </table>
    
    <?php echo $this->Form->end();?>
</div>