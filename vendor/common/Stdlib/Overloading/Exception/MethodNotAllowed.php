<?php

/**
 * MethodNotAllowed - Method Not Allowed Exception Class
 *
 * @category   Stdlib
 * @package    Overloading
 * @subpackage Exception
 * @copyright  Copyright (c) 2012 - Julio Antúnez Tarín
 * @license    http://creativecommons.org/licenses/by-nc-sa/3.0 *CC BY-NC-SA 3.0
 * @version    1.0
 * @link       http://twitter.com/jatap
 * @author     Julio Antúnez Tarín <julio.antunez.tarin@gmail.com>
 * @date       05/09/2012 04:38:00
 * @filesource
 * @since      File available since Release 1.0
 */

namespace Common\Stdlib\Overloading\Exception;

// -----------------------------------------------------------------------------

use \Exception;

/**
 * @category   Stdlib
 * @package    Overloading
 * @subpackage Exception
 * @copyright  Copyright (c) 2012 - Julio Antúnez Tarín
 * @license    http://creativecommons.org/licenses/by-nc-sa/3.0 *CC BY-NC-SA 3.0
 */
class MethodNotAllowed extends Exception
{
	/**
	 * Exceptions messages
	 */
	const EXC_METHOD_NOT_AVAILABLE = "Only getters and setters are allowed.";

    /**
     * Constructor
     *
     * @param   string $method Method name
     */
	public function __construct($method = null)
	{
		exit (sprintf(self::EXC_METHOD_NOT_AVAILABLE, $method));
	}
}