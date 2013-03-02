<div class="medicaments form">

    <h1><?php echo __('Tambah Obat'); ?></h1>

    <?php echo $this->Form->create('Medicament'); ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="MedicamentSerial"><?php echo __('No. Seri obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('serial', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_15'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="MedicamentName"><?php echo __('Nama obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('name', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_20'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="MedicamentBrand"><?php echo __('Merk obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('brand', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_10'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="MedicamentType"><?php echo __('Jenis obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('type', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_20'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="MedicamentCategory"><?php echo __('Kategori obat'); ?></label></td>
            <td>
                <?php echo $this->Form->input('category', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_20'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="MedicamentPriceOfCapital"><?php echo __('Harga modal'); ?></label></td>
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
            <td><label for="MedicamentSellingPrice"><?php echo __('Harga jual'); ?></label></td>
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
            <td><label for="MedicamentStock"><?php echo __('Stok obat'); ?></label></td>
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
            <td><label for="MedicamentUnitOfMeasure"><?php echo __('Satuan / Ukuran'); ?></label></td>
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

    <?php echo $this->element('btnSaveUpdate', array('formId' => 'MedicamentAddForm', 'text' => __('Simpan'))); ?>    
    <?php echo $this->Form->end(); ?>
</div>
