<li><?php echo $this->Html->link(__('Rekam Medis'), array('controller' => 'medical_records', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Resep'), array('controller' => 'prescriptions', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Apotik'), array('controller' => 'pharmacies', 'action' => 'index')); ?>
    <ul>
        <li><?php echo $this->Html->link(__('Obat'), array('controller' => 'medicaments', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Obat Racik'), array('controller' => 'personalized_medicines', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Obat Paten'), array('controller' => 'patent_medicines', 'action' => 'index')); ?></li>
    </ul>
</li>