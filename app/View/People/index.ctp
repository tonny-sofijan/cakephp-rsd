
<div class="people index">

    <h1><?php echo __('People'); ?></h1>

    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
				<?php echo $this->Html->link(__('New Person'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
			<th><?php echo $this->Paginator->sort('person_first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('person_last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('person_salutation'); ?></th>
			<th><?php echo $this->Paginator->sort('person_gender'); ?></th>
			<th><?php echo $this->Paginator->sort('person_ic_no'); ?></th>
			<th><?php echo $this->Paginator->sort('person_tax_no'); ?></th>
			<th><?php echo $this->Paginator->sort('person_email'); ?></th>
			<th><?php echo $this->Paginator->sort('person_home_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('person_mobile_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('person_fax'); ?></th>
			<th width="150px"><?php echo __('Actions'); ?></th>
        </tr>
		<?php $i = $this->Paginator->counter('{:start}'); ?>
		<?php foreach ($people as $person): ?>
			<tr>
				<td><?php echo $i++; ?>.</td>
				<td><?php echo h($person['Person']['person_first_name']); ?>&nbsp;</td>
				<td><?php echo h($person['Person']['person_last_name']); ?>&nbsp;</td>
				<td><?php echo h($person['Person']['person_salutation']); ?>&nbsp;</td>
				<td><?php echo h($person['Person']['person_gender']); ?>&nbsp;</td>
				<td><?php echo h($person['Person']['person_ic_no']); ?>&nbsp;</td>
				<td><?php echo h($person['Person']['person_tax_no']); ?>&nbsp;</td>
				<td><?php echo h($person['Person']['person_email']); ?>&nbsp;</td>
				<td><?php echo h($person['Person']['person_home_phone']); ?>&nbsp;</td>
				<td><?php echo h($person['Person']['person_mobile_phone']); ?>&nbsp;</td>
				<td><?php echo h($person['Person']['person_fax']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $person['Person']['id']), array('class' => 'link view')); ?> |
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $person['Person']['id']), array('class' => 'link edit')); ?> |
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $person['Person']['id']), array('class' => 'link delete'), __('Anda yakin akan menghapus %s?', $person['Person']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
    </table>

	<?php echo $this->element('admPagination'); ?>

</div>
