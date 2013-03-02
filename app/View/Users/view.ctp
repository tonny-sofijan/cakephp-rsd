<div class="users view">

    <h1><?php  echo __('User');?></h1>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
		<td width="20%"><?php echo __('Username'); ?></td>
		<td><?php echo h($user['User']['user_username']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Password'); ?></td>
		<td><?php echo h($user['User']['user_password']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Employee Id'); ?></td>
		<td><?php echo h($person['Person']['person_first_name']) . ' ' . h($person['Person']['person_last_name']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('User Role'); ?></td>
		<td><?php echo $this->Html->link($user['UserRole']['role_name'], array('controller' => 'user_roles', 'action' => 'view', $user['UserRole']['id'])); ?></td>
	</tr>
        
    </table>
    
	<?php echo $this->element('btnBack'); ?>
</div>