<div class="patientRegistrations index">
	<h1><?php echo __('Laporan Pendaftaran Pasien'); ?></h1>

	<div class="search">
		<?php echo $this->Form->create('PatientRegistration'); ?>
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
			<th>id</th>
			<th>Pasien</th>
			<th>Dokter</th>
			<th>UGD</th>
			<th>Biaya</th>
			<th>Tanggal</th>
			<th>Oleh</th>
		</tr>
		<?php $total = 0; ?>
		<?php foreach ($patientRegistrations as $patientRegistration): ?>
			<?php $total += $patientRegistration['PatientRegistration']['registration_cost']; ?>
			<tr>
				<td><?php echo h($patientRegistration['PatientRegistration']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($patientRegistration['Patient']['Person']['person_first_name'] . ' ' . $patientRegistration['Patient']['Person']['person_last_name'], array('controller' => 'patients', 'action' => 'view', $patientRegistration['Patient']['id'])); ?>
				</td>
				<td>
					<?php echo isset($patientRegistration['PatientRegistration']['doctor_id']) ? $this->Html->link($patientRegistration['Doctor']['Person']['person_first_name'] . ' ' . $patientRegistration['Doctor']['Person']['person_last_name'], array('controller' => 'doctors', 'action' => 'view', $patientRegistration['Doctor']['id'])) : '-'; ?>
				</td>
				<td>
					<?php echo!isset($patientRegistration['PatientRegistration']['doctor_id']) ? $this->Html->link('Ya', array('controller' => 'intensive_cares', 'action' => 'view', $patientRegistration['PatientRegistration']['id'])) : '-'; ?>
				</td>
				<td><?php echo number_format($patientRegistration['PatientRegistration']['registration_cost'], 0, ',', '.'); ?>&nbsp;</td>
				<td><?php echo h($patientRegistration['PatientRegistration']['created_date']); ?>&nbsp;</td>
				<td><?php echo h($this->Access->userData['Employee']['Person']['person_first_name']); ?>&nbsp;</td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="4" class="right bold">Total</td>
			<td colspan="1" class="bold"><?php echo number_format($total, 0, ',', '.'); ?></td>
			<td colspan="2">&nbsp;</td>
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