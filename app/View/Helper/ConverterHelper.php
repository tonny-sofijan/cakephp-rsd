<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConverterHelper
 *
 * @author Joko Hermanto
 */
class ConverterHelper extends AppHelper {

    function yesNo($yesNo) {

        $yesArray = array('Y', '1');
        if (in_array(strtoupper(trim($yesNo)), $yesArray) != null) {
            return __('Ya');
        } else {
            return __('Tidak');
        }
    }

    function formatDate($date, $pattern = 'd M Y') {
        if ($date == null)
            return null;

        $newDate = new DateTime($date);
        return $newDate->format($pattern);
    }

    function formatNumber($number) {
        return number_format($number, 2, '.', ',');
    }

    function activeStatus($status) {
        if (!empty($status) && $status === 'A') {
            return __('Aktif');
        }

        return __('Tidak Aktif');
    }

    function religion($choice) {
        $result = null;
        switch ($choice) {
            case '0':
                $result = 'Islam';
                break;
            case '1':
                $result = 'Kristen';
                break;
            case '2':
                $result = 'Protestan';
                break;
            case '3':
                $result = 'Buddha';
                break;
            case '4':
                $result = 'Hindu';
                break;
            case '5':
                $result = 'Konghucu';
                break;
            case '6':
                $result = 'Lainnya';
                break;
        }
        return $result;
    }

    function serviceGrade($grade) {
        $result = null;
        switch ($grade) {
            case '0':
                $result = 'ICU';
                break;
            case '1':
                $result = 'VIP';
                break;
            case '2':
                $result = 'Utama';
                break;
            case '3':
                $result = 'Kelas I';
                break;
            case '4':
                $result = 'Kelas II';
                break;
            case '5':
                $result = 'Kelas III';
                break;
            default:
                $result = 'Kelas II';
                break;
        }
        return $result;
    }

    function serviceTypeUnit($unit) {
        $result = null;
        switch ($unit) {
            case '0':
                $result = 'Pasien/Kali';
                break;
            case '1':
                $result = 'Hari';
                break;
            case '2':
                $result = 'Per-hari';
                break;
            case '3':
                $result = 'Per-tindakan';
                break;
            case '4':
                $result = 'Tabung/Liter';
                break;
        }
        return $result;
    }

    /* PATIENT REGISTRATION */

    public function registrationType($type) {
        $result = null;
        switch ($type) {
            case 'hospitalization':
                $result = 'Rawat Inap';
                break;
            case 'outpatient':
                $result = 'Rawat Jalan';
                break;
            case 'icu':
                $result = 'IGD';
                break;
        }
        return $result;
    }

    public function trueFalse($bool) {
        $result = null;
        switch ($bool) {
            case '0':
                $result = 'False';
                break;
            case '1':
                $result = 'True';
                break;
        }
        return $result;
    }

    public function oldNew($value) {
        $result = null;
        switch ($value) {
            case '0':
                $result = 'Baru';
                break;
            case '1':
                $result = 'Lama';
                break;
        }
        return $result;
    }

    public function getTriage($level) {
        $result = null;
        switch ($level) {
            case '0':
                $result = 'Hijau';
                break;
            case '1':
                $result = 'Kuning 1';
                break;
            case '2':
                $result = 'Kuning 2';
                break;
            case '3':
                $result = 'Merah';
                break;
            case '4':
                $result = 'Hitam';
                break;
        }
        return $result;
    }

    public function visitCause($condition) {
        $result = null;
        switch ($condition) {
            case '0':
                $result = 'Non Trauma';
                break;
            case '1':
                $result = 'Trauma';
                break;
        }
        return $result;
    }

    public function paymentMethod($method) {
        $result = null;
        switch ($method) {
            case '0':
                $result = 'Umum / Biaya Sendiri';
                break;
            case '1':
                $result = 'Akses Sosial';
                break;
            case '2':
                $result = 'JAMKESMAS / JAMPERSAL';
                break;
            case '3':
                $result = 'JAMKESDA';
                break;
            case '4':
                $result = 'JAMSOSTEK';
                break;
            case '5':
                $result = 'INHEALTH';
                break;
            case '6':
                $result = 'Gratis';
                break;
            case '7':
                $result = 'Lainnya';
                break;
        }
        return $result;
    }

