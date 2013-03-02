<div class="hotels form">

    <h2><?php echo __('Edit Hotel'); ?></h2>    

    <?php echo $this->Form->create('Hotel'); ?>

    <div class="tabs">
        <ul>
            <li><a href="#tab1"><?php echo __('Profile'); ?></a></li>
            <li><a href="#tab2"><?php echo __('Address'); ?></a></li>
        </ul>
        
        <div id="tab1">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><label for="htl_name" class="required"><?php echo __('Name'); ?></label></td>
                    <td>
                        <input type="text" name="data[Hotel][htl_name]" id="htl_name" class="text w_20" maxlength="150" value="<?php echo $this->request->data['Hotel']['htl_name']; ?>" />
                        <span class="error-message"><?php if (isset($err_htl_name)) echo $err_htl_name; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="htl_type"><?php echo __('Type'); ?></label></td>
                    <td><?php echo $this->Form->select('htl_type', $hotelTypeList, array('empty' => false, 'value' => $this->request->data['Hotel']['htl_type'])); ?></td>
                </tr>
                <tr>
                    <td><label for="htl_stars" class="required"><?php echo __('Stars'); ?></label></td>
                    <td>
                        <input type="text" name="data[Hotel][htl_stars]" id="htl_stars" class="text w_2 numbersOnly" maxlength="1" value="<?php echo $this->request->data['Hotel']['htl_stars']; ?>" />
                        <span class="error-message"><?php if (isset($err_htl_stars)) echo $err_htl_stars; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="htl_phone"><?php echo __('Phone'); ?></label></td>
                    <td><input type="text" name="data[Hotel][htl_phone]" id="htl_phone" class="text w_20" maxlength="50" value="<?php echo $this->request->data['Hotel']['htl_phone']; ?>" /></td>
                </tr>
                <tr>
                    <td><label for="htl_fax"><?php echo __('Fax'); ?></label></td>
                    <td><input type="text" name="data[Hotel][htl_fax]" id="htl_fax" class="text w_20" maxlength="50" value="<?php echo $this->request->data['Hotel']['htl_fax']; ?>" /></td>
                </tr>
                <tr>
                    <td><label for="htl_email"><?php echo __('Email'); ?></label></td>
                    <td><input type="text" name="data[Hotel][htl_email]" id="htl_email" class="text w_20" maxlength="150" value="<?php echo $this->request->data['Hotel']['htl_email']; ?>" /></td>
                </tr>
                <tr>
                    <td><label for="htl_website"><?php echo __('Website'); ?></label></td>
                    <td><input type="text" name="data[Hotel][htl_website]" id="htl_website" class="text w_20" maxlength="150" value="<?php echo $this->request->data['Hotel']['htl_website']; ?>" /></td>
                </tr>
            </table>
        </div>
        
        <div id="tab2">
            <?php echo $this->element('address', array('isUpdate' => true)); ?>
        </div>
        
        <?php echo $this->element('btnSaveUpdate', array('formId' => 'HotelEditForm', 'text' => __('Update'), 'noTable' => true)); ?>
    </div>

    <?php echo $this->Form->end(); ?>
</div>