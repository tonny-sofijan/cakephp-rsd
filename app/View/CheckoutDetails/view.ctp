<div class="checkoutDetails view">
    
    <h1><?php  echo __('Checkout Detail');?></h1>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
		<td width="20%"><?php echo __('Checkout'); ?></td>
		<td><?php echo $this->Html->link($checkoutDetail['Checkout']['id'], array('controller' => 'checkouts', 'action' => 'view', $checkoutDetail['Checkout']['id'])); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Service Type'); ?></td>
		<td><?php echo $this->Html->link($checkoutDetail['ServiceType']['id'], array('controller' => 'service_types', 'action' => 'view', $checkoutDetail['ServiceType']['id'])); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Cd Qty'); ?></td>
		<td><?php echo h($checkoutDetail['CheckoutDetail']['cd_qty']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Cd Cost'); ?></td>
		<td><?php echo h($checkoutDetail['CheckoutDetail']['cd_cost']); ?></td>
	</tr>
        
    </table>
    
	<?php echo $this->element('btnBack'); ?>
</div>