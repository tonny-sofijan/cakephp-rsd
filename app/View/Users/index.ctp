<div class="users index">

    <h1><?php echo __('Pengguna'); ?></h1>

	<div class="search">
		<?php echo $this->Form->create('User'); ?>
		<div class="buttonWrapper clearfix">
			<?php echo $this->Form->select('c', $options, array('empty' => false)); ?>
			<input type="text" name="data[User][q]" id="q" class="text w_15" />
			<input type="submit" class ="linkIco" value="cari" />
			<?php echo $this->Form->end(); ?>

			<div style="float: right;">
				<span class="btnClose last">
                <?php echo $this->Html->link(__('Tambah Pengguna'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
				</span>
			</div>
		</div>
	</div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
            <th><?php echo $this->Paginator->sort('user_username', __('Username')); ?></th>
            <th><?php echo $this->Paginator->sort('employee_id', __('Pegawai')); ?></th>
            <th><?php echo $this->Paginator->sort('user_role_id', __('Hak Akses')); ?></th>
            <th width="150px"><?php echo __('Tindakan'); ?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $i++; ?>.</td>
                <td><?php echo h($user['User']['user_username']); ?>&nbsp;</td>
                <td><?php echo h($user['Person']['person_first_name']) . ' ' . h($user['Person']['person_last_name']); ?>&nbsp;</td>
                <td><?php echo h($user['UserRole']['role_name']); ?></td>
                <td>
                    <?php echo $this->Html->link(__('Lihat'), array('action' => 'view', $user['User']['id']), array('class' => 'link view')); ?> |
                    <?php echo $this->Html->link(__('Ubah'), array('action' => 'edit', $user['User']['id']), array('class' => 'link edit')); ?> |
                    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $user['User']['id']), array('class' => 'link delete'), __('Anda yakin akan menghapus %s?', $user['User']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php echo $this->element('admPagination'); ?>

</div>
