<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppConstant
 *
 * @author Joko Hermanto
 */
class AppConstant {
    
    //======PAGE TITLE======//
    public static $TITLE_BASIC = 'TITLE_BASIC';
    
    //======FORMAT PATTERN=====//
    public static $PATTERN_DATE_YMD = 'Y-m-d';
    public static $PATTERN_DATE_DMY = 'd-m-Y';   
    public static $PATTERN_REGEX_NUMBER_ONLY = '/[^-0-9]/i';
    
    //======COMMON======//    
    // file directory location constant
    public static $FILE_BASE_DIR = 'files/';
    public static $FILE_BASE_DIR_VIEW = '../files/';
    public static $FILE_EXCEL_SUB_DIR = 'excel/';
    public static $FILE_WORD_SUB_DIR = 'word/';
    public static $FILE_PDF_SUB_DIR = 'pdf/';
    public static $FILE_IMG_SUB_DIR = 'images/';
    
    // error messages
    public static $ERR_UPLOAD_PLEASE_SELECT_FILE = 'EM1';
    public static $ERR_UPLOAD_FILE_NOT_ALLOWED = 'EM2';
    public static $ERR_UPLOAD_FAILED = 'EM3';
    public static $ERR_UPLOAD_FILE_IS_EXIST = 'EM4';
    public static $ERR_FAILED = 'EM5';
    public static $ERR_EMPTY = 'EM6';
    public static $ERR_IS_EXISTS = 'EM7';
    public static $ERR_DOWNLOAD_EMPTY = 'EM8';
    public static $ERR_MUST_BE_NUMERIC = 'EM9';
    public static $ERR_VALID_EMAIL = 'EM10';
    
    // success messages
    public static $MSG_SUCCESS = 'M1';
    
    //=======UPLOAD FILE=======//    
    // upload constant
    public static $EXCEL_FILE = 0;
    public static $WORD_FILE = 4;
    public static $PDF_FILE = 1;
    public static $IMG_FILE = 2;
    public static $OTHERS_FILE = 3;
    
    public static $UPLOAD_NO_ERR_FOUND = 0;
    
    public static $ALLOWED_FILE_EXTENSIONS = array('doc', 'docx', 'xls', 'xlsx', 'pdf');
    public static $ALLOWED_IMG_EXTENSIONS = array('jpg', 'jpeg', 'gif', 'png');
    
    // reader type
    public static $READER_EXCEL2007 = 'Excel2007';
    
    //=======ROLE PRIORITY=======//        
    public static $ROLE_PRIORITY_ADMIN = 99;
    public static $ROLE_PRIORITY_HEAD = 99;
    public static $ROLE_PRIORITY_FINANCE_STAFF = 98;
    public static $ROLE_PRIORITY_MEDICAL_RECORD_STAFF = 97;
    public static $ROLE_PRIORITY_PATIENT_REG_STAFF = 96;
    public static $ROLE_PRIORITY_EMERGENCY_STAFF = 96;
    public static $ROLE_PRIORITY_PHARMACY_STAFF = 95;
    public static $ROLE_PRIORITY_DOCTORS_STAFF = 94;
        
    //=======MODULE CODE======//
//    public static $MDL_CODE_COMPANY = 'CPY';
    
    //=======CODESET NAME=====//
    public static $CODESET_NAME_POSITION = 'POSITION';
    public static $CODESET_NAME_GENDER = 'GENDER';
    public static $CODESET_NAME_MARITAL_STATUS = 'MARITAL_STATUS';
    public static $CODESET_NAME_LETTER_STATUS = 'LETTER_STATUS';
    
    //=======IMPORTANT SESSION NAME======//
    public static $SESSION_TRANSACTION = 'SES_TRX';
    public static $SESSION_REFERER = 'SES_REFERER';
    
    //=======MAIL STATUS======//
   public static $MAIL_STATUS_SAVED = 0;
   public static $MAIL_STATUS_SENT = 1;
    
    //=======FUNCTIONS======//
    public static function getMessage($msgType) {
        switch ($msgType) {
            case self::$ERR_UPLOAD_PLEASE_SELECT_FILE:
                return __('Silahkan pilih file untuk diunggah.');
            case self::$ERR_UPLOAD_FILE_NOT_ALLOWED:
                return __('File %s tidak diijinkan.');
            case self::$ERR_UPLOAD_FAILED:
                return __('Gagal mengunggah file %s.');
            case self::$ERR_UPLOAD_FILE_IS_EXIST:
                return __('File %s sudah ada.');
            case self::$ERR_FAILED:
                return __('%s gagal.');
            case self::$ERR_EMPTY:
                return __('%s tidak boleh kosong.');
            case self::$ERR_IS_EXISTS:
                return __('%s sudah ada.');
            case self::$ERR_DOWNLOAD_EMPTY:
                return __('Tidak ada file yang bisa didownload.');
            case self::$ERR_MUST_BE_NUMERIC:
                return __('%s harus berupa angka.');
            case self::$ERR_VALID_EMAIL:
                return __('Silahkan masukan alamat email yang benar.');
            case self::$MSG_SUCCESS:
                return __('%s berhasil.');
        }
    }
    
    public static function getPageTitle($title) {
        $basicTitle = __('RSD KH. Daud Arif Kuala Tungkal');
        switch ($title) {
            case self::$TITLE_BASIC:
                return $basicTitle;
        }
    }
    
}

?>
