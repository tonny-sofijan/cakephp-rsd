<div class="languages view">
    
    <h2><?php  echo __('Language');?></h2>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
		<td width="20%"><?php echo __('Lang Name'); ?></td>
		<td><?php echo h($language['Language']['lang_name']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Lang Code'); ?></td>
		<td><?php echo h($language['Language']['lang_code']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Lang Active'); ?></td>
		<td><?php echo h($language['Language']['lang_active']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Created Date'); ?></td>
		<td><?php echo h($language['Language']['created_date']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Updated Date'); ?></td>
		<td><?php echo h($language['Language']['updated_date']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Created By'); ?></td>
		<td><?php echo h($language['Language']['created_by']); ?></td>
	</tr>
	<tr>
		<td width="20%"><?php echo __('Updated By'); ?></td>
		<td><?php echo h($language['Language']['updated_by']); ?></td>
	</tr>
        
	<?php echo $this->element('btnBack'); ?>
    </table>
</div>