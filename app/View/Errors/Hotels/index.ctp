
<?php $this->start('submenu'); ?>
<div id="submenu">
    <div class="modules_left">
        <div class="module buttons">
            <?php echo $this->Html->link('<small class="icon clipboard"></small><span>' . __('New Hotel') . '</span>', array('action' => 'add'), array('escape' => false, 'class' => 'dropdown_button')); ?>
            <?php echo $this->Html->link('<small class="icon clipboard"></small><span>' . __('Import From File') . '</span>', array('action' => 'importFile'), array('escape' => false, 'class' => 'dropdown_button')); ?>
            <?php echo $this->Html->link('<small class="icon clipboard"></small><span>' . __('Hotel Code List') . '</span>', array('action' => 'viewCodeList'), array('escape' => false, 'class' => 'dropdown_button')); ?>
        </div>
    </div>
</div>
<?php $this->end(); ?>

<div class="hotels index">

    <h1><?php echo __('Hotels'); ?></h1>

    <div class="col w10 last">
        <div class="content">
            <?php echo $this->element('searchForm'); ?>
            
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th width="10px"><?php echo __('No.'); ?></th>
                    <th><?php echo $this->Paginator->sort('htl_name', __('Name')); ?></th>
                    <th><?php echo $this->Paginator->sort('htl_type', __('Type')); ?></th>
                    <th><?php echo $this->Paginator->sort('htl_stars', __('Stars')); ?></th>
                    <th><?php echo $this->Paginator->sort('htl_phone', __('Phone')); ?></th>
                    <th><?php echo $this->Paginator->sort('htl_fax', __('Fax')); ?></th>
                    <th><?php echo $this->Paginator->sort('htl_email', __('Email')); ?></th>
                    <th><?php echo $this->Paginator->sort('htl_website', __('Website')); ?></th>
                    <th class="actions" width="250px"><?php echo __('Actions'); ?></th>
                </tr>
                <?php $i = $this->Paginator->counter('{:start}'); ?>
                <?php foreach ($hotels as $hotel): ?>
                    <tr>
                        <td><?php echo $i++; ?>.</td>
                        <td><?php echo h($hotel['Hotel']['htl_name']); ?>&nbsp;</td>
                        <td><?php echo h($hotel['Type']['Codeset']['cset_value']); ?>&nbsp;</td>
                        <td><?php echo $this->Converter->formatHotelStars($hotel['Hotel']['htl_stars']); ?>&nbsp;</td>
                        <td><?php echo h($hotel['Hotel']['htl_phone']); ?>&nbsp;</td>
                        <td><?php echo h($hotel['Hotel']['htl_fax']); ?>&nbsp;</td>
                        <td><?php echo h($hotel['Hotel']['htl_email']); ?>&nbsp;</td>
                        <td><?php echo h($hotel['Hotel']['htl_website']); ?>&nbsp;</td>
                        <td class="buttons_demo">
                            <?php echo $this->Html->link('<small class="icon looking_glass"></small><span>' . __('View') . '</span>', array('action' => 'view', $hotel['Hotel']['id']), array('escape' => false, 'class' => 'button')); ?>
                            <?php echo $this->Html->link('<small class="icon pencil"></small><span>' . __('Edit') . '</span>', array('action' => 'edit', $hotel['Hotel']['id']), array('escape' => false, 'class' => 'button')); ?>
                            <?php echo $this->Form->postLink('<small class="icon cross"></small><span>' . __('Delete') . '</span>', array('action' => 'delete', $hotel['Hotel']['id']), array('escape' => false, 'class' => 'button red'), __('Anda yakin akan menghapus %s?', $hotel['Hotel']['htl_name'])); ?>
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
