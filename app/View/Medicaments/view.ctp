<div class="medicaments view">

    <h1><?php echo __('Rincian Obat'); ?></h1>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><?php echo __('No. Seri Obat'); ?></td>
            <td><?php echo h($medicament['Medicament']['serial']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Nama Obat'); ?></td>
            <td><?php echo h($medicament['Medicament']['name']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Merk Obat'); ?></td>
            <td><?php echo h($medicament['Medicament']['brand']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Jenis Obat'); ?></td>
            <td><?php echo h($medicament['Medicament']['type']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Kategori Obat'); ?></td>
            <td><?php echo h($medicament['Medicament']['category']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Harga Modal'); ?></td>
            <td><?php echo $this->Converter->formatNumber($medicament['Medicament']['price_of_capital']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Harga Jual'); ?></td>
            <td><?php echo $this->Converter->formatNumber($medicament['Medicament']['selling_price']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Stok Obat'); ?></td>
            <td><?php echo $this->Converter->formatNumber($medicament['Medicament']['stock']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Satuan / Ukuran'); ?></td>
            <td><?php echo $this->Converter->medicineUnits($medicament['Medicament']['unit_of_measure']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Tanggal Rekam Medis'); ?></td>
            <td><?php echo h($medicament['Medicament']['created_date']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Terakhir diubah'); ?></td>
            <td><?php echo h($medicament['Medicament']['updated_date']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Dibuat oleh'); ?></td>
            <td><?php echo h($medicament['Medicament']['created_by']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Diubah oleh'); ?></td>
            <td><?php echo h($medicament['Medicament']['updated_by']); ?></td>
        </tr>
    </table>

    <?php echo $this->element('btnBack'); ?>
</div>