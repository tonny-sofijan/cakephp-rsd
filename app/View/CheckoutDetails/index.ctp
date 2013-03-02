
<div class="checkoutDetails index">

    <h1><?php echo __('Checkout Details'); ?></h1>

    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
				<?php echo $this->Html->link(__('New Checkout Detail'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
			<th><?php echo $this->Paginator->sort('checkout_id'); ?></th>
			<th><?php echo $this->Paginator->sort('service_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cd_qty'); ?></th>
			<th><?php echo $this->Paginator->sort('cd_cost'); ?></th>
			<th width="150px"><?php echo __('Actions'); ?></th>
        </tr>
		<?php $i = $this->Paginator->counter('{:start}'); ?>
		<?php foreach ($checkoutDetails as $checkoutDetail): ?>
			<tr>
				<td><?php echo $i++; ?>.</td>
				<td>
					<?php echo $this->Html->link($checkoutDetail['Checkout']['id'], array('controller' => 'checkouts', 'action' => 'view', $checkoutDetail['Checkout']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($checkoutDetail['ServiceType']['id'], array('controller' => 'service_types', 'action' => 'view', $checkoutDetail['ServiceType']['id'])); ?>
				</td>
				<td><?php echo h($checkoutDetail['CheckoutDetail']['cd_qty']); ?>&nbsp;</td>
				<td><?php echo h($checkoutDetail['CheckoutDetail']['cd_cost']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $checkoutDetail['CheckoutDetail']['id']), array('class' => 'link view')); ?> |
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $checkoutDetail['CheckoutDetail']['id']), array('class' => 'link edit')); ?> |
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $checkoutDetail['CheckoutDetail']['id']), array('class' => 'link delete'), __('Are you sure you want to delete %s?', $checkoutDetail['CheckoutDetail']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
    </table>

	<?php echo $this->element('admPagination'); ?>

</div>
