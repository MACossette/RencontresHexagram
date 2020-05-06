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

defined('_JEXEC') or die('Restricted access');

/**
 *  Advanced Custom Fields System Plugin
 */
class PlgSystemACF extends JPlugin
{
    /**
     *  Auto load plugin's language file
     *
     *  @var  boolean
     */
    protected $autoloadLanguage = true;
    
    /**
     *  Application Object
     *
     *  @var  object
     */
    protected $app;

    /**
     *  The loaded indicator of helper
     *
     *  @var  boolean
     */
    private $init;
    
    

    /**
     *  Loads the helper classes of plugin
     *
     *  @return  bool
     */
    private function getHelper()
    {
        // Return if is helper is already loaded
        if ($this->init)
        {
            return true;
        }

        // Return if we are not in frontend
        if (!$this->app->isSite())
        {
            return false;
        }

        // Load Novarain Framework
        if (!@include_once(JPATH_PLUGINS . '/system/nrframework/autoload.php'))
        {
            return;
        }

        // Load Plugin Helper
        JLoader::register('ACFHelper', __DIR__ . '/helper/helper.php');

        return ($this->init = true);
    }
}
