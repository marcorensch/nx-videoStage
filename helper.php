<?php

/**
 * Helper Datei für nx-videoStage
 * @package     nx-videoStage
 *
 * @copyright   Copyright (C) 2009 - 2018 nx-designs.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

class modnxVideoStageHelper {

    public static function changeColorVal($color)
        /*
         *  Function to transform rgb color string value to array with rgb integers
         *  $color      string              rgb(255, 255, 255)
         *  $intarray   array               [int, int, int]
        */
    {   
        $color = str_replace("rgb(","",$color);                         // "rgb(255, 255, 255)"
        $color = str_replace(")","",$color);                            // "255, 255, 255)"
        $color = str_replace(" ","",$color);                            // "255,255,255"

        $intarray = array_map('intval', explode(',', $color ));         // [int, int, int]

        return $intarray;
    }

	public static function parseSubform($values)
    {	
    	// Das Object in ein Array umwandeln
        $array =  (array) $values;

		return $array;
    }

    public static function checkPixelValue($input)
    {
        // Wandelt den Input in eine Integer um und anschliessend in einen String als Pixelangabe
        $integer = intval($input);
        $output = $integer . 'px';
        return $output;
    }

    public static function frontend($values)
    {
    	$data = $values;

    	return $data;
    }

    public static function player($playerparametes)
    {
        // Builds the Parameters String for the Player

        $setup = '';
        if($playerparametes['autoplay'])
        {
            $setup .= 'autoplay ';
        };
        if($playerparametes['controls'])
        {
            $setup .= 'controls ';
        }
        if($playerparametes['loop'])
        {
            $setup .= 'loop ';
        }

        return $setup;
    }
	
}
?>
