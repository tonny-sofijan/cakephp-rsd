
<div class="hospitalizations index">

    <h1><?php echo __('Hospitalizations');?></h1>

    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
                <?php echo $this->Html->link(__('New Hospitalization'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
                                                                            <th><?php echo $this->Paginator->sort('destination_room');?></th>
                                                                <th><?php echo $this->Paginator->sort('treatment_level');?></th>
                                                                <th><?php echo $this->Paginator->sort('date_in');?></th>
                                                                <th><?php echo $this->Paginator->sort('date_out');?></th>
                                                                <th><?php echo $this->Paginator->sort('disposition');?></th>
                                                                <th><?php echo $this->Paginator->sort('note');?></th>
                                        <th width="150px"><?php echo __('Actions');?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
<?php
                foreach ($hospitalizations as $hospitalization): ?>
	<tr>
		<td><?php echo $i++; ?>.</td>
		<td><?php echo h($hospitalization['Hospitalization']['destination_room']); ?>&nbsp;</td>
		<td><?php echo h($hospitalization['Hospitalization']['treatment_level']); ?>&nbsp;</td>
		<td><?php echo h($hospitalization['Hospitalization']['date_in']); ?>&nbsp;</td>
		<td><?php echo h($hospitalization['Hospitalization']['date_out']); ?>&nbsp;</td>
		<td><?php echo h($hospitalization['Hospitalization']['disposition']); ?>&nbsp;</td>
		<td><?php echo h($hospitalization['Hospitalization']['note']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $hospitalization['Hospitalization']['id']), array('class' => 'link view')); ?> |
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hospitalization['Hospitalization']['id']), array('class' => 'link edit')); ?> |
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hospitalization['Hospitalization']['id']), array('class' => 'link delete'), __('Are you sure you want to delete %s?', $hospitalization['Hospitalization']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
    </table>

    <?php echo $this->element('admPagination'); ?>
 
</div>
