<div class="items form">
	<?php echo $this->Form->create('Item'); ?>
	<?php
	echo $this->Form->input('id');
	echo $this->Form->input('item_name', array('label' => 'Nama Barang'));
	echo $this->Form->input('item_brand', array('label' => 'Merk', 'readonly' => 'readonly'));
	echo $this->Form->input('selling_price', array('label' => 'Harga Jual', 'readonly' => 'readonly'));
	echo $this->Form->input('new_stock', array('type' => 'hidden'));
	echo $this->Form->input('item_stock', array('label' => 'Stok', 'readonly' => 'readonly'));
//		echo $this->Ajax->autocomplete('Item.item_name', array(
//			'source' => array(
//				'controller' => 'items',
//				'action' => 'autoComplete',
//			)
//		));
	echo $this->Form->input('stock_in', array('label' => 'Stok Masuk'));

	echo $this->Form->button('Submit', array('type' => 'submit'));
	echo $this->Form->button('Reset', array('type' => 'reset'));
	echo $this->Form->button('Back', array('type' => 'button', 'class' => 'btnCancel', 'onclick' => "location.href='" . $this->webroot . "items'"));
	?>
<?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
	$(function() {
        $( "#ItemItemName" ).autocomplete({
			source: '/ctr/items/autocomplete',
            minLength: 2,
            select: function(event, ui) {
				$('#ItemId').val(ui.item.id);
				$('#ItemItemBrand').val(ui.item.item_brand);
				$('#ItemSellingPrice').val(ui.item.selling_price);
				$('#ItemItemStock').val(ui.item.item_stock);
				$('#ItemNewStock').val(ui.item.item_stock);
            }
        })
		
		$('#ItemStockIn').keyup(function() {
			var n1 = parseFloat($('#ItemNewStock').val());
			var n2 = parseFloat($('#ItemStockIn').val());
			
			$('#ItemItemStock').val(n1 + n2);
		});
    });	
</script>
