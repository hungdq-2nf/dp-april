<?php
echo '---- Structural > Registry <br><br>';

/* Structural > Registry
 *
 * đăng ký:
 */

abstract class Registry
{
    const LOGGER = 'logger';

    private static $storedValues = [];

    private static $allowedKeys = [
        self::LOGGER,
    ];

    public static function set(string $key, $value)
    {
        if (!in_array($key, self::$allowedKeys)) {
            throw new \InvalidArgumentException('Invalid key given');
        }

        self::$storedValues[$key] = $value;
    }

    public static function get(string $key)
    {
        if (!in_array($key, self::$allowedKeys) || !isset(self::$storedValues[$key])) {
            throw new \InvalidArgumentException('Invalid key given');
        }

        return self::$storedValues[$key];
    }
}

echo '<br><br> Registry <br>';
Registry::set('key1','value1');
Registry::get('key1');



echo '<br><br>  <br>';







