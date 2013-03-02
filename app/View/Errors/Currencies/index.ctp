
<?php $this->start('submenu'); ?>
    <div id="submenu">
        <div class="modules_left">
            <div class="module buttons">
                <?php echo $this->Html->link('<small class="icon clipboard"></small><span>' . __('New Currency') . '</span>', array('action' => 'add'), array('escape' => false, 'class' => 'dropdown_button')); ?>
            </div>
        </div>
    </div>
<?php $this->end(); ?>

<div class="currencies index">
    
    <h1><?php echo __('Currencies');?></h1>
    
    <div class="col w10 last">
        <div class="content">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th width="10px"><?php echo __('No.'); ?></th>
                                                                                                <th><?php echo $this->Paginator->sort('curr_name');?></th>
                                                                                <th><?php echo $this->Paginator->sort('curr_code');?></th>
                                                                                <th><?php echo $this->Paginator->sort('curr_rate');?></th>
                                                                                <th><?php echo $this->Paginator->sort('curr_active');?></th>
                                                                                                                                                                                                            <th class="actions"><?php echo __('Actions');?></th>
                </tr>
                <?php $i = $this->Paginator->counter('{:start}'); ?>
<?php
                foreach ($currencies as $currency): ?>
	<tr>
		<td><?php echo $i++; ?>.</td>
		<td><?php echo h($currency['Currency']['curr_name']); ?>&nbsp;</td>
		<td><?php echo h($currency['Currency']['curr_code']); ?>&nbsp;</td>
		<td><?php echo h($currency['Currency']['curr_rate']); ?>&nbsp;</td>
		<td><?php echo h($currency['Currency']['curr_active']); ?>&nbsp;</td>
		<td class="buttons_demo">
			<?php echo $this->Html->link('<small class="icon looking_glass"></small><span>'. __('View') .'</span>', array('action' => 'view', $currency['Currency']['id']), array('escape' => false, 'class' => 'button')); ?>
			<?php echo $this->Html->link('<small class="icon pencil"></small><span>'. __('Edit') .'</span>', array('action' => 'edit', $currency['Currency']['id']), array('escape' => false, 'class' => 'button')); ?>
			<?php echo $this->Form->postLink('<small class="icon cross"></small><span>'. __('Delete') .'</span>', array('action' => 'delete', $currency['Currency']['id']), array('escape' => false, 'class' => 'button red'), __('Anda yakin akan menghapus # %s?', $currency['Currency']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
            </table>
            
            <p>
            <?php
            echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>
            </p>
        
            <div class="paging">
            <?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
            </div>
            
        </div>
    </div>
    <div class="clear"></div>
</div>
