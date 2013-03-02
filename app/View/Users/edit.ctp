<div class="users form">

    <h1><?php echo __('Ubah Pengguna'); ?></h1>

    <?php echo $this->Form->create('User'); ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="username"><?php echo __('Username'); ?></label></td>
            <td>
                <?php echo $this->Form->input('user_username', array(
                    'label' => false,
                    'class' => 'text w_10'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="password"><?php echo __('Password'); ?></label></td>
            <td>
                <?php echo $this->Form->input('user_password', array(
                    'label' => false,
                    'class' => 'text w_10',
                    'type' => 'password',
                    'value' => false
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="employee_id"><?php echo __('Nama Pegawai'); ?></label></td>
            <td>
                <?php echo $this->Form->input('employee_id', array(
                    'label' => false
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="user_role_id"><?php echo __('Hak Akses'); ?></label></td>
            <td>
                <?php echo $this->Form->input('user_role_id', array(
                    'label' => false
                )); ?>
            </td>
        </tr>

    </table>

    <?php echo $this->element('btnSaveUpdate', array('formId' => 'UserEditForm', 'text' => __('Ubah'))); ?>    
    <?php echo $this->Form->end(); ?>
</div>