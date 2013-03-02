<?php $this->start('submenu'); ?>
<div id="submenu">
    <div class="modules_left">
        <div class="module buttons">
            <?php echo $this->Html->link('<small class="icon clipboard"></small><span>' . __('New Room') . '</span>', array('controller' => 'hotelDetails', 'action' => 'add', '?' => array('pid' => $pid)), array('escape' => false, 'class' => 'dropdown_button')); ?>
            <?php echo $this->Html->link('<small class="icon clipboard"></small><span>' . __('Import Rooms From File') . '</span>', array('controller' => 'hotelDetails', 'action' => 'importFile', $pid), array('escape' => false, 'class' => 'dropdown_button')); ?>
        </div>
    </div>
</div>
<?php $this->end(); ?>

<div class="hotels view">

    <h2><?php echo __('Hotel'); ?></h2>
    
    <div class="tabs">
        <ul>
            <li><a href="#tab1"><?php echo __('Information'); ?></a></li>
            <li><a href="#tab2"><?php echo __('Address'); ?></a></li>
            <li><a href="#tab3"><?php echo __('Images Gallery'); ?></a></li>
        </ul>
        
        <div id="tab1">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="20%"><?php echo __('Name'); ?></td>
                    <td><?php echo h($hotel['Hotel']['htl_name']); ?></td>
                </tr>
                <tr>
                    <td><?php echo __('Type'); ?></td>
                    <td><?php echo h($hotel['Type']['Codeset']['cset_value']); ?></td>
                </tr>
                <tr>
                    <td><?php echo __('Stars'); ?></td>
                    <td><?php echo $this->Converter->formatHotelStars($hotel['Hotel']['htl_stars']); ?></td>
                </tr>
                <tr>
                    <td><?php echo __('Phone'); ?></td>
                    <td><?php echo h($hotel['Hotel']['htl_phone']); ?></td>
                </tr>
                <tr>
                    <td><?php echo __('Fax'); ?></td>
                    <td><?php echo h($hotel['Hotel']['htl_fax']); ?></td>
                </tr>
                <tr>
                    <td><?php echo __('Email'); ?></td>
                    <td><?php echo h($hotel['Hotel']['htl_email']); ?></td>
                </tr>
                <tr>
                    <td><?php echo __('Website'); ?></td>
                    <td><?php echo h($hotel['Hotel']['htl_website']); ?></td>
                </tr>
            </table>
        </div>
        
        <div id="tab2">
            <?php echo $this->element('address'); ?>
        </div>   
        
        <div id="tab3">
            <?php echo $this->element('imagesGallery', array('uploadImage' => true)); ?>
        </div>
    </div>
    
    <h2><?php echo __('Rooms'); ?></h2>
    <div class="col w10 last">
        <div class="content">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th width="10px"><?php echo __('No.'); ?></th>
                    <th><?php echo $this->Paginator->sort('hdtl_room_type', __('Room')); ?></th>
                    <th><?php echo $this->Paginator->sort('currency_id', __('Currency')); ?></th>
                    <th class="number"><?php echo $this->Paginator->sort('hdtl_single', __('Single')); ?></th>
                    <th class="number"><?php echo $this->Paginator->sort('hdtl_twin', __('Twin')); ?></th>
                    <th class="number"><?php echo $this->Paginator->sort('hdtl_double', __('Double')); ?></th>
                    <th class="number"><?php echo $this->Paginator->sort('hdtl_triple', __('Triple')); ?></th>
                    <th><?php echo $this->Paginator->sort('hdtl_breakfast', __('Breakfast')); ?></th>
                    <th><?php echo $this->Paginator->sort('hdtl_period_start_date', __('Start Date')); ?></th>
                    <th><?php echo $this->Paginator->sort('hdtl_period_end_date', __('End Date')); ?></th>
                    <th class="actions" width="250px"><?php echo __('Actions'); ?></th>
                </tr>
                <?php $i = $this->Paginator->counter('{:start}'); ?>
                <?php foreach ($hotelDetails as $hotelDetail): ?>
                    <tr>
                        <td><?php echo $i++; ?>.</td>
                        <td><?php echo h($hotelDetail['HotelDetail']['hdtl_room_type']); ?>&nbsp;</td>
                        <td>
                            <?php echo $hotelDetail['Currency']['curr_code']; ?>
                        </td>
                        <td class="number"><?php echo $this->Converter->formatNumber($hotelDetail['HotelDetail']['hdtl_single']); ?>&nbsp;</td>
                        <td class="number"><?php echo $this->Converter->formatNumber($hotelDetail['HotelDetail']['hdtl_twin']); ?>&nbsp;</td>
                        <td class="number"><?php echo $this->Converter->formatNumber($hotelDetail['HotelDetail']['hdtl_double']); ?>&nbsp;</td>
                        <td class="number"><?php echo $this->Converter->formatNumber($hotelDetail['HotelDetail']['hdtl_triple']); ?>&nbsp;</td>
                        <td><?php echo $this->Converter->yesNo($hotelDetail['HotelDetail']['hdtl_breakfast']); ?>&nbsp;</td>
                        <td><?php echo $this->Converter->formatDate($hotelDetail['HotelDetail']['hdtl_period_start_date']); ?>&nbsp;</td>
                        <td><?php echo $this->Converter->formatDate($hotelDetail['HotelDetail']['hdtl_period_end_date']); ?>&nbsp;</td>
                        <td class="buttons_demo">
                            <?php echo $this->Html->link('<small class="icon looking_glass"></small><span>' . __('View') . '</span>', array('controller' => 'hotelDetails', 'action' => 'view', $hotelDetail['HotelDetail']['id'], '?' => array('pid' => $pid)), array('escape' => false, 'class' => 'button')); ?>
                            <?php echo $this->Html->link('<small class="icon pencil"></small><span>' . __('Edit') . '</span>', array('controller' => 'hotelDetails', 'action' => 'edit', $hotelDetail['HotelDetail']['id'], '?' => array('pid' => $pid)), array('escape' => false, 'class' => 'button')); ?>
                            <?php echo $this->Form->postLink('<small class="icon cross"></small><span>' . __('Delete') . '</span>', array('controller' => 'hotelDetails', 'action' => 'delete', $hotelDetail['HotelDetail']['id'], '?' => array('pid' => $pid)), array('escape' => false, 'class' => 'button red'), __('Anda yakin akan menghapus %s?', $hotelDetail['HotelDetail']['hdtl_room_type'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>                
            </table>
        </div>
    </div>
    
    <?php echo $this->element('btnBack', array('noTable' => true, 'customStyle' => 'float: right;')); ?>
</div>