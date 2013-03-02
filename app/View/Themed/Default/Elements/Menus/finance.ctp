<li><?php echo $this->Html->link(__('Registrasi Pasien'), array('controller' => 'patient_registrations', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Rekam Medis'), array('controller' => 'medical_records', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Resep'), array('controller' => 'prescriptions', 'action' => 'index')); ?></li>
<li><a href="#">Data Orang</a>
    <ul>
        <li><?php echo $this->Html->link(__('Laporan'), array('controller' => 'reports', 'action' => 'index')); ?></li>
    </ul>
</li>