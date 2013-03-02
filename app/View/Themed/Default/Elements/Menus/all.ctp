<li><?php echo $this->Html->link(__('Registrasi Pasien'), array('controller' => 'patient_registrations', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Rekam Medis'), array('controller' => 'medical_records', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Resep'), array('controller' => 'prescriptions', 'action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('Apotik'), array('controller' => 'pharmacies', 'action' => 'index')); ?>
    <ul>
        <li><?php echo $this->Html->link(__('Obat'), array('controller' => 'medicaments', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Obat Racik'), array('controller' => 'personalized_medicines', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Obat Paten'), array('controller' => 'patent_medicines', 'action' => 'index')); ?></li>
    </ul>
</li>

<li><a href="#">Data Medis</a>
    <ul>
        <li><?php echo $this->Html->link(__('Obat'), array('controller' => 'medicaments', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Obat Racik'), array('controller' => 'personalized_medicines', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Obat Paten'), array('controller' => 'patent_medicines', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Kode ICD-10'), array('controller' => 'icd10s', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Jenis Layanan'), array('controller' => 'service_types', 'action' => 'index')); ?></li>
    </ul>
</li>

<li><a href="#">Data Orang</a>
    <ul>
        <li><?php echo $this->Html->link(__('Pasien'), array('controller' => 'patients', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Dokter'), array('controller' => 'doctors', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Pegawai'), array('controller' => 'employees', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Pengguna'), array('controller' => 'users', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Hak Akses'), array('controller' => 'userRoles', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Laporan'), array('controller' => 'reports', 'action' => 'index')); ?></li>
    </ul>
</li>