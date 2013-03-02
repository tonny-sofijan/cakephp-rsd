<div class="serviceTypes form">

    <h1><?php echo __('Tambah Jenis Layanan'); ?></h1>

    <?php echo $this->Form->create('ServiceType'); ?>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="20%"><label for="no"><?php echo __('No. Layanan'); ?></label></td>
            <td>
                <?php echo $this->Form->input('no', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_10'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="type_of_service"><?php echo __('Jenis Layanan'); ?></label></td>
            <td>
                <?php echo $this->Form->input('type_of_service', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_40'
                )); ?>
            </td>
        </tr>
        <tr>
            <td><label for="unit"><?php echo __('Unit'); ?></label></td>
            <td>
                <?php echo $this->Form->input('unit', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'text w_5'
                )); ?>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" class="container">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="20%"><strong>KELAS</strong></td>
                        <td>ICU</td>
                        <td>VIP</td>
                        <td>UTAMA</td>
                        <td>KELAS 1</td>
                        <td>KELAS 2</td>
                        <td>KELAS 3</td>
                    </tr>
                    
                    <tr>
                        <td><strong>BHP</strong></td>
                        <td>
                            <?php echo $this->Form->input('icu_bhp_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('vip_bhp_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('top_bhp_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c1_bhp_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c2_bhp_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c3_bhp_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><strong>ALAT</strong></td>
                        <td>
                            <?php echo $this->Form->input('icu_tool_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('vip_tool_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('top_tool_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c1_tool_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c2_tool_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c3_tool_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><strong>LAYANAN</strong></td>
                        <td>
                            <?php echo $this->Form->input('icu_service_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('vip_service_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('top_service_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c1_service_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c2_service_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c3_service_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><strong>TOTAL</strong></td>
                        <td>
                            <?php echo $this->Form->input('icu_total_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('vip_total_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('top_total_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c1_total_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c2_total_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('c3_total_cost', array(
                                'label' => false,
                                'div' => false,
                                'class' => 'text w_5 numbersOnly autoNumeric',
                                'type' => 'text'
                            )); ?>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>        

    </table>

    <?php echo $this->element('btnSaveUpdate', array('formId' => 'ServiceTypeAddForm', 'text' => __('Simpan'))); ?>    
    <?php echo $this->Form->end(); ?>
</div>