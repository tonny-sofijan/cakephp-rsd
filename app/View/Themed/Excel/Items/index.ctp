<div class="search">
	<?php echo $this->Form->create('Item'); ?>
	<?php echo $this->Form->select('c', $options, array('empty' => false)); ?>
	<?php echo $this->Form->input('q', array('label' => false, 'div' => false)) ?>
	<?php echo $this->Form->button('cari', array('type' => 'submit')); ?>
	<?php echo $this->Html->link('barang', array('action' => 'add'), array('class' => 'sprite add')); ?>
	<?php echo $this->Form->end(); ?>
</div>

<div class="items index">
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('item_name', 'Nama Barang'); ?></th>
				<th><?php echo $this->Paginator->sort('item_brand', 'Merk'); ?></th>
				<th><?php echo $this->Paginator->sort('item_type', 'Jenis'); ?></th>
				<th><?php echo $this->Paginator->sort('date_in', 'Tgl. Masuk'); ?></th>
				<th><?php echo $this->Paginator->sort('price_of_capital', 'Modal'); ?></th>
				<th><?php echo $this->Paginator->sort('selling_price', 'Hrg. Jual'); ?></th>
				<th><?php echo $this->Paginator->sort('item_stock', 'Stok'); ?></th>
				<th class="actions"><?php echo __('Tindakan'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($items as $idx => $item): ?>
				<tr>
					<td><?php echo $idx + 1; ?>&nbsp;</td>
					<td><?php echo h($item['Item']['item_name']); ?>&nbsp;</td>
					<td><?php echo h($item['Item']['item_brand']); ?>&nbsp;</td>
					<td><?php echo $this->Converter->itemType($item['Item']['item_type']); ?>&nbsp;</td>
					<td><?php echo h($item['Item']['date_in']); ?>&nbsp;</td>
					<td><?php echo number_format($item['Item']['price_of_capital'], 0, ',', '.'); ?>&nbsp;</td>
					<td><?php echo number_format($item['Item']['selling_price'], 0, ',', '.'); ?>&nbsp;</td>
					<td><?php echo h($item['Item']['item_stock']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link('stok', array('controller' => 'item_supplies', 'action' => 'add', $item['Item']['id']), array('class' => 'sprite add')); ?>
						<?php echo $this->Html->link('rincian', array('action' => 'view', $item['Item']['id']), array('class' => 'sprite edit')); ?>
						<?php echo $this->Html->link('ubah', array('action' => 'edit', $item['Item']['id']), array('class' => 'sprite edit')); ?>
						<?php echo $this->Form->postLink('hapus', array('action' => 'delete', $item['Item']['id']), array('class' => 'sprite delete'), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>
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
