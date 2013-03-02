<div class="personalizedMedicines index">

    <h1><?php echo __('Obat Racik'); ?></h1>


    <div class="search">
        <?php echo $this->Form->create('PersonalizedMedicine'); ?>
        <div class="buttonWrapper clearfix">
            <?php echo $this->Form->select('c', $options, array('empty' => false)); ?>
            <?php echo $this->Form->input('q', array('label' => false, 'div' => false, 'class' => 'text w_15')) ?>
            <?php echo $this->Form->button('cari', array('type' => 'submit', 'class' => 'linkIco')); ?>
            <?php echo $this->Form->end(); ?>

            <div style="float: right;">
                <span class="btnClose last">
                    <?php echo $this->Html->link(__('Tambah Obat Racik'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
                </span>
            </div>
        </div>
    </div>

    <div class="giveMeSpace"></div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('serial', 'No. Seri'); ?></th>
            <th><?php echo $this->Paginator->sort('name', 'Nama Obat'); ?></th>
            <th><?php echo $this->Paginator->sort('brand', 'Merk'); ?></th>
            <th><?php echo $this->Paginator->sort('type', 'Jenis'); ?></th>
            <th><?php echo $this->Paginator->sort('category', 'Kategori'); ?></th>
            <th class="numbersOnly"><?php echo $this->Paginator->sort('price_of_capital', 'Hrg. Modal'); ?></th>
            <th class="numbersOnly"><?php echo $this->Paginator->sort('selling_price', 'Hrg. Jual'); ?></th>
            <th class="numbersOnly"><?php echo $this->Paginator->sort('stock', 'Stok'); ?></th>
            <th><?php echo $this->Paginator->sort('unit_of_measure', 'Satuan'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php $i = $this->Paginator->counter('{:start}'); ?>
        <?php foreach ($personalizedMedicines as $personalizedMedicine): ?>
            <tr>
                <td><?php echo h($personalizedMedicine['PersonalizedMedicine']['id']); ?>&nbsp;</td>
                <td><?php echo h($personalizedMedicine['PersonalizedMedicine']['serial']); ?>&nbsp;</td>
                <td><?php echo h($personalizedMedicine['PersonalizedMedicine']['name']); ?>&nbsp;</td>
                <td><?php echo h($personalizedMedicine['PersonalizedMedicine']['brand']); ?>&nbsp;</td>
                <td><?php echo h($personalizedMedicine['PersonalizedMedicine']['type']); ?>&nbsp;</td>
                <td><?php echo h($personalizedMedicine['PersonalizedMedicine']['category']); ?>&nbsp;</td>
                <td class="numbersOnly"><?php echo $this->Converter->formatNumber($personalizedMedicine['PersonalizedMedicine']['price_of_capital']); ?>&nbsp;</td>
                <td class="numbersOnly"><?php echo $this->Converter->formatNumber($personalizedMedicine['PersonalizedMedicine']['selling_price']); ?>&nbsp;</td>
                <td class="numbersOnly"><?php echo h($personalizedMedicine['PersonalizedMedicine']['stock']); ?>&nbsp;</td>
                <td><?php echo $this->Converter->medicineUnits($personalizedMedicine['PersonalizedMedicine']['unit_of_measure']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Lihat'), array('action' => 'view', $personalizedMedicine['PersonalizedMedicine']['id']), array('class' => 'link view')); ?> | 
                    <?php echo $this->Html->link(__('Ubah'), array('action' => 'edit', $personalizedMedicine['PersonalizedMedicine']['id']), array('class' => 'link edit')); ?> | 
                    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $personalizedMedicine['PersonalizedMedicine']['id']), array('class' => 'link delete'), __('Apakah Anda yakin akan menghapus %s?', $personalizedMedicine['PersonalizedMedicine']['name'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('admPagination'); ?>
</div>
