<?php

/**
 * Overloading - Overloading Interface
 *
 * Magic methods handling.
 *
 * @category   Stdlib
 * @package    Overloading
 * @copyright  Copyright (c) 2012 - Julio Antúnez Tarín
 * @license    http://creativecommons.org/licenses/by-nc-sa/3.0 *CC BY-NC-SA 3.0
 * @version    1.0
 * @link       http://twitter.com/jatap
 * @author     Julio Antúnez Tarín <julio.antunez.tarin@gmail.com>
 * @date       05/09/2012 04:30:22
 * @filesource
 * @since      File available since Release 1.0
 */

namespace Common\Stdlib\Overloading;

// -----------------------------------------------------------------------------

use Common\Stdlib\Overloading\Exception\MethodNotAllowed;
use Common\Stdlib\Overloading\Exception\MethodNotExists;
use Common\Stdlib\Overloading\Exception\PropertyNotExists;

/**
 * @category   Stdlib
 * @package    Overloading
 * @copyright  Copyright (c) 2012 - Julio Antúnez Tarín
 * @license    http://creativecommons.org/licenses/by-nc-sa/3.0 *CC BY-NC-SA 3.0
 */
interface Overloading
{
    /**
     * Overloading for valid properties (accesors)
     *
     * Map corresponding accessor first and property last.
     *
     * @param   string $property
     *
     * @throws  PropertyNotExists
     *
     * @return  string
     */
    public function __get($property);

    /**
     * Overloading for valid properties (mutators)
     *
     * Map corresponding accessor first and property last.
     *
     * @param   string $property
     * @param   mixed  $value
     *
     * @throws  PropertyNotExists
     */
    public function __set($property, $value);

    /**
     * Overloading: retrieve and set fields by name
     *
     * @param   string $method
     * @param   array  $arguments
     *
     * @throws  MethodNotAllowed
     * @throws  MethodNotExists
     *
     * @return  mixed
     */
    public function __call($method, $arguments);
}