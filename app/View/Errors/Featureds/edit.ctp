<div class="featureds form">

    <h2><?php echo __('Edit Featured'); ?></h2>    

    <?php echo $this->Form->create('Featured'); ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="ftd_title"><?php echo __('Title'); ?></label></td>
            <td><input type="text" name="data[Featured][ftd_title]" id="ftd_title" class="text w_20" maxlength="150" value="<?php echo $this->request->data['Featured']['ftd_title']; ?>" /></td>
        </tr>
        <tr>
            <td><label for="ftd_alt"><?php echo __('Alt'); ?></label></td>
            <td><input type="text" name="data[Featured][ftd_alt]" id="ftd_alt" class="text w_20" maxlength="150" value="<?php echo $this->request->data['Featured']['ftd_alt']; ?>" /></td>
        </tr>        
        <tr>
            <td><label for="ftd_description"><?php echo __('Description'); ?></label></td>
            <td><input type="text" name="data[Featured][ftd_description]" id="ftd_description" class="text w_20" maxlength="250" value="<?php echo $this->request->data['Featured']['ftd_description']; ?>" /></td>
        </tr>
        <?php echo $this->element('btnSaveUpdate', array('formId' => 'FeaturedEditForm', 'text' => __('Update'))); ?>    </table>

    <?php echo $this->Form->end(); ?>
</div>