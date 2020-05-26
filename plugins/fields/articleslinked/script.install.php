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

require_once __DIR__ . '/script.install.helper.php';

class PlgFieldsArticlesLinkedInstallerScript extends PlgFieldsArticlesLinkedInstallerScriptHelper
{
	public $name           = 'ARTICLES_FIELD';
	public $alias          = 'articleslinked';
	public $extension_type = 'plugin';
	public $plugin_folder  = 'fields';

	public function uninstall($adapter)
	{
		$this->uninstallPlugin('articles', 'fields');
	}
}
