<?php
/**
 * @package         Articles Field
 * @version         3.3.0
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2020 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory as JFactory;
use Joomla\CMS\Plugin\PluginHelper as JPluginHelper;
use Joomla\CMS\Router\Route as JRoute;
use RegularLabs\Library\ArrayHelper as RL_Array;
use RegularLabs\Library\Article as RL_Article;
use RegularLabs\Library\DB as RL_DB;
use RegularLabs\Library\Parameters as RL_Parameters;
use RegularLabs\Library\RegEx as RL_RegEx;
use RegularLabs\Plugin\System\ArticlesAnywhere\Replace as AA_Replace;

if (is_file(JPATH_LIBRARIES . '/regularlabs/autoload.php'))
{
	require_once JPATH_LIBRARIES . '/regularlabs/autoload.php';
}

class PlgFieldsArticlesHelper
{
	public static function renderLayout($ids, $layout, $field, $layout_type = 'title', $apply_ordering = true)
	{
		$settings = (object) [];
		switch ($layout_type)
		{
			case 'title_custom':
				$settings->custom_field = $field->fieldparams->get('custom_field', '');
				$settings->link_title   = $field->fieldparams->get('link_title', 1);
				break;
			case 'title':
			default:
				$settings->link_title = $field->fieldparams->get('link_title', 1);
				break;
		}

		$outputs   = self::getOutputs($ids, $layout, $field, $settings, $apply_ordering);
		$separator = $field->fieldparams->get('use_separator') ? $field->fieldparams->get('separator', ', ') : '';

		echo implode($separator, $outputs);
	}

	private static function getOutputs($ids, $layout, $field, $settings, $apply_ordering)
	{
		$ids = array_unique($ids);

		if ($apply_ordering)
		{
			return self::getOrderedOutputs($ids, $layout, $field, $settings);
		}

		return self::getUnOrderedOutputs($ids, $layout, $field, $settings);
	}

	private static function getUnOrderedOutputs($ids, $layout, $field, $settings)
	{
		$outputs = [];

		foreach ($ids as $id)
		{
			if ( ! $id)
			{
				continue;
			}

			$article = RL_Article::get($id);

			if (empty($article->id))
			{
				continue;
			}

			$output = $layout->render(compact('article', 'settings'));

			if (empty($output))
			{
				continue;
			}

			$outputs[] = $output;
		}

		return $outputs;
	}

	private static function getOrderedOutputs($ids, $layout, $field, $settings)
	{
		$ordering  = $field->fieldparams->get('articles_ordering', 'title');
		$direction = $field->fieldparams->get('articles_ordering_direction', 'ASC');

		$texts = [];

		foreach ($ids as $id)
		{
			if ( ! $id)
			{
				continue;
			}

			$article = RL_Article::get($id);

			if (empty($article->id))
			{
				continue;
			}

			$text = $layout->render(compact('article', 'settings'));

			if (empty($text))
			{
				continue;
			}

			switch ($ordering)
			{
				case 'ordering':
				case 'hits':
					$order_id = ($article->{$ordering} * 1000000) + $article->id;
					break;
				case 'created_time':
				case 'modified_time':
				case 'publish_up':
				case 'alias':
				case 'title':
				default:
					$order_id = $article->{$ordering} . '.' . $article->id;
					break;
			}

			$texts[$order_id] = $text;
		}

		if (count($texts) < 2)
		{
			return $texts;
		}

		ksort($texts);

		if ($direction == 'DESC')
		{
			krsort($texts);
		}

		return $texts;
	}

	public static function prepareCustomField($context, $item, &$field)
	{
		JPluginHelper::importPlugin('fields');

		$dispatcher = JEventDispatcher::getInstance();

		// Event allow plugins to modify the output of the field before it is prepared
		$dispatcher->trigger('onCustomFieldsBeforePrepareField', [$context, $item, &$field]);

		// Gathering the value for the field
		$value = $dispatcher->trigger('onCustomFieldsPrepareField', [$context, $item, &$field]);

		if (is_array($value))
		{
			$value = implode($value, ' ');
		}

		// Event allow plugins to modify the output of the prepared field
		$dispatcher->trigger('onCustomFieldsAfterPrepareField', [$context, $item, $field, &$value]);

		// Assign the value
		$field->value = $value;
	}

}
