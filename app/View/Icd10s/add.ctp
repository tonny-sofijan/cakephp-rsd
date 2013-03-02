<div class="icd10s form">

    <h1><?php echo __('Tambah Icd10'); ?></h1>

    <?php echo $this->Form->create('Icd10'); ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="icd"><?php echo __('ICD'); ?></label></td>
            <td>
                <?php echo $this->Form->input('icd', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_20'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="dtd"><?php echo __('DTD'); ?></label></td>
            <td>
                <?php echo $this->Form->input('dtd', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_40'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="dtd_code"><?php echo __('Kode DTD'); ?></label></td>
            <td>
                <?php echo $this->Form->input('dtd_code', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_20'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="dtd_group"><?php echo __('Grup DTD'); ?></label></td>
            <td>
                <?php echo $this->Form->input('dtd_group', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_40'
                )); ?>
            </td>
        </tr>

    </table>

    <?php echo $this->element('btnSaveUpdate', array('formId' => 'Icd10AddForm', 'text' => __('Simpan'))); ?>    
    <?php echo $this->Form->end(); ?>
</div>