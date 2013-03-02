
<div class="icd10s index">

    <h1><?php echo __('Icd10s'); ?></h1>

    <div class="buttonWrapper clearfix">
        <div style="float: right;">
            <span class="btnClose last">
                <?php echo $this->Html->link(__('Tambah Icd10'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
            </span>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th width="10px"><?php echo __('No.'); ?></th>
            <th><?php echo $this->Paginator->sort('icd', __('ICD')); ?></th>
            <th><?php echo $this->Paginator->sort('dtd', __('DTD')); ?></th>
            <th><?php echo $this->Paginator->sort('dtd_code', __('Kode DTD')); ?></th>
            <th><?php echo $this->Paginator->sort('dtd_group', __('Grup DTD')); ?></th>
            <th width="150px"><?php echo __('Actions'); ?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
        <?php foreach ($icd10s as $icd10): ?>
            <tr>
                <td><?php echo $i++; ?>.</td>
                <td><?php echo h($icd10['Icd10']['icd']); ?>&nbsp;</td>
                <td><?php echo h($icd10['Icd10']['dtd']); ?>&nbsp;</td>
                <td><?php echo h($icd10['Icd10']['dtd_code']); ?>&nbsp;</td>
                <td><?php echo h($icd10['Icd10']['dtd_group']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('Ubah'), array('action' => 'edit', $icd10['Icd10']['id']), array('class' => 'link edit')); ?> |
                    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $icd10['Icd10']['id']), array('class' => 'link delete'), __('Apakah Anda yakin akan menghapus %s?', $icd10['Icd10']['icd'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php echo $this->element('admPagination'); ?>

</div>
