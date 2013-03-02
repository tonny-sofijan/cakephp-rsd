
<div class="outpatients index">

    <h1><?php echo __('Outpatients');?></h1>

    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
                <?php echo $this->Html->link(__('New Outpatient'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
                                                                            <th><?php echo $this->Paginator->sort('cause_of_accident');?></th>
                                                                <th><?php echo $this->Paginator->sort('type_of_visit');?></th>
                                                                <th><?php echo $this->Paginator->sort('type_of_case');?></th>
                                                                <th><?php echo $this->Paginator->sort('arrived_with');?></th>
                                                                <th><?php echo $this->Paginator->sort('emergency');?></th>
                                                                <th><?php echo $this->Paginator->sort('triage');?></th>
                                                                <th><?php echo $this->Paginator->sort('cause_of_visit');?></th>
                                                                <th><?php echo $this->Paginator->sort('payment_method');?></th>
                                                                <th><?php echo $this->Paginator->sort('destination_room');?></th>
                                        <th width="150px"><?php echo __('Actions');?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
<?php
                foreach ($outpatients as $outpatient): ?>
	<tr>
		<td><?php echo $i++; ?>.</td>
		<td><?php echo h($outpatient['Outpatient']['cause_of_accident']); ?>&nbsp;</td>
		<td><?php echo h($outpatient['Outpatient']['type_of_visit']); ?>&nbsp;</td>
		<td><?php echo h($outpatient['Outpatient']['type_of_case']); ?>&nbsp;</td>
		<td><?php echo h($outpatient['Outpatient']['arrived_with']); ?>&nbsp;</td>
		<td><?php echo h($outpatient['Outpatient']['emergency']); ?>&nbsp;</td>
		<td><?php echo h($outpatient['Outpatient']['triage']); ?>&nbsp;</td>
		<td><?php echo h($outpatient['Outpatient']['cause_of_visit']); ?>&nbsp;</td>
		<td><?php echo h($outpatient['Outpatient']['payment_method']); ?>&nbsp;</td>
		<td><?php echo h($outpatient['Outpatient']['destination_room']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $outpatient['Outpatient']['id']), array('class' => 'link view')); ?> |
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $outpatient['Outpatient']['id']), array('class' => 'link edit')); ?> |
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $outpatient['Outpatient']['id']), array('class' => 'link delete'), __('Are you sure you want to delete %s?', $outpatient['Outpatient']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
    </table>

    <?php echo $this->element('admPagination'); ?>
 
</div>
