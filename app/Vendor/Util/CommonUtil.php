<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonUtil
 *
 * @author Joko Hermanto
 */
App::import('Vendor', 'Util/AppConstant');
App::uses('Codeset', 'Model');

class CommonUtil {

    public $codesetMdl;
    public $codesetFields = array('cset_code', 'cset_value');

    public function __construct() {
        if ($this->codesetMdl == null)
            $this->codesetMdl = new Codeset();
    }

    public function getCountryList() {
        return $this->codesetMdl->find('list', array('conditions' => array('cset_name' => AppConstant::$CODESET_NAME_COUNTRY_CODE),
                    'fields' => $this->codesetFields));
    }

    public function getStateList($countryCode) {
        return $this->codesetMdl->find('list', array('conditions' => array('cset_name' => AppConstant::$CODESET_NAME_STATE_CODE,
                        'cset_parent_pk' => $countryCode),
                    'fields' => $this->codesetFields));
    }

    public function getCountry($countryCode) {
        return $this->codesetMdl->find('first', array('conditions' => array('cset_name' => AppConstant::$CODESET_NAME_COUNTRY_CODE, 'cset_code' => $countryCode)));
    }

    public function getState($stateCode) {
        return $this->codesetMdl->find('first', array('conditions' => array('cset_name' => AppConstant::$CODESET_NAME_STATE_CODE, 'cset_code' => $stateCode)));
    }

    public function getCodeset($csetName, $csetCode) {
        return $this->codesetMdl->find('first', array('conditions' => array('cset_name' => $csetName, 'cset_code' => $csetCode)));
    }

    public function getCodesetValue($csetName, $csetCode) {
        $cset = $this->codesetMdl->find('first', array('conditions' => array('cset_name' => $csetName, 'cset_code' => $csetCode)));
        return $cset['Codeset']['cset_value'];
    }

    public function getCodesetLike($csetName, $csetValue, $optional = null) {

        $options = array('conditions' => array('cset_name' => $csetName,
                'cset_value LIKE' => '%' . strtolower($csetValue) . '%'));

        if (!is_null($optional))
            $options = array_merge($options, $optional);

        return $this->codesetMdl->find('all', $options);
    }

    public function getCodesetList($csetName) {
        return $this->codesetMdl->find('list', array('conditions' => array('cset_name' => $csetName), 'fields' => array('cset_code', 'cset_value')));
    }

    public function searchInArray($needle, $haystack, $key) {
        $arrIt = new RecursiveIteratorIterator(new RecursiveArrayIterator($haystack));
        $outputArray = array();
        foreach ($arrIt as $sub) {
            $subArray = $arrIt->getSubIterator();
            if ($subArray[$key] === $needle) {
                $outputArray[] = iterator_to_array($subArray);
            }
        }

        return $outputArray;
    }

    public function synchronizeData(&$current, $previous, $replacedKeys = array()) {

        if (!empty($previous) && count($previous) > 0) {
            $newArr = array();
            foreach ($current as $key => $val) {
                if (is_array($val) && isset($previous[$key])) {
                    $newArr[$key] = $this->synchronizeData($val, $previous[$key], $replacedKeys);
                } else {
                    $newArr[$key] = empty($val) && in_array($key, $replacedKeys) ? $newArr[$key] = $previous[$key] : $val;
                }
            }

            return $newArr;
        }

        return null;
    }

    public function getCleanPrice($price) {
        if (!is_null($price) && !empty($price))
            return preg_replace(AppConstant::$PATTERN_REGEX_NUMBER_ONLY, '', substr($price, 0, strpos($price, '.')));

        return null;
    }

    public function convertToDBTimestamp($date) {
        if (!is_null($date) && !empty($date))
            return date(AppConstant::$PATTERN_DATE_YMD, strtotime($date));

        return null;
    }

}

?>
