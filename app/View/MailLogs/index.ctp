
<div class="mailLogs index">

    <h1><?php echo __('Mail Logs'); ?></h1>

    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
				<?php echo $this->Html->link(__('New Mail Log'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
			<th><?php echo $this->Paginator->sort('mail_type'); ?></th>
			<th><?php echo $this->Paginator->sort('mail_pk'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('mail_prev_status'); ?></th>
			<th><?php echo $this->Paginator->sort('mail_current_status'); ?></th>
			<th width="150px"><?php echo __('Actions'); ?></th>
        </tr>
		<?php $i = $this->Paginator->counter('{:start}'); ?>
		<?php foreach ($mailLogs as $mailLog): ?>
			<tr>
				<td><?php echo $i++; ?>.</td>
				<td><?php echo h($mailLog['MailLog']['mail_type']); ?>&nbsp;</td>
				<td><?php echo h($mailLog['MailLog']['mail_pk']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($mailLog['User']['id'], array('controller' => 'users', 'action' => 'view', $mailLog['User']['id'])); ?>
				</td>
				<td><?php echo h($mailLog['MailLog']['mail_prev_status']); ?>&nbsp;</td>
				<td><?php echo h($mailLog['MailLog']['mail_current_status']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $mailLog['MailLog']['id']), array('class' => 'link view')); ?> |
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mailLog['MailLog']['id']), array('class' => 'link edit')); ?> |
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mailLog['MailLog']['id']), array('class' => 'link delete'), __('Anda yakin akan menghapus %s?', $mailLog['MailLog']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
    </table>

	<?php echo $this->element('admPagination'); ?>

</div>
