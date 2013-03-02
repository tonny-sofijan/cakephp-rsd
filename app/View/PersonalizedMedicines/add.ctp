<div class="personalizedMedicines form">

    <h1><?php echo __('Tambah Obat Racik'); ?></h1>

    <?php echo $this->Form->create('PersonalizedMedicine'); ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="PersonalizedMedicineSerial"><?php echo __('No. Seri obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('serial', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_15'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="PersonalizedMedicineName"><?php echo __('Nama obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('name', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_20'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="PersonalizedMedicineBrand"><?php echo __('Merk obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('brand', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_10'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="PersonalizedMedicineType"><?php echo __('Jenis obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('type', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_20'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="PersonalizedMedicineCategory"><?php echo __('Kategori obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('category', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_20'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="PersonalizedMedicinePriceOfCapital"><?php echo __('Harga modal'); ?></label></td>
            <td>
                <?php echo $this->Form->input('price_of_capital', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_10 numbersOnly autoNumeric',
                    'type' => 'text'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="PersonalizedMedicineSellingPrice"><?php echo __('Harga jual'); ?></label></td>
            <td>
                <?php echo $this->Form->input('selling_price', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_10 numbersOnly autoNumeric',
                    'type' => 'text'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="PersonalizedMedicineStock"><?php echo __('Stok obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('stock', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_10 numbersOnly',
                    'type' => 'text'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="PersonalizedMedicineUnitOfMeasure"><?php echo __('Satuan / Ukuran'); ?></label></td>
            <td>
                <?php echo $this->Form->input('unit_of_measure', array(
					'type' => 'select',
					'options' => $this->Constant->getMedicineUnits(),
                    'label' => false,
                    'div' => false,
                )); ?>
            </td>
        </tr>
    </table>

    <?php echo $this->element('btnSaveUpdate', array('formId' => 'PersonalizedMedicineAddForm', 'text' => __('Simpan'))); ?>    
    <?php echo $this->Form->end(); ?>
</div>
