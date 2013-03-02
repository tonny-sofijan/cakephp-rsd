<div class="serviceTypes view">

    <h1><?php echo __('Service Type'); ?></h1>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><?php echo __('No'); ?></td>
            <td><?php echo h($serviceType['ServiceType']['no']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Type Of Service'); ?></td>
            <td><?php echo h($serviceType['ServiceType']['type_of_service']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Unit'); ?></td>
            <td><?php echo $this->Converter->serviceTypeUnit($serviceType['ServiceType']['unit']); ?></td>
        </tr>

    </table>

    <table class="stdetail">
        <tr>
            <td><strong>KELAS</strong></td>
            <td>ICU</td>
            <td>VIP</td>
            <td>UTAMA</td>
            <td>KELAS 1</td>
            <td>KELAS 2</td>
            <td>KELAS 3</td>
        </tr>

        <tr>
            <td><strong>BHP</strong></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['icu_bhp_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['vip_bhp_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['top_bhp_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c1_bhp_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c2_bhp_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c3_bhp_cost']); ?></td>
        </tr>
        <tr>
            <td><strong>ALAT</strong></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['icu_tool_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['vip_tool_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['top_tool_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c1_tool_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c2_tool_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c3_tool_cost']); ?></td>
        </tr>
        <tr>
            <td><strong>LAYANAN</strong></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['icu_service_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['vip_service_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['top_service_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c1_service_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c2_service_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c3_service_cost']); ?></td>
        </tr>
        <tr>
            <td><strong>TOTAL</strong></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['icu_total_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['vip_total_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['top_total_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c3_total_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c1_total_cost']); ?></td>
            <td><?php echo $this->Converter->formatNumber($serviceType['ServiceType']['c2_total_cost']); ?></td>
        </tr>
    </table>

    <?php echo $this->element('btnBack'); ?>
</div>