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
        return array(1 => __('Higher'), 0 => __('Equal'), -1 => __('Lower'));
    }
    
    public function getYesNoList($type) {
        if (strtoupper($type) === 'A') {
            return array('Y' => __('Yes'), 'N' => __('No'));
        } else if (strtoupper($type) === 'N') {
            return array(1 => __('Yes'), -1 => __('No'));
        }        
    }
    
    public function getSalutationList() {
        return array(0 => 'Mr.', 1 => 'Mrs.');
    }
    
    public function getMessage($msgCode) {
        switch ($msgCode) {
            case $this->pleaseSelectOne:
                return __('-- Please Select One --');
            case $this->selectAll:
                return __('-- All --');
            case $this->requiredFields:
                return __('Underlined fields are required.');
        }
    }
    
    public function getFileBaseDir() {
        return '../files/';
    }
    
}

?>
