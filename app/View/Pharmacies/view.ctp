<div class="pharmacies view">
<h2><?php  echo __('Pharmacy');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pharmacy['Pharmacy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redeem Date'); ?></dt>
		<dd>
			<?php echo h($pharmacy['Pharmacy']['redeem_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prescription'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pharmacy['Prescription']['id'], array('controller' => 'prescriptions', 'action' => 'view', $pharmacy['Prescription']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($pharmacy['Pharmacy']['created_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated Date'); ?></dt>
		<dd>
			<?php echo h($pharmacy['Pharmacy']['updated_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($pharmacy['Pharmacy']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($pharmacy['Pharmacy']['updated_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pharmacy'), array('action' => 'edit', $pharmacy['Pharmacy']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pharmacy'), array('action' => 'delete', $pharmacy['Pharmacy']['id']), null, __('Are you sure you want to delete # %s?', $pharmacy['Pharmacy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pharmacies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pharmacy'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prescriptions'), array('controller' => 'prescriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prescription'), array('controller' => 'prescriptions', 'action' => 'add')); ?> </li>
	</ul>
</div>
