<?php
/**
 * @author          Tassos Marinos <info@tassos.gr>
 * @link            http://www.tassos.gr
 * @copyright       Copyright © 2018 Tassos Marinos All Rights Reserved
 * @license         GNU GPLv3 <http://www.gnu.org/licenses/gpl.html> or later
 */

// No direct access to this file
defined('_JEXEC') or die;

JFormHelper::loadFieldClass('text');

class JFormFieldACFOSM extends JFormFieldText
{
	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 */
	public function getInput()
	{
		// Setup properties
		$this->width    	  		= $this->element['width'] ? $this->element['width'] : '500px';
		$this->height   	  		= $this->element['height'] ? $this->element['height'] : '400px';
		$this->zoom     	  		= $this->element['zoom'] ? $this->element['zoom'] : 13;
		$this->show_address_input   = $this->element['show_address_input'] == '1';
		$resetButtonClass			= empty($this->value) ? ' is-hidden' : '';
		$this->value 				= $this->checkCoordinates($this->value) ? $this->value : '';
		$this->component_classes	= '';
		$default_coords 			= '36.892587, 27.287793';

		$map_values_to_use = !empty($this->value) ? $this->value : $default_coords;
		
		$split_coords = explode(',', $map_values_to_use);

		$lang = JFactory::getLanguage();
		$lang_tag = $lang->getTag();
		
		$doc = JFactory::getDocument();
		$doc->addScriptOptions('com_acf_osm_admin', [
			'lang_tag' => $lang_tag
		]);
		
		JText::script('ACF_OSM_ADDRESS_DESC');

		// Add scripts to DOM
		JHtml::stylesheet('plg_fields_acfosm/acf_osm_map_admin.css', ['relative' => true, 'version' => 'auto']);
		JHtml::stylesheet('https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.0.1/css/ol.css');
		JHtml::script('https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.0.1/build/ol.js');
		
		// load geocoder only if we need to display the address text input
		if ($this->show_address_input)
		{
			JHtml::stylesheet('https://unpkg.com/ol-geocoder/dist/ol-geocoder.min.css');
			JHtml::script('https://unpkg.com/ol-geocoder');
			$this->component_classes = ' padding-top';
		}
		JHtml::script('plg_fields_acfosm/acf_osm_map.js', ['relative' => true, 'version' => 'auto']);
		JHtml::script('plg_fields_acfosm/acf_osm_map_admin.js', ['relative' => true, 'version' => 'auto']);

		$coordsInput = $this->getRenderer($this->layout)->render($this->getLayoutData());

		$html = 
			'<div class="nr-address-component' . $this->component_classes . '"
				id="nr_' . $this->id . '_map_wrapper"
				data-geocoder="' . $this->show_address_input . '">
				<div id="' . $this->id . '_map"
					class="osm_map_item nr-address-map"
					data-lat="' . trim($split_coords[0]) . '"
					data-long="' . trim($split_coords[1]) . '"
					data-zoom="' . $this->zoom . '">
				</div>';
		$html .= '<div class="acf-coords-wrapper">';
		$html .= $coordsInput;
		$html .= '<a href="#" class="acf_osm_map_reset_btn' . $resetButtonClass . '" title="' . JText::_('ACF_OSM_CLEAR_BUTTON_TITLE') . '">' . JText::_('ACF_OSM_CLEAR_BUTTON_TEXT') . '</a>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	/**
	 * Method to get the data to be passed to the layout for rendering.
	 *
	 * @return  array
	 */
	protected function getLayoutData()
	{
		$data = parent::getLayoutData();

		$extraData = [
			'class' => 'nr_address_coords',
			'readonly' => 'readonly'
		];

		return array_merge($data, $extraData);
	}

	/**
	 * Checks the validity of the coordinates
	 */
	private function checkCoordinates($coordinates)
	{
		return (preg_match("/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/", $coordinates));
	}

}