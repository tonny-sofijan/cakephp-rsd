<div class="items index">
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>id</th>
				<th>Nama Barang</th>
				<th>Merk</th>
				<th>Jenis</th>
				<th>Tgl. Masuk</th>
				<th>Modal</th>
				<th>Hrg. Jual</th>
				<th>Stok</th>
			</tr>
		</thead>
		<tbody>
			<?php $tstock = 0; ?>
			<?php foreach ($items as $idx => $item): ?>
				<?php $tstock += $item['Item']['item_stock']; ?>
				<tr>
					<td><?php echo $idx + 1; ?>&nbsp;</td>
					<td><?php echo h($item['Item']['item_name']); ?>&nbsp;</td>
					<td><?php echo h($item['Item']['item_brand']); ?>&nbsp;</td>
					<td><?php echo $this->Converter->itemType($item['Item']['item_type']); ?>&nbsp;</td>
					<td><?php echo h($item['Item']['date_in']); ?>&nbsp;</td>
					<td><?php echo $item['Item']['price_of_capital']; ?>&nbsp;</td>
					<td><?php echo $item['Item']['selling_price']; ?>&nbsp;</td>
					<td><?php echo h($item['Item']['item_stock']); ?>&nbsp;</td>
				</tr>
			<?php endforeach; ?>
				<tr>
					<td colspan="7">TOTAL</td>
					<td><?php echo $tstock; ?></td>
				</tr>
				<tr>
					<td colspan="7" align="right">TOTAL</td>
					<td><?php echo '=SUM()'; ?></td>
				</tr>
		</tbody>
	</table>
</div>
