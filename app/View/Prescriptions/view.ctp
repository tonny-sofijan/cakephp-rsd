<div class="prescriptions index">
    <h1><?php echo __('Resep Obat'); ?></h1>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Dokter</th>
            <th>Kode ICD10</th>
            <th>Total</th>
            <th>Tanggal Terdaftar</th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <tr>
            <td><?php echo h($prescription['Prescription']['id']); ?>&nbsp;</td>
            <td>
                <?php
                echo (!isset($prescription['MedicalRecord'][0]['Doctor']['id'])) ? '' : __('%s / %s %s / %s', $prescription['MedicalRecord'][0]['Doctor']['doctor_specialty'], $prescription['MedicalRecord'][0]['Person']['person_first_name'], $prescription['MedicalRecord'][0]['Person']['person_last_name'], $prescription['MedicalRecord'][0]['Person']['person_mobile_phone']);
                ?>
            </td>
            <td>
                <?php
                echo (!isset($prescription['MedicalRecord'][0]['Icd']['id'])) ? '' : __('%s / %s / %s', $prescription['MedicalRecord'][0]['Icd10']['icd'], $prescription['MedicalRecord'][0]['Icd10']['dtd_code'], $prescription['MedicalRecord'][0]['Icd10']['dtd_group']);
                ?>
            </td>
            <td><?php echo $this->Converter->formatNumber($prescription['Prescription']['total']); ?>&nbsp;</td>
            <td><?php echo h($prescription['Prescription']['created_date']); ?>&nbsp;</td>
            <td class="actions">
                <?php if ($this->Access->userData['UserRole']['role_priority'] != $this->Access->rolePriorities['pharmacy']): ?>
                    <?php if ($prescription['Prescription']['redeemed'] == 0): ?>
                        <?php echo $this->Html->link('+Obat', array('controller' => 'prescription_details', 'action' => 'add', $prescription['Prescription']['id']), array('class' => 'link add')); ?> | 
                        <?php echo $this->Html->link(__('Ubah'), array('action' => 'edit', $prescription['Prescription']['id']), array('class' => 'link edit')); ?> | 
                        <?php echo $this->Form->postLink(__('Tebus'), array('action' => 'redeem', $prescription['Prescription']['id']), array('class' => 'link add'), __('Apakah Anda yakin akan menebus resep?')); ?> |                
                    <?php endif; ?>

                    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $prescription['Prescription']['id']), array('class' => 'link delete'), __('Apakah Anda yakin akan menghapus resep?')); ?>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div>

<div class="giveMeSpace"></div>
<h2>Detail Resep Obat</h2>
<div class="prescriptions view">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <th>Jenis Obat</th>
            <th>ID Obat</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($prescription['PrescriptionDetail'] as $prescriptionDetail): ?>
            <tr>
                <td><?php echo $prescriptionDetail['Medic']['type']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($prescriptionDetail['Medic']['name'], array('controller' => $prescriptionDetail['Medic']['controller'], 'action' => 'view', $prescriptionDetail['Medic']['id'])); ?></td>
                <td><?php echo h($prescriptionDetail['dose']); ?>&nbsp;</td>
                <td><?php echo $this->Converter->formatNumber($prescriptionDetail['unit_price']); ?>&nbsp;</td>
                <td class="actions">
                    <?php if ($this->Access->userData['UserRole']['role_priority'] != $this->Access->rolePriorities['pharmacy']): ?>
                        <?php echo $this->Html->link(__('Ubah'), array('controller' => 'prescription_details', 'action' => 'edit', $prescriptionDetail['id']), array('class' => 'link edit')); ?> | 
                        <?php echo $this->Form->postLink(__('Hapus'), array('controller' => 'prescription_details', 'action' => 'delete', $prescriptionDetail['id']), array('class' => 'link delete'), __('Apakah Anda yakin akan menghapus obat %s?', $prescriptionDetail['Medic']['name'])); ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php echo $this->element('btnBack'); ?>
</div>