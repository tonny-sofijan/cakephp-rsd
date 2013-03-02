<div class="patentMedicines view">

    <h1><?php echo __('Rincian Obat Paten'); ?></h1>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><?php echo __('No. Seri Obat'); ?></td>
            <td><?php echo h($patentMedicine['PatentMedicine']['serial']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Nama Obat'); ?></td>
            <td><?php echo h($patentMedicine['PatentMedicine']['name']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Merk Obat'); ?></td>
            <td><?php echo h($patentMedicine['PatentMedicine']['brand']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Jenis Obat'); ?></td>
            <td><?php echo h($patentMedicine['PatentMedicine']['type']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Kategori Obat'); ?></td>
            <td><?php echo h($patentMedicine['PatentMedicine']['category']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Harga Modal'); ?></td>
            <td><?php echo $this->Converter->formatNumber($patentMedicine['PatentMedicine']['price_of_capital']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Harga Jual'); ?></td>
            <td><?php echo $this->Converter->formatNumber($patentMedicine['PatentMedicine']['selling_price']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Stok Obat'); ?></td>
            <td><?php echo $this->Converter->formatNumber($patentMedicine['PatentMedicine']['stock']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Satuan / Ukuran'); ?></td>
            <td><?php echo $this->Converter->medicineUnits($patentMedicine['PatentMedicine']['unit_of_measure']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Tanggal Rekam Medis'); ?></td>
            <td><?php echo h($patentMedicine['PatentMedicine']['created_date']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Terakhir diubah'); ?></td>
            <td><?php echo h($patentMedicine['PatentMedicine']['updated_date']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Dibuat oleh'); ?></td>
            <td><?php echo h($patentMedicine['PatentMedicine']['created_by']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Diubah oleh'); ?></td>
            <td><?php echo h($patentMedicine['PatentMedicine']['updated_by']); ?></td>
        </tr>
    </table>

    <?php echo $this->element('btnBack'); ?>
</div>