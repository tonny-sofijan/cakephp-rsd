<div class="people form">

    <h1><?php echo __('Edit Person'); ?></h1>

    <?php echo $this->Form->create('Person');?>

    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                    <td width="20%"><label for="id"><?php echo __('id'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('id'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="person_first_name"><?php echo __('person_first_name'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('person_first_name'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="person_last_name"><?php echo __('person_last_name'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('person_last_name'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="person_salutation"><?php echo __('person_salutation'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('person_salutation'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="person_gender"><?php echo __('person_gender'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('person_gender'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="person_ic_no"><?php echo __('person_ic_no'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('person_ic_no'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="person_tax_no"><?php echo __('person_tax_no'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('person_tax_no'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="person_email"><?php echo __('person_email'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('person_email'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="person_home_phone"><?php echo __('person_home_phone'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('person_home_phone'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="person_mobile_phone"><?php echo __('person_mobile_phone'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('person_mobile_phone'); ?>
                    </td>
                </tr>
                                <tr>
                    <td><label for="person_fax"><?php echo __('person_fax'); ?></label></td>
                    <td>
                        		<?php echo $this->Form->input('person_fax'); ?>
                    </td>
                </tr>
                        
    </table>
    
    <?php echo $this->element('btnSaveUpdate', array('formId' => 'PersonEditForm', 'text' => __('Update'))); ?>    
    <?php echo $this->Form->end();?>
</div>