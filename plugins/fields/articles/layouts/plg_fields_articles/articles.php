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

if (is_file(JPATH_LIBRARIES . '/regularlabs/autoload.php'))
{
	require_once JPATH_LIBRARIES . '/regularlabs/autoload.php';
}

require_once JPATH_PLUGINS . '/fields/articles/helper.php';

/*
 * @var array  $displayData
 * @var object $layout
 * @var object $field
 * @var string $layout_type
 */
extract($displayData);

$ids = (array) $field->value;

echo PlgFieldsArticlesHelper::renderLayout($ids, $layout, $field, $layout_type);
