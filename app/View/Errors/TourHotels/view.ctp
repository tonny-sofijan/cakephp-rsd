<div class="tourHotels view">

    <h2><?php echo __('Tour Hotel'); ?></h2>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><?php echo __('Name'); ?></td>
            <td><?php echo h($tourHotel['TourHotel']['thtl_name']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Stars'); ?></td>
            <td><?php echo h($tourHotel['TourHotel']['thtl_stars']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Type'); ?></td>
            <td><?php echo h($tourHotel['TourHotel']['thtl_type']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Season'); ?></td>
            <td><?php echo h($tourHotel['TourHotel']['thtl_season']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Room Type'); ?></td>
            <td><?php echo h($tourHotel['TourHotel']['thtl_room_type']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Adult'); ?></td>
            <td><?php echo $this->Converter->formatNumber($tourHotel['TourHotel']['thtl_adult']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Child'); ?></td>
            <td><?php echo $this->Converter->formatNumber($tourHotel['TourHotel']['thtl_child']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Child Ext Bed'); ?></td>
            <td><?php echo $this->Converter->formatNumber($tourHotel['TourHotel']['thtl_child_ext_bed']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Child No Bed'); ?></td>
            <td><?php echo $this->Converter->formatNumber($tourHotel['TourHotel']['thtl_child_no_bed']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Single Supp'); ?></td>
            <td><?php echo $this->Converter->formatNumber($tourHotel['TourHotel']['thtl_single_supp']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Remarks'); ?></td>
            <td><?php echo $tourHotel['TourHotel']['thtl_remarks']; ?></td>
        </tr>
        
        <?php echo $this->element('btnBack'); ?>
    </table>
</div>