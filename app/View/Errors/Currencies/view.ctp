<div class="currencies view">
    
    <h2><?php  echo __('Currency');?></h2>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
		<td width="20%"><?php echo __('Curr Name'); ?></td>
		<td><?php echo h($currency['Currency']['curr_name']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Curr Code'); ?></td>
		<td><?php echo h($currency['Currency']['curr_code']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Curr Rate'); ?></td>
		<td><?php echo h($currency['Currency']['curr_rate']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Curr Active'); ?></td>
		<td><?php echo h($currency['Currency']['curr_active']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Created Date'); ?></td>
		<td><?php echo h($currency['Currency']['created_date']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Updated Date'); ?></td>
		<td><?php echo h($currency['Currency']['updated_date']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Created By'); ?></td>
		<td><?php echo h($currency['Currency']['created_by']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Updated By'); ?></td>
		<td><?php echo h($currency['Currency']['updated_by']); ?></td>
	</tr>
        
	<?php echo $this->element('btnBack'); ?>
    </table>
</div>