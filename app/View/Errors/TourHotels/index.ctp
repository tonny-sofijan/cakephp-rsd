
<?php $this->start('submenu'); ?>
    <div id="submenu">
        <div class="modules_left">
            <div class="module buttons">
                <?php echo $this->Html->link('<small class="icon clipboard"></small><span>' . __('New Tour Hotel') . '</span>', array('action' => 'add'), array('escape' => false, 'class' => 'dropdown_button')); ?>
            </div>
        </div>
    </div>
<?php $this->end(); ?>

<div class="tourHotels index">
    
    <h1><?php echo __('Tour Hotels');?></h1>
    
    <div class="col w10 last">
        <div class="content">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th width="10px"><?php echo __('No.'); ?></th>
                                                                                                <th><?php echo $this->Paginator->sort('tour_id');?></th>
                                                                                <th><?php echo $this->Paginator->sort('hotel_id');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_name');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_type');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_stars');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_season');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_room_type');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_adult');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_child');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_child_ext_bed');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_child_no_bed');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_single_supp');?></th>
                                                                                <th><?php echo $this->Paginator->sort('thtl_remarks');?></th>
                                                                                                                                                                                                            <th class="actions" width="250px"><?php echo __('Actions');?></th>
                </tr>
                <?php $i = $this->Paginator->counter('{:start}'); ?>
<?php
                foreach ($tourHotels as $tourHotel): ?>
	<tr>
		<td><?php echo $i++; ?>.</td>
		<td>
			<?php echo $this->Html->link($tourHotel['Tour']['id'], array('controller' => 'tours', 'action' => 'view', $tourHotel['Tour']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tourHotel['Hotel']['id'], array('controller' => 'hotels', 'action' => 'view', $tourHotel['Hotel']['id'])); ?>
		</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_name']); ?>&nbsp;</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_type']); ?>&nbsp;</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_stars']); ?>&nbsp;</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_season']); ?>&nbsp;</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_room_type']); ?>&nbsp;</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_adult']); ?>&nbsp;</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_child']); ?>&nbsp;</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_child_ext_bed']); ?>&nbsp;</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_child_no_bed']); ?>&nbsp;</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_single_supp']); ?>&nbsp;</td>
		<td><?php echo h($tourHotel['TourHotel']['thtl_remarks']); ?>&nbsp;</td>
		<td class="buttons_demo">
			<?php echo $this->Html->link('<small class="icon looking_glass"></small><span>'. __('View') .'</span>', array('action' => 'view', $tourHotel['TourHotel']['id']), array('escape' => false, 'class' => 'button')); ?>
			<?php echo $this->Html->link('<small class="icon pencil"></small><span>'. __('Edit') .'</span>', array('action' => 'edit', $tourHotel['TourHotel']['id']), array('escape' => false, 'class' => 'button')); ?>
			<?php echo $this->Form->postLink('<small class="icon cross"></small><span>'. __('Delete') .'</span>', array('action' => 'delete', $tourHotel['TourHotel']['id']), array('escape' => false, 'class' => 'button red'), __('Anda yakin akan menghapus # %s?', $tourHotel['TourHotel']['id'])); ?>
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
