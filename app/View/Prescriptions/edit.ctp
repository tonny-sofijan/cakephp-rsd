<div class="prescriptions form">

    <h1><?php echo __('Ubah Resep'); ?></h1>

    <?php echo $this->Form->create('Prescription'); ?>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="total"><?php echo __('Total'); ?></label></td>
            <td>
                <?php echo $this->Form->input('total', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_10 numbersOnly autoNumeric',
                    'type' => 'text'
                )); ?>
            </td>
        </tr>
    </table>

    <?php echo $this->element('btnSaveUpdate', array('formId' => 'PrescriptionEditForm', 'text' => __('Ubah'))); ?>    
    <?php echo $this->Form->end(); ?>
</div>