<div class="checkouts view">

    <h1><?php echo __('Checkout'); ?></h1>

    <table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td width="20%"><?php echo __('Patient Registration'); ?></td>
			<td><?php echo $this->Html->link($checkout['PatientRegistration']['id'], array('controller' => 'patient_registrations', 'action' => 'view', $checkout['PatientRegistration']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Service Grade'); ?></td>
			<td><?php echo $this->Converter->serviceGrade($checkout['Checkout']['service_grade']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Total Cost'); ?></td>
			<td>Rp <?php echo number_format($checkout['Checkout']['total_cost'], 0, ',', '.'); ?>,-</td>
		</tr>
		<tr>
			<td><?php echo __('Note'); ?></td>
			<td><?php echo h($checkout['Checkout']['note']); ?></td>
		</tr>

    </table>
</div>


<div class="checkoutDetails index">
    <div class="buttonWrapper clearfix">
		<span class="btnClose last">
			<?php echo $this->Html->link(__('Simpan Excel'), array('controller' => 'to_excel', 'action' => 'checkout', $checkout['Checkout']['id']), array('class' => 'linkIco icoAdd')); ?>
		</span>
        <div style="float: right;">
            <span class="btnClose last">
				<?php echo $this->Html->link(__('Jenis Layanan'), array('controller' => 'checkout_details', 'action' => 'add', $checkout['Checkout']['id']), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
			<th><?php echo $this->Paginator->sort('service_type_id', 'Jenis Layanan'); ?></th>
			<th><?php echo $this->Paginator->sort('cd_cost', 'Tarif'); ?></th>
			<th>Satuan</th>
			<th><?php echo $this->Paginator->sort('cd_qty', 'Jumlah'); ?></th>
			<th><?php echo $this->Paginator->sort('cd_qty', 'Total'); ?></th>
			<th width="150px"><?php echo __('Actions'); ?></th>
        </tr>
		<?php $i = $this->Paginator->counter('{:start}'); ?>
		<?php $gtotal = 0; ?>
		<?php foreach ($checkoutDetails as $checkoutDetail): ?>
			<?php $gtotal += $checkoutDetail['CheckoutDetail']['cd_qty'] * $checkoutDetail['CheckoutDetail']['cd_cost']; ?>
			<tr>
				<td><?php echo $i++; ?>.</td>
				<td>
					<?php echo $this->Html->link($checkoutDetail['ServiceType']['type_of_service'], array('controller' => 'service_types', 'action' => 'view', $checkoutDetail['ServiceType']['id'])); ?>
				</td>
				<td><?php echo number_format($checkoutDetail['CheckoutDetail']['cd_cost'], 0, ',', '.'); ?>&nbsp;</td>
				<td><?php echo $this->Converter->serviceTypeUnit($checkoutDetail['ServiceType']['unit']); ?>&nbsp;</td>
				<td><?php echo h($checkoutDetail['CheckoutDetail']['cd_qty']); ?>&nbsp;</td>
				<td><?php echo number_format($checkoutDetail['CheckoutDetail']['cd_qty'] * $checkoutDetail['CheckoutDetail']['cd_cost'], 0, ',', '.'); ?>&nbsp;</td>
				<td>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'checkout_details', 'action' => 'delete', $checkoutDetail['CheckoutDetail']['id']), array('class' => 'link delete'), __('Are you sure you want to delete %s?', $checkoutDetail['CheckoutDetail']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td class="right">TOTAL</td>
			<td><?php echo number_format($gtotal, 0, ',', '.'); ?>&nbsp;</td>
			<td><?php echo $this->Html->link(__('CETAK'), array('controller' => 'to_excel', 'action' => 'checkout', $checkout['Checkout']['id'])); ?>&nbsp;</td>
		</tr>
    </table>

	<?php echo $this->element('admPagination'); ?>

</div>
