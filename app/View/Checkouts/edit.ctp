<div class="checkouts form">

    <h1><?php echo __('Edit Checkout'); ?></h1>

	<?php echo $this->Form->create('Checkout'); ?>
	<?php echo $this->Form->input('id'); ?>

    <table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<?php if (!isset($patientRegistration['PatientRegistration']['id'])): ?>
				<td width="20%"><label for="service_grade"><?php echo __('Kelas Ruangan'); ?></label></td>
				<td>
					<?php echo $this->Form->select('service_grade', $this->Constant->getServiceGrade(), array('empty' => false, 'value' => isset($this->request->data['Hospitalization']['destination_room']) ? $this->request->data['Hospitalization']['destination_room'] : '')); ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td width="20%"><label for="note"><?php echo __('Catatan'); ?></label></td>
			<td>
				<?php
				echo $this->Form->input('note', array(
					'type' => 'textarea',
					'label' => false,
				));
				?>
			</td>
		</tr>
    </table>

	<?php echo $this->element('btnSaveUpdate', array('formId' => 'CheckoutEditForm', 'text' => __('Update'))); ?>    
	<?php echo $this->Form->end(); ?>
</div>