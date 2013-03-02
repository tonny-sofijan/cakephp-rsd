<div class="featureds view">

    <h2><?php echo __('Featured'); ?></h2>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><?php echo __('Title'); ?></td>
            <td><?php echo h($featured['Featured']['ftd_title']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Alt'); ?></td>
            <td><?php echo h($featured['Featured']['ftd_alt']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Description'); ?></td>
            <td><?php echo h($featured['Featured']['ftd_description']); ?></td>
        </tr>
    </table>
    
    <?php 
        if (!is_null($attachments) && count($attachments) > 0) {
            echo $this->element('imagesGallery', array('uploadImage' => false)); 
            echo $this->element('btnBack', array('noTable' => true));
        } else {
            echo $this->element('imagesGallery', array('uploadImage' => true, 'multiple' => false)); 
        }        
    ?>
    
</div>