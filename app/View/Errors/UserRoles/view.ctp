<div class="userRoles view">
<h2><?php  echo __('User Role');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role Name'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['role_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role Active'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['role_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['created_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated Date'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['updated_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['updated_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Role'), array('action' => 'edit', $userRole['UserRole']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Role'), array('action' => 'delete', $userRole['UserRole']['id']), null, __('Anda yakin akan menghapus # %s?', $userRole['UserRole']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users');?></h3>
	<?php if (!empty($userRole['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Username'); ?></th>
		<th><?php echo __('User Password'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('User Active'); ?></th>
		<th><?php echo __('User Last Login Date'); ?></th>
		<th><?php echo __('User Security Question'); ?></th>
		<th><?php echo __('User Security Answer'); ?></th>
		<th><?php echo __('User Role Id'); ?></th>
		<th><?php echo __('Created Date'); ?></th>
		<th><?php echo __('Updated Date'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($userRole['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['user_username'];?></td>
			<td><?php echo $user['user_password'];?></td>
			<td><?php echo $user['employee_id'];?></td>
			<td><?php echo $user['user_active'];?></td>
			<td><?php echo $user['user_last_login_date'];?></td>
			<td><?php echo $user['user_security_question'];?></td>
			<td><?php echo $user['user_security_answer'];?></td>
			<td><?php echo $user['user_role_id'];?></td>
			<td><?php echo $user['created_date'];?></td>
			<td><?php echo $user['updated_date'];?></td>
			<td><?php echo $user['created_by'];?></td>
			<td><?php echo $user['updated_by'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Anda yakin akan menghapus # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
