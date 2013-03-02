<div class="cds form">

    <h1><?php echo __('Add Checkout Detail'); ?></h1>

	<?php echo $this->Form->create('CheckoutDetail'); ?>
	<input type="hidden" name="data[CheckoutDetail][service_type_id]" id="service_type_id" value="<?php echo isset($this->request->data['ServiceType']['id']) ? $this->request->data['ServiceType']['id'] : ''; ?>" />

    <table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td>#</td>
			<td>JENIS LAYANAN</td>
			<td>TARIF</td>
			<td>SATUAN</td>
			<td>JUMLAH</td>
			<td>TOTAL</td>
		</tr>
		<tr>
			<td>#</td>
			<td><input type="text" id="service_type_info" class="text w_40 service_type_info" maxlength="64" /></td>
			<td>
				<?php
				echo $this->Form->input('cd_cost', array(
					'class' => 'text w_5',
					'label' => false,
				));
				?>
			</td>
			<td><div class="unit"></div></td>
			<td>
				<?php
				echo $this->Form->input('cd_qty', array(
					'class' => 'text w_5',
					'label' => false,
				));
				?>
			</td>
			<td><div class="total"></div></td>
		</tr>
    </table>

	<?php echo $this->element('btnSaveUpdate', array('formId' => 'CheckoutDetailAddForm', 'text' => __('Save'))); ?>    
	<?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
        $( ".service_type_info" ).autocomplete({
			source: '/rsd/service_types/autocomplete/<?php echo $checkout['Checkout']['id'] ?>',
            minLength: 2,
            select: function(event, ui) {
				$('#service_type_id').val(ui.item.id);
				$('#CheckoutDetailCdCost').val(ui.item.cost);
				$('.unit').empty().append(ui.item.unit);
            }
        });
		
		$("#CheckoutDetailCdQty").keyup(function() {
			var n1 = parseFloat($('#CheckoutDetailCdCost').val());
			var n2 = parseFloat($(this).val());
			$('.total').empty().append(n1*n2);
		});
    });
</script>
