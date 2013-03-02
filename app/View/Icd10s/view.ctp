<div class="icd10s view">
    
    <h1><?php  echo __('Icd10');?></h1>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
		<td width="20%"><?php echo __('Icd'); ?></td>
		<td><?php echo h($icd10['Icd10']['icd']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Dtd'); ?></td>
		<td><?php echo h($icd10['Icd10']['dtd']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Dtd Code'); ?></td>
		<td><?php echo h($icd10['Icd10']['dtd_code']); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Dtd Group'); ?></td>
		<td><?php echo h($icd10['Icd10']['dtd_group']); ?></td>
	</tr>
        
    </table>
    
	<?php echo $this->element('btnBack'); ?>
</div>