<div class="medicaments index">

    <h1><?php echo __('Obat-obatan'); ?></h1>

    <div class="search">
        <?php echo $this->Form->create('Medicament'); ?>
        <div class="buttonWrapper clearfix">
            <?php echo $this->Form->select('c', $options, array('empty' => false)); ?>
            <?php echo $this->Form->input('q', array('label' => false, 'div' => false, 'class' => 'text w_15')) ?>
            <?php echo $this->Form->button('cari', array('type' => 'submit', 'class' => 'linkIco')); ?>
            <?php echo $this->Form->end(); ?>

            <div style="float: right;">
                <span class="btnClose last">
                    <?php echo $this->Html->link(__('Tambah Obat'), array('action' => 'add'), array('class' => 'linkIco icoAdd')); ?>
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
        <?php foreach ($medicaments as $medicament): ?>
            <tr>
                <td><?php echo h($medicament['Medicament']['id']); ?>&nbsp;</td>
                <td><?php echo h($medicament['Medicament']['serial']); ?>&nbsp;</td>
                <td><?php echo h($medicament['Medicament']['name']); ?>&nbsp;</td>
                <td><?php echo h($medicament['Medicament']['brand']); ?>&nbsp;</td>
                <td><?php echo h($medicament['Medicament']['type']); ?>&nbsp;</td>
                <td><?php echo h($medicament['Medicament']['category']); ?>&nbsp;</td>
                <td class="numbersOnly"><?php echo $this->Converter->formatNumber($medicament['Medicament']['price_of_capital']); ?>&nbsp;</td>
                <td class="numbersOnly"><?php echo $this->Converter->formatNumber($medicament['Medicament']['selling_price']); ?>&nbsp;</td>
                <td class="numbersOnly"><?php echo h($medicament['Medicament']['stock']); ?>&nbsp;</td>
                <td><?php echo $this->Converter->medicineUnits($medicament['Medicament']['unit_of_measure']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Lihat'), array('action' => 'view', $medicament['Medicament']['id']), array('class' => 'link view')); ?> | 
                    <?php echo $this->Html->link(__('Ubah'), array('action' => 'edit', $medicament['Medicament']['id']), array('class' => 'link edit')); ?> | 
                    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $medicament['Medicament']['id']), array('class' => 'link delete'), __('Apakah Anda yakin akan menghapus %s?', $medicament['Medicament']['name'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('admPagination'); ?>
</div>