<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="<?php echo $pluralVar; ?> form">

    <h1><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h1>

    <?php echo "<?php echo \$this->Form->create('{$modelClass}');?>\n"; ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <?php
        $firstRow = true;
        foreach ($fields as $key => $field) {
            if (strpos($action, 'add') !== false && $field == $primaryKey) {
                continue;
            } elseif (!in_array($field, array('created_by', 'modified_by', 'updated_by', 'created_date', 'updated_date'))) {
                ?>
                <tr>
                    <td<?php if ($firstRow) { echo " width=\"20%\""; $firstRow = false; } ?>><label for="<?php echo $field; ?>"><?php echo "<?php echo __('{$field}'); ?>"; ?></label></td>
                    <td>
                        <?php echo "\t\t<?php echo \$this->Form->input('{$field}'); ?>\n"; ?>
                    </td>
                </tr>
                <?php
            }
        }
        if (!empty($associations['hasAndBelongsToMany'])) {
            foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                ?>
                <tr>
                    <td><label for="<?php echo $assocName; ?>"><?php echo "<?php echo __('{$assocName}'); ?>"; ?></label></td>
                    <td><?php echo "\t\t<?php echo \$this->Form->input('{$assocName}'); ?>\n"; ?></td>
                </tr>
                <?php 
            }
        }
        ?>        
    </table>
    
    <?php 
        $btnLabel = strpos($action, 'add') !== false ? 'Save' : 'Update';
        printf("<?php echo \$this->element('btnSaveUpdate', array('formId' => '%s%sForm', 'text' => __('{$btnLabel}'))); ?>", $modelClass, Inflector::humanize($action)); 
    ?>
    
    <?php
    echo "<?php echo \$this->Form->end();?>\n";
    ?>
</div>