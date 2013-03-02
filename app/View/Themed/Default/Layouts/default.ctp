<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php echo $this->Html->charset(); ?>

        <title><?php echo $title_for_layout; ?></title>

        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('reset');
        echo $this->Html->css('style');
        echo $this->Html->css('cupertino/jquery-ui-1.9.2.custom');

        echo $this->Html->script('jquery-1.8.3.min');
        echo $this->Html->script('jquery-ui-1.9.2.custom.min');
        echo $this->Html->script('autoNumeric-1.7.4.min');
        echo $this->Html->script('common');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        ?>
    </head>
    <body>

        <!-- begin container -->
        <div id="container">

            <!-- begin header -->
            <div id="header" class="clearfix">
                <span class="logoTitle"><?php echo __('RSD KH. Daud Arif Kuala Tungkal'); ?></span>

                <?php if ($this->Access->isLoggedIn()): ?>
                    <span class="loginInformation"><?php echo __('Anda masuk sebagai'); ?> <?php echo $this->Access->userData['UserRole']['role_name']; ?>, <?php echo $this->Access->userData['Employee']['position']; ?> | <?php echo $this->Html->link(__('Keluar'), array('controller' => 'administrators', 'action' => 'logout'), array('class' => 'logout')); ?></span>
                <?php endif; ?>
            </div>
            <!-- end header -->

            <!-- begin main menu -->
            <div id="mainMenu">
                <ul class="clearfix">
                    
                    <!-- doctors -->
                    <?php if ($this->Access->userData['UserRole']['role_priority'] == $this->Access->rolePriorities['doctor']) { ?>
                        <li><?php echo $this->Html->link(__('Dokter'), array('controller' => 'doctors', 'action' => 'index')); ?></li>                        
                    <?php } else if ($this->Access->userData['UserRole']['role_priority'] == $this->Access->rolePriorities['pharmacy']) {
                        echo $this->element('Menus/pharmacy');
                    } else if (in_array($this->Access->userData['UserRole']['role_priority'], array($this->Access->rolePriorities['emergency'], $this->Access->rolePriorities['patient_reg']))) {
                        echo $this->element('Menus/emergency_patient_reg');
                    } else if ($this->Access->userData['UserRole']['role_priority'] == $this->Access->rolePriorities['finance']) {
                        echo $this->element('Menus/finance');
                    } else if ($this->Access->userData['UserRole']['role_priority'] == $this->Access->rolePriorities['medical_record']) {
                        echo $this->element('Menus/medical_record');
                    } else {
                        echo $this->element('Menus/all');
                    } ?>
                    
                </ul>
            </div>
            <!-- end main menu -->

            <!-- begin logo wrapper -->
            <div id="logoWrapper" class="clearfix">
                <div id="logo">
                    <?php echo $this->Html->link($this->Html->image('logo_pemkab_tanjab.png', array('width' => 82, 'height' => 98, 'class' => 'logoPemprov')), array('controller' => 'adminstrators', 'action' => 'index'), array('escape' => false)); ?>
                    <h1>&nbsp;</h1>
                    <?php echo $this->Html->link($this->Html->image('logo_rsd.png', array('width' => 80, 'height' => 98, 'class' => 'logoRSD')), array('controller' => 'adminstrators', 'action' => 'index'), array('escape' => false)); ?>
                </div>

                <?php echo $this->fetch('search'); ?>
            </div>
            <!-- end logo wrapper -->

            <?php echo $this->Session->flash(); ?>

            <!-- begin content wrapper -->
            <div id="contentWrapper">                
                <?php echo $this->fetch('content'); ?>
            </div>
            <!-- end content wrapper -->

            <!-- begin footer -->
            <div id="footer">
                <p><?php echo __('Copyright &copy; 2012. All rights reserved. Rumah Sakit Umum Kuala Tungkal.'); ?></p>
            </div>
            <!-- end footer -->

        </div>
        <!-- end container -->

        <!-- this images will be used for date picker calendar icon -->
        <?php echo $this->Html->image("calendar.png", array('id' => 'calendar', 'style' => 'display: none;')); ?>
        <script type="text/javascript">
            jQuery.fn.exists = function(){return this.length>0;}
            
            $(document).ready(function(){
                $('.datepicker').datepicker({
                    showOn: 'button',
                    buttonImage: $('#calendar').attr('src'),
                    buttonImageOnly: true,
                    changeYear: true,
                    maxDate: new Date(),
                    dateFormat: 'dd-mm-yy'
                });
                
                if ($('.tabs').exists()) { $('.tabs').tabs(); }
                $('.autoNumeric').autoNumeric({aSep: ',', aDec: '.'});
                
                $.each($('.numbersOnly'), function(){ $(this).numbersOnly(); });
                $.each($('.uppercase'), function(){ $(this).setUppercase(); });
            });
        </script>

        <?php echo $this->fetch('script'); ?>

    </body>
</html>
