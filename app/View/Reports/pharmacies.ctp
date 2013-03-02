<div class="patientRegistrations index">
	<h1><?php echo __('Laporan Harian Penjualan Obat'); ?></h1>

	<div class="search">
		<?php echo $this->Form->create('Pharmacy'); ?>
		<div class="buttonWrapper clearfix">
			Tanggal: 
			<?php echo $this->Form->input('q', array('label' => false, 'div' => false, 'class' => 'text w_15 date')) ?>
			<?php echo $this->Form->button('cari', array('type' => 'submit', 'class' => 'linkIco')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>

    <div class="giveMeSpace"></div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>Tanggal Tebus</th>
			<th>Resep</th>
			<th>Biaya</th>
		</tr>
		<?php $total = 0; ?>
		<?php foreach ($pharmacies as $pharmacy): ?>
			<?php $total += $pharmacy['Pharmacy']['registration_cost']; ?>
			<tr>
				<td><?php echo h($pharmacy['Doctor']['doctor_specialty']); ?>&nbsp;</td>
				<td><?php echo number_format($pharmacy['Pharmacy']['registration_cost'], 0, ',', '.'); ?>&nbsp;</td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="2" class="right bold">Total</td>
			<td colspan="1" class="bold"><?php echo number_format($total, 0, ',', '.'); ?></td>
		</tr>
	</table>
</div>

<script>
	$(document).ready(function() {
		$('.date').datepicker({
			changeMonth:true,
			changeYear:true,
			dateFormat:'yy-mm-dd'
		});
	});
</script>