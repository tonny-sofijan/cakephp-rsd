<div class="userRoles form">
<?php echo $this->Form->create('UserRole');?>
	<fieldset>
		<legend><?php echo __('Edit User Role'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('role_name');
		echo $this->Form->input('role_active');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserRole.id')), null, __('Anda yakin akan menghapus # %s?', $this->Form->value('UserRole.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
