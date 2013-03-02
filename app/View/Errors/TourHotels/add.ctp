<div class="tourHotels form">

    <h2><?php echo __('Add Tour Hotel'); ?></h2>    

    <?php echo $this->Form->create('TourHotel'); ?>
    
    <input type="hidden" name="data[TourHotel][tour_id]" value="<?php echo $pid; ?>" />

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="thtl_name"><?php echo __('Name'); ?></label></td>
            <td><input type="text" name="data[TourHotel][thtl_name]" id="thtl_name" class="text w_20" maxlength="150" value="<?php echo isset($this->request->data['TourHotel']['thtl_name']) ? $this->request->data['TourHotel']['thtl_name'] : ''; ?>" /></td>
        </tr>
        <tr>
            <td><label for="thtl_stars"><?php echo __('Stars'); ?></label></td>
            <td><input type="text" name="data[TourHotel][thtl_stars]" id="thtl_stars" class="text w_2 numbersOnly number" maxlength="1" value="<?php echo isset($this->request->data['TourHotel']['thtl_stars']) ? $this->request->data['TourHotel']['thtl_stars'] : ''; ?>" /></td>
        </tr>
        <tr>
            <td><label for="thtl_type"><?php echo __('Type'); ?></label></td>
            <td><?php echo $this->Form->select('TourHotel.thtl_type', $hotelTypeList, array('empty' => false, 'value' => isset($this->request->data['TourHotel']['thtl_type']) ? $this->request->data['TourHotel']['thtl_type'] : '')); ?></td>
        </tr>
        <tr>
            <td><label for="thtl_season"><?php echo __('Season'); ?></label></td>
            <td><?php echo $this->Form->select('TourHotel.thtl_season', $seasonList, array('empty' => false, 'value' => isset($this->request->data['TourHotel']['thtl_season']) ? $this->request->data['TourHotel']['thtl_season'] : '')); ?></td>
        </tr>
        <tr>
            <td><label for="thtl_room_type"><?php echo __('Room Type'); ?></label></td>
            <td><input type="text" name="data[TourHotel][thtl_room_type]" id="thtl_room_type" class="text w_20" maxlength="50" value="<?php echo isset($this->request->data['TourHotel']['thtl_room_type']) ? $this->request->data['TourHotel']['thtl_room_type'] : ''; ?>" /></td>
        </tr>
        <tr>
            <td><label for="thtl_adult"><?php echo __('Adult'); ?></label></td>
            <td><input type="text" name="data[TourHotel][thtl_adult]" id="thtl_adult" class="text w_10 numbersOnly autoNumeric number" maxlength="11" value="<?php echo isset($this->request->data['TourHotel']['thtl_adult']) ? $this->Converter->formatNumber($this->request->data['TourHotel']['thtl_adult']) : ''; ?>" /></td>
        </tr>
        <tr>
            <td><label for="thtl_child"><?php echo __('Child'); ?></label></td>
            <td><input type="text" name="data[TourHotel][thtl_child]" id="thtl_child" class="text w_10 numbersOnly autoNumeric number" maxlength="11" value="<?php echo isset($this->request->data['TourHotel']['thtl_child']) ? $this->Converter->formatNumber($this->request->data['TourHotel']['thtl_child']) : ''; ?>" /></td>
        </tr>
        <tr>
            <td><label for="thtl_child_ext_bed"><?php echo __('Child Ext Bed'); ?></label></td>
            <td><input type="text" name="data[TourHotel][thtl_child_ext_bed]" id="thtl_child_ext_bed" class="text w_10 numbersOnly autoNumeric number" maxlength="11" value="<?php echo isset($this->request->data['TourHotel']['thtl_child_ext_bed']) ? $this->Converter->formatNumber($this->request->data['TourHotel']['thtl_child_ext_bed']) : ''; ?>" /></td>
        </tr>
        <tr>
            <td><label for="thtl_child_no_bed"><?php echo __('Child No Bed'); ?></label></td>
            <td><input type="text" name="data[TourHotel][thtl_child_no_bed]" id="thtl_child_no_bed" class="text w_10 numbersOnly autoNumeric number" maxlength="11" value="<?php echo isset($this->request->data['TourHotel']['thtl_child_no_bed']) ? $this->Converter->formatNumber($this->request->data['TourHotel']['thtl_child_no_bed']) : ''; ?>" /></td>
        </tr>
        <tr>
            <td><label for="thtl_single_supp"><?php echo __('Single Supp'); ?></label></td>
            <td><input type="text" name="data[TourHotel][thtl_single_supp]" id="thtl_single_supp" class="text w_10 numbersOnly autoNumeric number" maxlength="11" value="<?php echo isset($this->request->data['TourHotel']['thtl_single_supp']) ? $this->Converter->formatNumber($this->request->data['TourHotel']['thtl_single_supp']) : ''; ?>" /></td>
        </tr>
        <tr>
            <td><label for="thtl_remarks"><?php echo __('Remarks'); ?></label></td>
            <td><textarea id="thtl_remarks" name="data[TourHotel][thtl_remarks]" class="tinymce" style="height: 300px;"><?php echo isset($this->request->data['TourHotel']['thtl_remarks']) ? $this->request->data['TourHotel']['thtl_remarks'] : ''; ?></textarea></td>
        </tr>
        <?php echo $this->element('btnSaveUpdate', array('formId' => 'TourHotelAddForm', 'text' => __('Save'))); ?>    
    </table>

    <?php echo $this->Form->end(); ?>
</div>