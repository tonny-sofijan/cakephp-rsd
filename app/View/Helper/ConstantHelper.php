<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConstantHelper
 *
 * @author Joko Hermanto
 */
class ConstantHelper extends AppHelper {

    public $pleaseSelectOne = 'PSO';
    public $selectAll = 'SA';
    public $patternDateDmySlash = 'd/m/Y';
    public $patternDateDmyDash = 'd-m-Y';
    public $requiredFields = 'RF';

    public function getPriorityList() {
        return array(1 => __('Lebih'), 0 => __('Sama'), -1 => __('Kurang'));
    }

    public function getActivityStatusList() {
        return array('A' => __('Aktif'), 'I' => __('Tidak Aktif'));
    }

    public function getYesNoList($type) {
        if (strtoupper($type) === 'A') {
            return array('Y' => __('Ya'), 'N' => __('Tidak'));
        } else if (strtoupper($type) === 'N') {
            return array(1 => __('Ya'), -1 => __('Tidak'));
        }
    }

    public function getSalutationList() {
        return array('0' => 'Saudara', '1' => 'Bapak', '2' => 'Ibu');
    }

    public function getGenderList() {
        return array('M' => 'Pria', 'F' => 'Wanita');
    }

    public function getMaritalStatusList() {
        return array('0' => 'Belum Menikah', '1' => 'Menikah', '2' => 'Cerai');
    }

    public function getLastEducationList() {
        return array(
            '0' => 'Tidak Sekolah',
            '1' => 'SD',
            '2' => 'SMP',
            '3' => 'SMA/SMK',
            '4' => 'Profesional 1 thn',
            '5' => 'Profesional 2 Thn',
            '6' => 'Diploma (D3)',
            '7' => 'S1',
            '8' => 'S2',
            '9' => 'S3'
        );
    }
    
    public function getReligionList() {
        return array(
            '0' => 'Islam',
            '1' => 'Kristen',
            '2' => 'Protestan',
            '3' => 'Buddha',
            '4' => 'Hindu',
            '5' => 'Konghucu',
            '6' => 'Lainnya'
        );
    }
    
    public function getMedicamentTypeList() {
        return array(
            '0' => 'Generik',
            '1' => 'Racik',
            '2' => 'Paten',
        );
    }

    /* CHECKOUT */

    public function getServiceGrade() {
        return array(
            '0' => 'ICU',
            '1' => 'VIP',
            '2' => 'Utama',
            '3' => 'Kelas I',
            '4' => 'Kelas II',
            '5' => 'Kelas III',
        );
    }

    /* SERVICE TYPES */

    public function getServiceTypeUnit() {
        return array(
            '0' => 'Pasien/Kali',
            '1' => 'Hari',
            '2' => 'Per-hari',
            '3' => 'Per-tindakan',
            '4' => 'Tabung/Liter',
        );
    }

    /* PATIENT REGISTRATION */

    public function getRegistrationType() {
        return array(
            'hospitalization' => 'Rawat Inap',
            'outpatient' => 'Rawat Jalan',
            'icu' => 'IGD',
        );
    }

    public function getTrueFalse() {
        return array(
            '0' => 'False',
            '1' => 'True',
        );
    }

    public function getOldNew() {
        return array(
            '0' => 'Baru',
            '1' => 'Lama',
        );
    }

    public function getTriage() {
        return array(
            '0' => 'Hijau',
            '1' => 'Kuning 1',
            '2' => 'Kuning 2',
            '3' => 'Merah',
            '4' => 'Hitam',
        );
    }

    public function getVisitCause() {
        return array(
            '0' => 'Non Trauma',
            '1' => 'Trauma',
        );
    }

    public function getPaymentMethod() {
        return array(
            '0' => 'Umum / Biaya Sendiri',
            '1' => 'Akses Sosial',
            '2' => 'JAMKESMAS / JAMPERSAL',
            '3' => 'JAMKESDA',
            '4' => 'JAMSOSTEK',
            '5' => 'INHEALTH',
            '6' => 'Gratis',
            '7' => 'Lainnya',
        );
    }

    public function getDestinationRoom() {
        return array(
            '0' => 'Ruang IGD',
            '1' => 'Ruang Interne',
            '2' => 'Ruang Bedah',
            '3' => 'Ruang Mata',
            '4' => 'Ruang Gigi',
            '5' => 'Ruang THT',
            '6' => 'Ruang Saraf',
            '7' => 'Ruang Umum',
            '8' => 'Ruang KIA/OBSGYN',
            '9' => 'Ruang Anak',
            '10' => 'Ruang Fisioterapi',
            '11' => 'Ruang Lainnya',
        );
    }

    public function getArrivedWith() {
        return array(
            '0' => 'Datang Sendiri',
            '1' => 'Diantar Keluarga/kerabat',
            '2' => 'Rumah Sakit',
            '3' => 'Dokter Praktek',
            '4' => 'Puskesmas',
            '5' => 'Bidan',
            '6' => 'Lainnya',
        );
    }

    public function getTreatmentLevel() {
        return array(
            '0' => 'VIP',
            '1' => 'Utama',
            '2' => 'Kelas 1',
            '3' => 'Kelas 2',
            '4' => 'Kelas 3',
            '5' => 'Isolasi',
            '6' => 'Lainnya',
        );
    }

    public function getDisposition() {
        return array(
            '0' => 'Izin Dokter',
            '1' => 'Pulang Paksa',
            '2' => 'Rujuk',
            '3' => 'Meninggal &lt; 48 jam',
            '4' => 'Meninggal &gt; 48 jam',
			'5' => 'Lari',
			'6' => 'Lainnya'
        );
    }

    public function getMedicineUnits() {
        return array(
            '0' => 'Tablet',
            '1' => 'Kapsul',
            '2' => 'Strip',
            '3' => 'Bungkus',
            '4' => 'Vial',
            '5' => 'Ampula',
            '6' => 'Botol',
            '7' => 'Rool',
            '8' => 'Gulungan',
            '9' => 'Kotak',
            '10' => 'Kolf',
            '11' => 'Piece(s)',
        );
    }

    public function getMessage($msgCode) {
        switch ($msgCode) {
            case $this->pleaseSelectOne:
                return __('-- Silahkan Pilih --');
            case $this->selectAll:
                return __('-- Semua --');
            case $this->requiredFields:
                return __('Kolom bergaris bawah harus diisi.');
        }
    }

    public function getFileBaseDir() {
        return '../files/';
    }

}

?>
