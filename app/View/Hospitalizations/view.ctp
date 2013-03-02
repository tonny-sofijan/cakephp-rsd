<div class="hospitalizations view">
    
    <h1><?php  echo __('Hospitalization');?></h1>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
		<td width="20%"><?php echo __('Destination Room'); ?></td>
		<td><?php echo h($hospitalization['Hospitalization']['destination_room']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Treatment Level'); ?></td>
		<td><?php echo h($hospitalization['Hospitalization']['treatment_level']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Date In'); ?></td>
		<td><?php echo h($hospitalization['Hospitalization']['date_in']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Date Out'); ?></td>
		<td><?php echo h($hospitalization['Hospitalization']['date_out']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Disposition'); ?></td>
		<td><?php echo h($hospitalization['Hospitalization']['disposition']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Note'); ?></td>
		<td><?php echo h($hospitalization['Hospitalization']['note']); ?></td>
	</tr>
        
    </table>
    
	<?php echo $this->element('btnBack'); ?>
</div>