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
<div class="<?php echo $pluralVar;?> view">
    
    <h1><?php echo "<?php  echo __('{$singularHumanName}');?>";?></h1>
    
    <table width="100%" cellpadding="0" cellspacing="0">
        <?php
        $firstRow = true;
        foreach ($fields as $field) {
                $isKey = false;              
                
                if (!in_array($field, array('id', 'created_by', 'modified_by', 'updated_by', 'created_date', 'updated_date'))) {
                    $width = "";
                
                    if ($firstRow) {
                        $width = " width=\"20%\"";
                        $firstRow = false;
                    }
                    
                    echo "\t<tr>\n";
                    if (!empty($associations['belongsTo'])) {
                            foreach ($associations['belongsTo'] as $alias => $details) {
                                    if ($field === $details['foreignKey']) {
                                            $isKey = true;
                                            echo "\t\t<td".$width."><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></td>\n";
                                            echo "\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></td>\n";
                                            break;
                                    }
                            }
                    }
                    if ($isKey !== true) {
                            echo "\t\t<td".$width."><?php echo __('" . Inflector::humanize($field) . "'); ?></td>\n";
                            echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></td>\n";
                    }
                    echo "\t</tr>\n";
                }
        }
        ?>        
    </table>
    <?php echo "\n\t<?php echo \$this->element('btnBack'); ?>\n"; ?>
</div>