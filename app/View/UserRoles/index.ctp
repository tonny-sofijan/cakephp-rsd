<div class="userRoles index">
    <h1><?php echo __('Hak Akses'); ?></h1>
    
    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
                <?php echo $this->Html->link(__('Tambah Hak Akses'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>
    
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
            <th><?php echo $this->Paginator->sort('role_name', __('Nama Hak Akses')); ?></th>
            <th><?php echo $this->Paginator->sort('role_priority', __('Tingkat Prioritas')); ?></th>
            <th><?php echo $this->Paginator->sort('role_active', __('Status Aktif')); ?></th>
            <th width="150px"><?php echo __('Tindakan'); ?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
        <?php foreach ($userRoles as $userRole): ?>
            <tr>
                <td><?php echo $i++; ?>.</td>
                <td><?php echo h($userRole['UserRole']['role_name']); ?>&nbsp;</td>
                <td><?php echo h($userRole['UserRole']['role_priority']); ?>&nbsp;</td>
                <td><?php echo $this->Converter->yesNo($userRole['UserRole']['role_active']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('Lihat'), array('action' => 'view', $userRole['UserRole']['id']), array('class' => 'link view')); ?> |
                    <?php echo $this->Html->link(__('Ubah'), array('action' => 'edit', $userRole['UserRole']['id']), array('class' => 'link edit')); ?> |
                    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $userRole['UserRole']['id']), array('class' => 'link delete'), __('Apakah anda yakin menghapus %s?', $userRole['UserRole']['role_name'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <?php echo $this->element('admPagination'); ?>
</div>
