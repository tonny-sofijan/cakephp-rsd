<div class="mailLogs view">
    
    <h1><?php  echo __('Mail Log');?></h1>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
		<td width="20%"><?php echo __('Mail Type'); ?></td>
		<td><?php echo h($mailLog['MailLog']['mail_type']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Mail Pk'); ?></td>
		<td><?php echo h($mailLog['MailLog']['mail_pk']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('User'); ?></td>
		<td><?php echo $this->Html->link($mailLog['User']['id'], array('controller' => 'users', 'action' => 'view', $mailLog['User']['id'])); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Mail Prev Status'); ?></td>
		<td><?php echo h($mailLog['MailLog']['mail_prev_status']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Mail Current Status'); ?></td>
		<td><?php echo h($mailLog['MailLog']['mail_current_status']); ?></td>
	</tr>
        
    </table>
    
	<?php echo $this->element('btnBack'); ?>
</div>