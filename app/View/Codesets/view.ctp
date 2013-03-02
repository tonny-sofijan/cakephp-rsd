<div class="codesets view">
    
    <h1><?php  echo __('Codeset');?></h1>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
		<td width="20%"><?php echo __('Cset Name'); ?></td>
		<td><?php echo h($codeset['Codeset']['cset_name']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Cset Code'); ?></td>
		<td><?php echo h($codeset['Codeset']['cset_code']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Cset Value'); ?></td>
		<td><?php echo h($codeset['Codeset']['cset_value']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Cset Description'); ?></td>
		<td><?php echo h($codeset['Codeset']['cset_description']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Cset Parent Code'); ?></td>
		<td><?php echo h($codeset['Codeset']['cset_parent_code']); ?></td>
	</tr>
        
    </table>
    
	<?php echo $this->element('btnBack'); ?>
</div>