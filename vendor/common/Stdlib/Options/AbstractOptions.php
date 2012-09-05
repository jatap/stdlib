<?php

/**
 * AbstractOptions - Abstract Options Class
 *
 * Populate class attributes with options params.
 *
 * @category   Stdlib
 * @package    Options
 * @copyright  Copyright (c) 2012 - Julio Antúnez Tarín
 * @license    http://creativecommons.org/licenses/by-nc-sa/3.0 *CC BY-NC-SA 3.0
 * @version    1.0
 * @link       http://twitter.com/jatap
 * @author     Julio Antúnez Tarín <julio.antunez.tarin@gmail.com>
 * @date       05/09/2012 04:14:40
 * @filesource
 * @since      File available since Release 1.0
 */

namespace Common\Stdlib\Options;

// -----------------------------------------------------------------------------

use \ReflectionClass as Reflection;

/**
 * @category   Stdlib
 * @package    Options
 * @copyright  Copyright (c) 2012 - Julio Antúnez Tarín
 * @license    http://creativecommons.org/licenses/by-nc-sa/3.0 *CC BY-NC-SA 3.0
 */
abstract class AbstractOptions
{
    /**
     * Default values
     */
    const DEFAULT_PREFIXED      = true;
    const DEFAULT_PROTECTED     = true;

    /**
     * Fill class attributes with params
     *
     * Types:
     *
     * - Protected Overloading Prefixed (SUGGESTED, ACTIVATED)
     *
     *   Overloading: Yes
     *   Attributes: Protected
     *   Attributes Prefix: "_"
     *   Can be extended.
     *
     * - Protected Overloading Not Prefixed
     *
     *   Overloading: Yes
     *   Attributes: Protected
     *   Attributes Prefix: None
     *   Can be extended.
     *
     * - Private Overloading Prefixed (SUGGESTED)
     *
     *   Overloading: Yes
     *   Attributes: Private
     *   Attributes Prefix: "_"
     *   Can not be extended.
     *
     * - Private Overloading Not Prefixed
     *
     *   Overloading: Yes
     *   Attributes: Private
     *   Attributes Prefix: None
     *   Can not be extended.
     *
     * - Protected Prefixed (SUGGESTED, ACTIVATED)
     *
     *   Overloading: No
     *   Attributes: Protected
     *   Attributes Prefix: "_"
     *   Can be extended.
     *
     * - Protected Not Prefixed
     *
     *   Overloading: No
     *   Attributes: Protected
     *   Attributes Prefix: None
     *   Can be extended.
     *
     * - Private Prefixed (SUGGESTED)
     *
     *   Overloading: No
     *   Attributes: Private
     *   Attributes Prefix: "_"
     *   Can not be extended.
     *
     * - Private Not Prefixed
     *
     *   Overloading: No
     *   Attributes: Private
     *   Attributes Prefix: None
     *   Can not be extended.
     *
     * @param   array|\ArrayObject $options
     */
    public function setOptions($options = null)
    {
        /**
         * Validating options
         */

        // Prefixed
        if (isset($options['prefixed'])) {
            $prefixed   = $options['prefixed'];
        } else {
            $prefixed   = self::DEFAULT_PREFIXED;
        }

        // Protected
        if (isset($options['protected'])) {
            $protected  = $options['protected'];
        } else {
            $protected  = self::DEFAULT_PROTECTED;
        }

        // Options
        if (isset($options['opts'])) {
            $opts       = $options['opts'];
        } else {
            $opts       = false;
        }

        // Initial validation
        if ( ! empty($opts)) {

            // Options iterating
            foreach ($opts as $key => $value) {

                // Get attribute name
                if ($prefixed) {
                    $attribute = '_' . $key;
                } else {
                    $attribute = $key;
                }

                // Class reflection
                $refl = new Reflection($this);

                // Validate property/attribute
                if ($refl->hasProperty($attribute)) {
                    $method = 'set' . ucfirst($key);

                    // Find method first
                    if ($refl->hasMethod($method)) {
                        $this->$method($value);

                    // Set attribute if allowed
                    } elseif ($refl->getProperty($attribute)->isPublic()
                        || ($refl->getProperty($attribute)->isProtected()
                            && $protected)) {
                        $this->$attribute = $value;
                    }
                }
            }
        }
    }
}