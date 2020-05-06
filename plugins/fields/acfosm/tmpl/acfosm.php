<?php

/**
 * @package         Advanced Custom Fields
 * @version         1.0.1 Free
 * 
 * @author          Tassos Marinos <info@tassos.gr>
 * @link            http://www.tassos.gr
 * @copyright       Copyright © 2019 Tassos Marinos All Rights Reserved
 * @license         GNU GPLv3 <http://www.gnu.org/licenses/gpl.html> or later
*/

defined('_JEXEC') or die;

if (!$coords = $field->value)
{
	return;
}

// Setup Variables
$mapID  = 'acf_osm_map_' . $field->id;
$coords = explode(",", $coords);

if (!isset($coords[1]))
{
	return;
}

\JHtml::_('behavior.core');

$width  = $fieldParams->get('width', '400px');
$height = $fieldParams->get('height', '350px');
$zoom   = $fieldParams->get('zoom', 13);

// Add Media Files
JHtml::stylesheet('https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.0.1/css/ol.css');
JHtml::script('https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.0.1/build/ol.js');
JHtml::script('plg_fields_acfosm/acf_osm_map.js', ['relative' => true, 'version' => 'auto']);
JHtml::script('plg_fields_acfosm/script.js', ['relative' => true, 'version' => 'auto']);

$buffer = '<div class="osm_map_item" id="' . $mapID . '" data-zoom="' . $zoom . '" data-lat="' . trim($coords[0]) . '" data-long="' . trim($coords[1]) . '" style="width:' . $width . ';height:' . $height . ';max-width:100%;"></div>';

echo $buffer;