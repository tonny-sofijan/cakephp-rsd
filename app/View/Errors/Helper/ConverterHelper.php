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
            return __('Yes');
        } else {
            return __('No');
        }
        
    }
    
    function formatDate($date, $pattern = 'd M Y') {
        if ($date == null)
            return null;
        
        $newDate = new DateTime($date);
        return $newDate->format($pattern);
    }
    
    function formatNumber($number) {
        return number_format($number, 2, ',', '.');
    }
    
    function formatHotelStars($stars) {
        return $stars == 0 ? '-' : $stars;
    }
    
    function meals($meals) {
        $result = '';
        $mealsArr = explode('^', strtoupper($meals));
        foreach ($mealsArr as $meal) {
            $temp = '';
            switch ($meal) {
                case 'B':
                    $temp = __('Breakfast');
                    break;
                case 'L':
                    $temp = __('Lunch');
                    break;
                case 'D':
                    $temp = __('Dinner');
                    break;
            }
            
            $result .= $temp . ', ';
        }
        
        return substr(trim($result), 0, strlen(trim($result)) - 1);
    }
    
    function durationDays($duration) {
        $days = $duration > 1 ? __('days') : __('day');
        $nights = ($duration - 1) > 1 ? __('nights') : __('night');
        
        return sprintf('%d %s %d %s', $duration, $days, $duration - 1, $nights);
    }
}

?>
