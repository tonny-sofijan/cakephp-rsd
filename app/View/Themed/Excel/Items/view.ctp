<div class="items index">
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>##</th>
				<th>Nama Barang</th>
				<th>Merk</th>
				<th>Jenis</th>
				<th>Tgl. Masuk</th>
				<th>Modal</th>
				<th>Hrg. Jual</th>
				<th>Stok</th>
				<th class="actions"><?php echo __('Tindakan'); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo h($item['Item']['id']); ?>&nbsp;</td>
				<td><?php echo h($item['Item']['item_name']); ?>&nbsp;</td>
				<td><?php echo h($item['Item']['item_brand']); ?>&nbsp;</td>
				<td><?php echo $this->Converter->itemType($item['Item']['item_type']); ?>&nbsp;</td>
				<td><?php echo h($item['Item']['date_in']); ?>&nbsp;</td>
				<td><?php echo number_format($item['Item']['price_of_capital'], 0, ',', '.'); ?>&nbsp;</td>
				<td><?php echo number_format($item['Item']['selling_price'], 0, ',', '.'); ?>&nbsp;</td>
				<td><?php echo h($item['Item']['item_stock']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link('stok', array('controller' => 'item_supplies', 'action' => 'add', $item['Item']['id']), array('class' => 'sprite add')); ?>
					<?php echo $this->Html->link('ubah', array('action' => 'edit', $item['Item']['id']), array('class' => 'sprite edit')); ?>
					<?php echo $this->Form->postLink('hapus', array('action' => 'delete', $item['Item']['id']), array('class' => 'sprite delete'), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<br />

<div class="itemSupplies index">
	<h2><?php echo __('Item Supplies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th><?php echo $this->Paginator->sort('quantity'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($itemSupplies as $itemSupply): ?>
				<tr>
					<td><?php echo h($itemSupply['ItemSupply']['id']); ?>&nbsp;</td>
					<td><?php echo h($itemSupply['ItemSupply']['created']); ?>&nbsp;</td>
					<td><?php echo h($itemSupply['ItemSupply']['quantity']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Form->postLink('hapus', array('controller' => 'item_supplies', 'action' => 'delete', $itemSupply['ItemSupply']['id']), array('class' => 'sprite delete'), __('Are you sure you want to delete # %s?', $itemSupply['ItemSupply']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
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
