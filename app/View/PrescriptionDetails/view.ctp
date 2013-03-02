<div class="prescriptionDetails view">
<h2><?php  echo __('Prescription Detail');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prescriptionDetail['PrescriptionDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prescription'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prescriptionDetail['Prescription']['id'], array('controller' => 'prescriptions', 'action' => 'view', $prescriptionDetail['Prescription']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medicament'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prescriptionDetail['Medicament']['name'], array('controller' => 'medicaments', 'action' => 'view', $prescriptionDetail['Medicament']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Personalized Medicine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prescriptionDetail['PersonalizedMedicine']['name'], array('controller' => 'personalized_medicines', 'action' => 'view', $prescriptionDetail['PersonalizedMedicine']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dose'); ?></dt>
		<dd>
			<?php echo h($prescriptionDetail['PrescriptionDetail']['dose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($prescriptionDetail['PrescriptionDetail']['price']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prescription Detail'), array('action' => 'edit', $prescriptionDetail['PrescriptionDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prescription Detail'), array('action' => 'delete', $prescriptionDetail['PrescriptionDetail']['id']), null, __('Are you sure you want to delete # %s?', $prescriptionDetail['PrescriptionDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prescription Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prescription Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prescriptions'), array('controller' => 'prescriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prescription'), array('controller' => 'prescriptions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medicaments'), array('controller' => 'medicaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medicament'), array('controller' => 'medicaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personalized Medicines'), array('controller' => 'personalized_medicines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Personalized Medicine'), array('controller' => 'personalized_medicines', 'action' => 'add')); ?> </li>
	</ul>
</div>
