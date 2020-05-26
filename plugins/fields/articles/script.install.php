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

class PlgFieldsArticlesInstallerScript extends PlgFieldsArticlesInstallerScriptHelper
{
	public $name           = 'ARTICLES_FIELD';
	public $alias          = 'articles';
	public $extension_type = 'plugin';
	public $plugin_folder  = 'fields';

	public function uninstall($adapter)
	{
		$this->uninstallPlugin('articleslinked', 'fields');
	}

	public function onAfterInstall($route)
	{
		$this->moveOldLinkedTypesToNew();

		return parent::onAfterInstall($route);
	}

	private function moveOldLinkedTypesToNew()
	{
		$query = $this->db->getQuery(true)
			->update('#__fields')
			->set($this->db->quoteName('type') . ' = ' . $this->db->quote('articleslinked'))
			->where($this->db->quoteName('type') . ' = ' . $this->db->quote('articles'))
			->where($this->db->quoteName('fieldparams') . ' LIKE ' . $this->db->quote('%"field_type":"linked_articles"%'));
		$this->db->setQuery($query);
		$this->db->execute();
	}
}
