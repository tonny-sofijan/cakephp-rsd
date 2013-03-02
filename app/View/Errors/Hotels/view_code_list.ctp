<div class="hotels viewCodeList">
    
    <h1><?php echo __('Hotel Code List'); ?></h1>
    
    <div class="col w10 last">
        <div class="content">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th width="10px"><?php echo __('No.'); ?></th>
                    <th><?php echo $this->Paginator->sort('htl_name', __('Name')); ?></th>
                    <th><?php echo __('Company Code') ?></th>
                </tr>
                <?php $i = $this->Paginator->counter('{:start}'); ?>
                <?php foreach ($hotels as $hotel): ?>
                <tr>
                    <td><?php echo $i++; ?>.</td>
                    <td><?php echo h($hotel['Hotel']['htl_name']); ?></td>
                    <td><?php echo h($hotel['Hotel']['code']); ?></td>
                </tr>
                <?php endforeach; ?>
                
                <?php echo $this->element('btnPrint', array('colspan' => 2)); ?>
            </table>
        </div>
    </div>
    
</div>