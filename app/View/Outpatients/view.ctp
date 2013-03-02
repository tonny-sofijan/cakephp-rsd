<div class="outpatients view">
    
    <h1><?php  echo __('Outpatient');?></h1>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
		<td width="20%"><?php echo __('Cause Of Accident'); ?></td>
		<td><?php echo h($outpatient['Outpatient']['cause_of_accident']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Type Of Visit'); ?></td>
		<td><?php echo h($outpatient['Outpatient']['type_of_visit']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Type Of Case'); ?></td>
		<td><?php echo h($outpatient['Outpatient']['type_of_case']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Arrived With'); ?></td>
		<td><?php echo h($outpatient['Outpatient']['arrived_with']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Emergency'); ?></td>
		<td><?php echo h($outpatient['Outpatient']['emergency']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Triage'); ?></td>
		<td><?php echo h($outpatient['Outpatient']['triage']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Cause Of Visit'); ?></td>
		<td><?php echo h($outpatient['Outpatient']['cause_of_visit']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Payment Method'); ?></td>
		<td><?php echo h($outpatient['Outpatient']['payment_method']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Destination Room'); ?></td>
		<td><?php echo h($outpatient['Outpatient']['destination_room']); ?></td>
	</tr>
        
    </table>
    
	<?php echo $this->element('btnBack'); ?>
</div>