    public function destinationRoom($room) {
        switch ($room) {
            case '0':
                $result = 'Ruang IGD';
                break;
            case '1':
                $result = 'Ruang Interne';
                break;
            case '2':
                $result = 'Ruang Bedah';
                break;
            case '3':
                $result = 'Ruang Mata';
                break;
            case '4':
                $result = 'Ruang Gigi';
                break;
            case '5':
                $result = 'Ruang THT';
                break;
            case '6':
                $result = 'Ruang Saraf';
                break;
            case '7':
                $result = 'Ruang Umum';
                break;
            case '8':
                $result = 'Ruang KIA/OBSGYN';
                break;
            case '9':
                $result = 'Ruang Anak';
                break;
            case '10':
                $result = 'Fisioterapi';
                break;
            case '11':
                $result = 'Lainnya';
                break;
        }
        return $result;
    }

    public function arrivedWith($who) {
        switch ($who) {
            case '0':
                $result = 'Datang Sendiri';
                break;
            case '1':
                $result = 'Diantar Keluarga/kerabat';
                break;
            case '2':
                $result = 'Rumah Sakit';
                break;
            case '3':
                $result = 'Dokter Praktek';
                break;
            case '4':
                $result = 'Puskesmas';
                break;
            case '5':
                $result = 'Bidan';
                break;
            case '6':
                $result = 'Lainnya';
                break;
        }
        return $result;
    }

    public function treatmentLevel($level) {
        switch ($level) {
            case '0':
                $result = 'VIP';
                break;
            case '1':
                $result = 'Utama';
                break;
            case '2':
                $result = 'Kelas 1';
                break;
            case '3':
                $result = 'Kelas 2';
                break;
            case '4':
                $result = 'Kelas 3';
                break;
            case '5':
                $result = 'Isolasi';
                break;
            case '6':
                $result = 'Lainnya';
                break;
        }
        return $result;
    }

    public function disposition($case) {
        switch ($case) {
            case '0':
                $result = 'Izin Dokter';
                break;
            case '1':
                $result = 'Pulang Paksa';
                break;
            case '2':
                $result = 'Rujukan';
                break;
            case '3':
                $result = 'Meninggal &lt; 48 jam';
                break;
            case '4':
                $result = 'Meninggal &gt; 48 jam';
                break;
            case '5':
                $result = 'Lari';
                break;
            case '6':
                $result = 'Lainnya';
                break;
        }
        return $result;
    }
    
    public function maritalStatus($status) {
        $result = '';
        switch ($status) {
            case '0':
                $result = 'Belum Menikah';
                break;
            case '1':
                $result = 'Menikah';
                break;
            case '2':
                $result = 'Cerai';
                break;
        }
        
        return $result;
    }

    public function lastEducation($edu) {
        $result = '';
        switch ($edu) {
            case '0':
                $result = 'Tidak Sekolah';
                break;
            case '1':
                $result = 'SD';
                break;
            case '2':
                $result = 'SMP';
                break;
            case '3':
                $result = 'SMA/SMK';
                break;
            case '4':
                $result = 'Profesional 1 Thn';
                break;
            case '5':
                $result = 'Profesional 2 Thn';
                break;
            case '6':
                $result = 'Diploma (D3)';
                break;
            case '7':
                $result = 'S1';
                break;
            case '8':
                $result = 'S2';
                break;
            case '9':
                $result = 'S3';
                break;
        }
        
        return $result;
    }
    
    public function salutation($val) {
        $result = '';
        switch ($val) {
            case '0':
                $result = 'Saudara';
                break;
            case '1':
                $result = 'Bapak';
                break;
            case '2':
                $result = 'Ibu';
                break;
        }
        
        return $result;
    }
    
    public function gender($val) {
        $result = '';
        switch ($val) {
            case 'M':
                $result = 'Pria';
                break;
            case 'F':
                $result = 'Wanita';
                break;
        }
        
        return $result;
    }

    public function medicineUnits($val) {
        $result = '';
        switch ($val) {
            case '0':
                $result = 'Tablet';
                break;
            case '1':
                $result = 'Kapsul';
                break;
            case '1':
                $result = 'Strip';
                break;
            case '1':
                $result = 'Bungkus';
                break;
            case '4':
                $result = 'Vial';
                break;
            case '5':
                $result = 'Ampula';
                break;
            case '6':
                $result = 'Botol';
                break;
            case '7':
                $result = 'Rool';
                break;
            case '8':
                $result = 'Gulungan';
                break;
            case '9':
                $result = 'Kotak';
                break;
            case '10':
                $result = 'Kolf';
                break;
            case '11':
                $result = 'Piece(s)';
                break;
        }
        
        return $result;
    }

}

?>
