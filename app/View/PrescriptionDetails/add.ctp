<div class="prescriptionDetails form">
    <h1><?php echo __('Tambah Rincian Obat'); ?></h1>

    <?php echo $this->Form->create('PrescriptionDetail'); ?>
    
    <?php     
        echo $this->Form->hidden('prescription_id', array('value' => $prescriptionId));
        echo $this->Form->hidden('medicament_id', array('id' => 'medicament_id'));
        echo $this->Form->hidden('personalized_medicine_id', array('id' => 'personalized_medicine_id'));
        echo $this->Form->hidden('patent_medicine_id', array('id' => 'patent_medicine_id'));
    ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="medicament_type"><?php echo __('Jenis Obat'); ?></label></td>
            <td><?php echo $this->Form->select('medicament_type', $this->Constant->getMedicamentTypeList(), array('empty' => false)); ?></td>
        </tr>
        <tr>
            <td width="20%"><label for="medicament_id"><?php echo __('Obat'); ?></label></td>
            <td id="cell_generic">
                <?php echo $this->Form->input('medicament_info', array(
                    'id' => 'medicament_info',
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_40'
                )) ?>
            </td>
            <td id="cell_personalized">
                <?php echo $this->Form->input('personalized_medicine_info', array(
                    'id' => 'personalized_medicine_info',
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_40'
                )) ?>
            </td>
            <td id="cell_patent">
                <?php echo $this->Form->input('patent_medicine_info', array(
                    'id' => 'patent_medicine_info',
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_40'
                )) ?>
            </td>
        </tr>
        <tr>
            <td><label for="unit_price"><?php echo __('Harga satuan'); ?></label></td>
            <td>
                <?php echo $this->Form->input('unit_price', array(
                    'id' => 'unit_price',
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_10 numbersOnly autoNumeric',
                    'onfocus' => 'this.blur()',
                    'type' => 'text'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="dose"><?php echo __('Dosis/ takaran/ banyaknya'); ?></label></td>
            <td>
                <?php echo $this->Form->input('dose', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_5'
                )) ?>
            </td>
        </tr>
    </table>

    <?php echo $this->element('btnSaveUpdate', array('formId' => 'PrescriptionDetailAddForm', 'text' => __('Simpan'), 'useReferer' => true)); ?>
    <?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        
        var type = $('#PrescriptionDetailMedicamentType option:selected').val();
        medicamentTypeOnChange(type);
        
        $('#PrescriptionDetailMedicamentType').change(function(){ medicamentTypeOnChange($(this).val()); });
        
        function medicamentTypeOnChange(type) {
            if (type == 0) { // generic
                $('#cell_generic').show();
                $('#cell_personalized').hide();
                $('#cell_patent').hide();
            } else if (type == 1) {
                $('#cell_generic').hide();
                $('#cell_personalized').show();
                $('#cell_patent').hide();
            } else {
                cell_patent
                $('#cell_generic').hide();
                $('#cell_personalized').hide();
                $('#cell_patent').show();
            }
        }
        
        $( "#medicament_info" ).autocomplete({
            source: '/rsd/medicaments/autocomplete',
            minLength: 2,
            select: function(event, ui) {
                $('#personalized_medicine_id').val(null);
                $('#personalized_medicine_info').val(null);
                $('#patent_medicine_id').val(null);
                $('#patent_medicine_info').val(null);
                
                $('#medicament_id').val(ui.item.id);
                $('#unit_price').val(ui.item.unit_price).trigger('blur');
            }
        });
        $( "#personalized_medicine_info" ).autocomplete({
            source: '/rsd/personalized_medicines/autocomplete',
            minLength: 2,
            select: function(event, ui) {
                $('#medicament_id').val(null);
                $('#medicament_info').val(null);
                $('#patent_medicine_id').val(null);
                $('#patent_medicine_info').val(null);
                
                $('#personalized_medicine_id').val(ui.item.id);
                $('#unit_price').val(ui.item.unit_price).trigger('blur');
            }
        });
        $( "#patent_medicine_info" ).autocomplete({
            source: '/rsd/patent_medicines/autocomplete',
            minLength: 2,
            select: function(event, ui) {
                $('#medicament_id').val(null);
                $('#medicament_info').val(null);
                $('#personalized_medicine_id').val(null);
                $('#personalized_medicine_info').val(null);
                
                $('#patent_medicine_id').val(ui.item.id);
                $('#unit_price').val(ui.item.unit_price).trigger('blur');
            }
        });
    });	
</script>
