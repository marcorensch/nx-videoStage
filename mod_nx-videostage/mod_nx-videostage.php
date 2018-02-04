<?php
/**
 * Modul Datei für nx-videoStage
 * @package     nx-videoStage
 *
 * @copyright   Copyright (C) 2009 - 2018 nx-designs.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';



// Configuration Settings
$player['data']['id']						= 'nx-videobox_' . $module->id;				// Setup a unique ID for this module instance
$player['data']['url']						= $params->get( 'nxvs_url' , 'http://www.html5videoplayer.net/videos/toystory.mp4' );	// URL of the Video
			
$player['configuration']['effect']			= $params->get( 'nxvs_effect_type' , 'ambilight');
$player['configuration']['bordercolor']		= $params->get( 'nxvs_bordercolor' , 'rgba(0,0,0, 0.9)' );	
$player['configuration']['borderwidth']		= $params->get( 'nxvs_borderwidth' , '10px' );
$player['configuration']['radius']			= $params->get( 'nxvs_rad' , '10px' );									// Border Radius Video Element
$player['configuration']['vol']				= intval($params->get( 'nxvs_vol' , 0.5 ));
$player['configuration']['ratio']			= $params->get( 'nxvs_ratio' , '56.23%' );

$player['configuration']['htmlblock']		= intval($params->get( 'nxvs_enable_html' , 1));
$player['configuration']['htmlblockpos']	= $params->get( 'nxvs_html_position' , 'left');
$player['configuration']['htmlblockcls']	= $params->get( 'nxvs_html_class' , 'uk-dark' );
$player['configuration']['vvalign']			= $params->get( 'nxvs_vid_valign' , 'middle' );							// Vertical video align

$player['additions']['html']				= $params->get( 'nxvs_html' , '' );			// HTML-Textfield for additional Infos
$player['additions']['stagecolor']			= $params->get( 'nxvs_stagecolor' , 'rgba(34,34,34, 1)' );	
					

$player['setupstring']['autoplay']			= $params->get( 'nxvs_ap' , 0 );
$player['setupstring']['controls']			= $params->get( 'nxvs_ctrl' , 1 );
$player['setupstring']['loop']				= $params->get( 'nxvs_loop' , 1 );


// Subforms Preparation
//$colorsetup 				= $params->get( 'tempsettings' );
//$dataset['temps'] 			= modnxColorHelper::parseSubform( $dataset );		// In der Helper Datei von Object zu Array umwandeln
$debug 						= $params->get( 'debug' );
$playerparametes			= modnxVideoStageHelper::player( $player['setupstring'] );// Inline Player Parameters like autoplay or controls
$pl 						= modnxVideoStageHelper::frontend( $player ); 			// Inhalte für die Ausgabe aufbereiten

$layout = 'default';

require( JModuleHelper::getLayoutPath( 'mod_nx-videostage', $layout));


?>