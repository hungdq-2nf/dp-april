<?php
echo '---- Structural > Registry <br><br>';

/* Structural > Registry
 *
 * đăng ký:
 */

abstract class Registry
{
    const LOGGER = 'logger';

    private static $storedValues = [
        'value0'
    ];

    private static $allowedKeys = [
        self::LOGGER,
    ];

    public static function set($key, $value)
    {
        if (!in_array($key, self::$allowedKeys)) {
//            throw new \InvalidArgumentException('Invalid key given');
            echo 'Invalid key given';
        }

        self::$storedValues[$key] = $value;
        echo self::$storedValues[$key].'<br>';
    }

    public static function get($key)
    {
        if (!in_array($key, self::$allowedKeys)
            || !isset(self::$storedValues[$key])
        ) {
//            throw new \InvalidArgumentException('Invalid key given');
            echo 'Invalid key given';
        }

        echo self::$storedValues[$key].'<br>';
        return self::$storedValues[$key];
    }
}

echo '<br><br> Registry <br>';
Registry::set(0,'value1');
Registry::get(0);



echo '<br><br>  <br>';







