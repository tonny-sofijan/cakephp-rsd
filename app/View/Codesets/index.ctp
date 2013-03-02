
<div class="codesets index">

    <h1><?php echo __('Codesets');?></h1>

    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
                <?php echo $this->Html->link(__('New Codeset'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
                                                                            <th><?php echo $this->Paginator->sort('cset_name');?></th>
                                                                <th><?php echo $this->Paginator->sort('cset_code');?></th>
                                                                <th><?php echo $this->Paginator->sort('cset_value');?></th>
                                                                <th><?php echo $this->Paginator->sort('cset_description');?></th>
                                                                <th><?php echo $this->Paginator->sort('cset_parent_code');?></th>
                                                                                                                                                        <th width="150px"><?php echo __('Actions');?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
<?php
                foreach ($codesets as $codeset): ?>
	<tr>
		<td><?php echo $i++; ?>.</td>
		<td><?php echo h($codeset['Codeset']['cset_name']); ?>&nbsp;</td>
		<td><?php echo h($codeset['Codeset']['cset_code']); ?>&nbsp;</td>
		<td><?php echo h($codeset['Codeset']['cset_value']); ?>&nbsp;</td>
		<td><?php echo h($codeset['Codeset']['cset_description']); ?>&nbsp;</td>
		<td><?php echo h($codeset['Codeset']['cset_parent_code']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $codeset['Codeset']['id']), array('class' => 'link view')); ?> |
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $codeset['Codeset']['id']), array('class' => 'link edit')); ?> |
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $codeset['Codeset']['id']), array('class' => 'link delete'), __('Anda yakin akan menghapus %s?', $codeset['Codeset']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
    </table>

    <?php echo $this->element('admPagination'); ?>
 
</div>
