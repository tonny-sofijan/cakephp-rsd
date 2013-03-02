<div class="hotels form">

    <h2><?php echo __('Add Hotel'); ?></h2>    

    <?php echo $this->Form->create('Hotel'); ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td><label for="htl_name" class="required"><?php echo __('Name'); ?></label></td>
            <td>
                <input type="text" name="data[Hotel][htl_name]" id="htl_name" class="text w_20" maxlength="150" />
                <span class="error-message"><?php if (isset($err_htl_name)) echo $err_htl_name; ?></span>
            </td>
        </tr>
        <tr>
            <td><label for="htl_type"><?php echo __('Type'); ?></label></td>
            <td><?php echo $this->Form->select('htl_type', $hotelTypeList, array('empty' => false)); ?></td>
        </tr>
        <tr>
            <td><label for="htl_stars" class="required"><?php echo __('Stars'); ?></label></td>
            <td>
                <input type="text" name="data[Hotel][htl_stars]" id="htl_stars" class="text w_2 numbersOnly" maxlength="1" />
                <span class="error-message"><?php if (isset($err_htl_stars)) echo $err_htl_stars; ?></span>
            </td>
        </tr>
        <tr>
            <td><label for="htl_phone"><?php echo __('Phone'); ?></label></td>
            <td><input type="text" name="data[Hotel][htl_phone]" id="htl_phone" class="text w_20" maxlength="50" /></td>
        </tr>
        <tr>
            <td><label for="htl_fax"><?php echo __('Fax'); ?></label></td>
            <td><input type="text" name="data[Hotel][htl_fax]" id="htl_fax" class="text w_20" maxlength="50" /></td>
        </tr>
        <tr>
            <td><label for="htl_email"><?php echo __('Email'); ?></label></td>
            <td><input type="text" name="data[Hotel][htl_email]" id="htl_email" class="text w_20" maxlength="150" /></td>
        </tr>
        <tr>
            <td><label for="htl_website"><?php echo __('Website'); ?></label></td>
            <td><input type="text" name="data[Hotel][htl_website]" id="htl_website" class="text w_20" maxlength="150" /></td>
        </tr>
        
        <?php echo $this->element('btnSaveUpdate', array('formId' => 'HotelAddForm', 'text' => __('Save'))); ?>
    </table>

    <?php echo $this->Form->end(); ?>
</div>