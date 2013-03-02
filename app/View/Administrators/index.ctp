
<h1>Heading 1</h1>
<h2>Heading 2</h2>

<div class="buttonWrapper clearfix">
    <div style="float: right;">
        <span class="btnClose last">
            <input type="submit" class="btnIco icoAdd" name="add" value="<?php echo __('Add'); ?>" />
        </span>
    </div>
</div>

<div class="giveMeSpace"></div>

<table cellpadding="0" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Description</th>
        <th>Date Created</th>
        <th>Date Updated</th>
        <th>Actions</th>
    </tr>

    <tr class="even">
        <td>1.</td>
        <td>Joko Hermanto</td>
        <td>Some description here..</td>
        <td>03 March 2012</td>
        <td>20 April 2012</td>
        <td>
            <?php echo $this->Html->link(__('View'), array('action' => 'view'), array('class' => 'link view')); ?> |
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit'), array('class' => 'link edit')); ?> |
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 1), array('class' => 'link delete'), __('Anda yakin akan menghapus %s?', 'record name')); ?>
        </td>
    </tr>

    <tr class="odd">
        <td>2.</td>
        <td>Joko Hermanto</td>
        <td>Some description here..</td>
        <td>03 March 2012</td>
        <td>20 April 2012</td>
        <td>
            <?php echo $this->Html->link(__('View'), array('action' => 'view'), array('class' => 'link view')); ?> |
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit'), array('class' => 'link edit')); ?> |
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 1), array('class' => 'link delete'), __('Anda yakin akan menghapus %s?', 'record name')); ?>
        </td>
    </tr>

    <tr class="even">
        <td>3.</td>
        <td>Joko Hermanto</td>
        <td>Some description here..</td>
        <td>03 March 2012</td>
        <td>20 April 2012</td>
        <td>
            <?php echo $this->Html->link(__('View'), array('action' => 'view'), array('class' => 'link view')); ?> |
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit'), array('class' => 'link edit')); ?> |
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 1), array('class' => 'link delete'), __('Anda yakin akan menghapus %s?', 'record name')); ?>
        </td>
    </tr>

    <tr class="odd">
        <td>4.</td>
        <td>Joko Hermanto</td>
        <td>Some description here..</td>
        <td>03 March 2012</td>
        <td>20 April 2012</td>
        <td>
            <?php echo $this->Html->link(__('View'), array('action' => 'view'), array('class' => 'link view')); ?> |
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit'), array('class' => 'link edit')); ?> |
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 1), array('class' => 'link delete'), __('Anda yakin akan menghapus %s?', 'record name')); ?>
        </td>
    </tr>
</table>

<div class="buttonWrapper clearfix">
    <span class="btnClose">
        <input type="submit" class="btnIco icoSubmit" name="submit" value="<?php echo __('Submit'); ?>" />
    </span>
    <span class="btnClose last">
        <input type="button" class="btnIco icoCancel" name="cancel" value="<?php echo __('Cancel'); ?>" />
    </span>
</div>