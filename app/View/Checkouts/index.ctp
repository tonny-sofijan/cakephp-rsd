
<div class="checkouts index">

    <h1><?php echo __('Checkouts'); ?></h1>

	<div class="search">
		<?php echo $this->Form->create('Doctor'); ?>
		<div class="buttonWrapper clearfix">
			<?php echo $this->Form->select('c', $options, array('empty' => false)); ?>
			<?php echo $this->Form->input('q', array('label' => false, 'div' => false, 'class' => 'text w_15')) ?>
			<?php echo $this->Form->button('cari', array('type' => 'submit', 'class' => 'linkIco')); ?>
			<?php echo $this->Form->end(); ?>

			<div style="float: right;">
				<span class="btnClose last">
					<?php echo $this->Html->link(__('New Checkout'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
				</span>
			</div>
		</div>
	</div>
    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_registration_id'); ?></th>
			<th><?php echo $this->Paginator->sort('service_grade'); ?></th>
			<th><?php echo $this->Paginator->sort('total_cost'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th width="150px"><?php echo __('Actions'); ?></th>
        </tr>
		<?php $i = $this->Paginator->counter('{:start}'); ?>
		<?php foreach ($checkouts as $checkout): ?>
			<tr>
				<td><?php echo $i++; ?>.</td>
				<td>
					<?php echo $this->Html->link($checkout['PatientRegistration']['id'], array('controller' => 'patient_registrations', 'action' => 'view', $checkout['PatientRegistration']['id'])); ?>
				</td>
				<td><?php echo h($checkout['Checkout']['service_grade']); ?>&nbsp;</td>
				<td><?php echo h($checkout['Checkout']['total_cost']); ?>&nbsp;</td>
				<td><?php echo h($checkout['Checkout']['note']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $checkout['Checkout']['id']), array('class' => 'link view')); ?> |
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $checkout['Checkout']['id']), array('class' => 'link edit')); ?> |
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $checkout['Checkout']['id']), array('class' => 'link delete'), __('Are you sure you want to delete %s?', $checkout['Checkout']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
    </table>

	<?php echo $this->element('admPagination'); ?>

</div>
