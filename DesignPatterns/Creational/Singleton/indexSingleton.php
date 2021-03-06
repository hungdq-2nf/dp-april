<?php
echo '---- Creational > Singleton <br><br>';

/* Creational > Singleton
 *
 * đơn nhất class
 */

final class Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}







