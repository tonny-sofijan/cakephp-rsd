<div class="intensiveCares view">
    
    <h1><?php  echo __('Intensive Care');?></h1>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
		<td width="20%"><?php echo __('Cause Of Accident'); ?></td>
		<td><?php echo h($intensiveCare['IntensiveCare']['cause_of_accident']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Type Of Visit'); ?></td>
		<td><?php echo h($intensiveCare['IntensiveCare']['type_of_visit']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Type Of Case'); ?></td>
		<td><?php echo h($intensiveCare['IntensiveCare']['type_of_case']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Arrived With'); ?></td>
		<td><?php echo h($intensiveCare['IntensiveCare']['arrived_with']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Emergency'); ?></td>
		<td><?php echo h($intensiveCare['IntensiveCare']['emergency']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Triage'); ?></td>
		<td><?php echo h($intensiveCare['IntensiveCare']['triage']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Cause Of Visit'); ?></td>
		<td><?php echo h($intensiveCare['IntensiveCare']['cause_of_visit']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Payment Method'); ?></td>
		<td><?php echo h($intensiveCare['IntensiveCare']['payment_method']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Destination Room'); ?></td>
		<td><?php echo h($intensiveCare['IntensiveCare']['destination_room']); ?></td>
	</tr>
        
    </table>
    
	<?php echo $this->element('btnBack'); ?>
</div>