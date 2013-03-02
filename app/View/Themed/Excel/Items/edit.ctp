<div class="items form">
<?php echo $this->Form->create('Item'); ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_name', array('label' => 'Nama Barang'));
		echo $this->Form->input('item_brand', array('label' => 'Merk'));
		echo $this->Form->input('item_type', array('label' => 'Jenis', 'type' => 'select', 'options' => $this->Constant->getItemType()));
		echo $this->Form->input('price_of_capital', array('label' => 'Modal'));
		echo $this->Form->input('selling_price', array('label' => 'Harga Jual'));
		
		echo $this->Form->button('Submit', array('type' => 'submit'));
		echo $this->Form->button('Reset', array('type' => 'reset'));
		echo $this->Form->button('Back', array('type' => 'button', 'class' => 'btnCancel', 'onclick' => "location.href='" . $this->webroot . "items'"));
	?>
<?php echo $this->Form->end(); ?>
</div>
