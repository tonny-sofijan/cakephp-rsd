<div class="userRoles form">

    <h2><?php echo __('Add User Role'); ?></h2>

    <?php echo $this->Form->create('UserRole'); ?>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="role_name"><?php echo __('Role Name'); ?></label></td>
            <td><input type="text" name="data[UserRole][role_name]" id="role_name" class="text w_20" maxlength="100" /></td>
        </tr>
        <tr>
            <td width="20%"><label for="role_priority"><?php echo __('Role Priority'); ?></label></td>
            <td>
                <?php echo $this->Form->select('priority_list', $this->Constant->getPriorityList(), array('empty' => false)); ?>
                <?php echo __('than / with');?>
                <?php echo $this->Form->select('user_role', $userRoles, array('empty' => false)); ?>
            </td>
        </tr>
        
        <?php echo $this->element('btnSaveUpdate', array('formId' => 'UserRoleAddForm', 'text' => __('Save'))); ?>
    </table>
    
    <?php echo $this->Form->end(); ?>
</div>