<div class="userRoles view">
    <h1><?php echo __('Lihat Hak Akses'); ?></h1>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><?php echo __('Nama Hak Akses'); ?></td>
            <td><?php echo h($userRole['UserRole']['role_name']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Status Aktif'); ?></td>
            <td><?php echo $this->Converter->yesNo($userRole['UserRole']['role_active']); ?></td>
        </tr>
    </table>    
    
    <?php echo $this->element('btnBack'); ?>
</div>