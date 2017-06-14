<?php
/**
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Chronos;

/**
 * Basic english only 'translator' for diffForHumans()
 */
class Translator
{
    /**
     * Translation strings.
     *
     * @var array
     */
    public static $strings = [
        'year' => '1 year',
        'year_plural' => '{count} ' . __d('Chronos', 'years'),
        'month' => __d('Chronos', '1 month'),
        'month_plural' => '{count} ' . __d('Chronos', 'months'),
        'week' => __d('Chronos', '1 week'),
        'week_plural' => '{count} ' . __d('Chronos', 'weeks'),
        'day' => __d('Chronos', '1 day'),
        'day_plural' => '{count} ' . __d('Chronos', 'days'),
        'hour' => __d('Chronos', '1 hour'),
        'hour_plural' => '{count} ' . __d('Chronos', 'hours'),
        'minute' => __d('Chronos', '1 minute'),
        'minute_plural' => '{count} ' . __d('Chronos', 'minutes'),
        'second' => __d('Chronos', '1 second'),
        'second_plural' => '{count} ' . __d('Chronos', 'seconds'),
        'ago' => '{time} ' . __d('Chronos', 'ago'),
        'from_now' => '{time} ' . __d('Chronos', 'from now'),
        'after' => '{time} ' . __d('Chronos', 'after'),
        'before' => '{time} ' . __d('Chronos', 'before'),
    ];

    /**
     * Check if a translation key exists.
     *
     * @param string $key The key to check.
     * @return bool Whether or not the key exists.
     */
    public function exists($key)
    {
        return isset(static::$strings[$key]);
    }

    /**
     * Get a plural message.
     *
     * @param string $key The key to use.
     * @param int $count The number of items in the translation.
     * @param array $vars Additional context variables.
     * @return string The translated message or ''.
     */
    public function plural($key, $count, array $vars = [])
    {
        if ($count === 1) {
            return $this->singular($key, $vars);
        }

        return $this->singular($key . '_plural', ['count' => $count] + $vars);
    }

    /**
     * Get a singular message.
     *
     * @param string $key The key to use.
     * @param array $vars Additional context variables.
     * @return string The translated message or ''.
     */
    public function singular($key, array $vars = [])
    {
        if (isset(static::$strings[$key])) {
            $varKeys = array_keys($vars);
            foreach ($varKeys as $i => $k) {
                $varKeys[$i] = '{' . $k . '}';
            }

            return str_replace($varKeys, $vars, static::$strings[$key]);
        }

        return '';
    }
}
