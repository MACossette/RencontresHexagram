<?php

/**
 * @author          Tassos.gr
 * @link            http://www.tassos.gr
 * @copyright       Copyright © 2018 Tassos Marinos All Rights Reserved
 * @license         GNU GPLv3 <http://www.gnu.org/licenses/gpl.html> or later
*/

namespace NRFramework\Assignments\Component;

defined('_JEXEC') or die;

class QuixSingle extends QuixBase
{
    /**
	 *  Pass check
	 *
	 *  @return  bool
	 */
	public function pass()
	{
        return $this->passSinglePage();
    }
    
    /**
     *  Returns the assignment's value
     * 
     *  @return int
     */
    public function value()
    {
        return $this->request->id;
    }
}