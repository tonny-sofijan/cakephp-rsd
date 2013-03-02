<div class="userRoles index">
	<h2><?php echo __('User Roles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('role_name');?></th>
			<th><?php echo $this->Paginator->sort('role_active');?></th>
			<th><?php echo $this->Paginator->sort('created_date');?></th>
			<th><?php echo $this->Paginator->sort('updated_date');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('updated_by');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($userRoles as $userRole): ?>
	<tr>
		<td><?php echo h($userRole['UserRole']['id']); ?>&nbsp;</td>
		<td><?php echo h($userRole['UserRole']['role_name']); ?>&nbsp;</td>
		<td><?php echo h($userRole['UserRole']['role_active']); ?>&nbsp;</td>
		<td><?php echo h($userRole['UserRole']['created_date']); ?>&nbsp;</td>
		<td><?php echo h($userRole['UserRole']['updated_date']); ?>&nbsp;</td>
		<td><?php echo h($userRole['UserRole']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($userRole['UserRole']['updated_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userRole['UserRole']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userRole['UserRole']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userRole['UserRole']['id']), null, __('Anda yakin akan menghapus # %s?', $userRole['UserRole']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User Role'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
