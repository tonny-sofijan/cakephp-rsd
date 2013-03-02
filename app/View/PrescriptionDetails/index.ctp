<div class="prescriptionDetails index">
	
	<h1><?php echo __('Rincian Obat'); ?></h1>

	<div class="search">
		<?php echo $this->Form->create('PrescriptionDetail'); ?>
		<div class="buttonWrapper clearfix">
			<?php echo $this->Form->select('c', $options, array('empty' => false)); ?>
			<?php echo $this->Form->input('q', array('label' => false, 'div' => false, 'class' => 'text w_15')) ?>
			<?php echo $this->Form->button('cari', array('type' => 'submit', 'class' => 'linkIco')); ?>
			<?php echo $this->Form->end(); ?>

			<div style="float: right;">
				<span class="btnClose last">
					<?php echo $this->Html->link(__('Tambah Detil Obat'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
				</span>
			</div>
		</div>
	</div>

    <div class="giveMeSpace"></div>

	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('prescription_id'); ?></th>
			<th><?php echo $this->Paginator->sort('medicament_id'); ?></th>
			<th><?php echo $this->Paginator->sort('personalized_medicine_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dose'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php $i = $this->Paginator->counter('{:start}'); ?>
		<?php foreach ($prescriptionDetails as $prescriptionDetail): ?>
			<tr>
				<td><?php echo h($prescriptionDetail['PrescriptionDetail']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($prescriptionDetail['Prescription']['id'], array('controller' => 'prescriptions', 'action' => 'view', $prescriptionDetail['Prescription']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($prescriptionDetail['Medicament']['name'], array('controller' => 'medicaments', 'action' => 'view', $prescriptionDetail['Medicament']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($prescriptionDetail['PersonalizedMedicine']['name'], array('controller' => 'personalized_medicines', 'action' => 'view', $prescriptionDetail['PersonalizedMedicine']['id'])); ?>
				</td>
				<td><?php echo h($prescriptionDetail['PrescriptionDetail']['dose']); ?>&nbsp;</td>
				<td><?php echo h($prescriptionDetail['PrescriptionDetail']['price']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $prescriptionDetail['PrescriptionDetail']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $prescriptionDetail['PrescriptionDetail']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $prescriptionDetail['PrescriptionDetail']['id']), null, __('Are you sure you want to delete # %s?', $prescriptionDetail['PrescriptionDetail']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->element('admPagination'); ?>
</div>
