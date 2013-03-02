<?php echo $this->Form->create('administrator', array('action' => 'login')); ?>

    <p class="inputWrapper">
        <label for="username" style="display: block;"><?php echo __('Username'); ?></label>
        <input id="UserUserUsername" type="text" maxlength="50" name="data[User][user_username]" placeholder="Username" class="text" style="width: 95%;">
    </p>
    
    <p class="inputWrapper">
        <label for="password" style="display: block;"><?php echo __('Password'); ?></label>
        <input id="UserUserPassword" type="password" name="data[User][user_password]" placeholder="Password" class="text" style="width: 95%;">
    </p>
    
    <div class="buttonWrapper clearfix">
        <div style="float: right; padding-right: 40px;">
            <span class="btnClose last">
                <input type="submit" name="submit" class="btnIco icoLogin" value="<?php echo __('Login'); ?>" />
            </span>
        </div>
    </div>
    
    <div class="giveMeSpace"></div>

<?php echo $this->Form->end(); ?>