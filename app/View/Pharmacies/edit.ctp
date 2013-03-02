<div class="pharmacies form">
<?php echo $this->Form->create('Pharmacy');?>
	<fieldset>
		<legend><?php echo __('Edit Pharmacy'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('redeem_date');
		echo $this->Form->input('prescription_id');
		echo $this->Form->input('created_date');
		echo $this->Form->input('updated_date');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Pharmacy.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Pharmacy.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pharmacies'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Prescriptions'), array('controller' => 'prescriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prescription'), array('controller' => 'prescriptions', 'action' => 'add')); ?> </li>
	</ul>
</div>
