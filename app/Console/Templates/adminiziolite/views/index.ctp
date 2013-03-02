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

<div class="<?php echo $pluralVar; ?> index">

    <h1><?php echo "<?php echo __('{$pluralHumanName}');?>"; ?></h1>

    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
                <?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>\n"; ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo "<?php echo __('No.'); ?>"; ?></th>
            <?php foreach ($fields as $field): ?>
                <?php if (!in_array($field, array('id', 'created_by', 'modified_by', 'updated_by', 'created_date', 'updated_date'))): ?>
                    <th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>"; ?></th>
                <?php endif; ?>
            <?php endforeach; ?>
            <th width="150px"><?php echo "<?php echo __('Actions');?>"; ?></th>
        </tr>
        <?php
        echo "<?php \$i = \$this->Paginator->counter('{:start}'); ?>\n";
        echo "<?php
                foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
        echo "\t<tr>\n";
        echo "\t\t<td><?php echo \$i++; ?>.</td>\n";
        foreach ($fields as $field) {
            if (!in_array($field, array('id', 'created_by', 'modified_by', 'updated_by', 'created_date', 'updated_date'))) {
                $isKey = false;
                if (!empty($associations['belongsTo'])) {
                    foreach ($associations['belongsTo'] as $alias => $details) {
                        if ($field === $details['foreignKey']) {
                            $isKey = true;
                            echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                            break;
                        }
                    }
                }
                if ($isKey !== true) {
                    echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                }
            }
        }

        echo "\t\t<td>\n";
        echo "\t\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'link view')); ?> |\n";
        echo "\t\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'link edit')); ?> |\n";
        echo "\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'link delete'), __('Are you sure you want to delete %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
        echo "\t\t</td>\n";
        echo "\t</tr>\n";

        echo "<?php endforeach; ?>\n";
        ?>
    </table>

    <?php echo "<?php echo \$this->element('admPagination'); ?>\n"; ?> 
</div>
