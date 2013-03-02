<?php 
    $action = isset($customAction) ? $customAction : 'index';
    
    $options = array('action' => $action);
    
    if (isset($customController))
        $options = array_merge($options, array('controller' => $customController));
    
    if (isset($customId))
        array_push($options, $customId);
    
    if (isset($additionalParams))
        $options = array_merge($options, array('?' => $additionalParams));
    
    // overide options if referer is set
    if (isset($referer) && isset($useReferer) && $useReferer == true)
        $options = $referer;
?>

<div class="buttonWrapper clearfix">
    <div style="float: right;">        
        <span class="btnClose last">
            <?php echo $this->Html->link(__('Kembali'), $options, array('escape' => false, 'class' => 'linkIco icoCancel')); ?>
        </span>
    </div>
</div>