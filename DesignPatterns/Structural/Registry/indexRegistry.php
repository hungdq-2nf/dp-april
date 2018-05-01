<?php
echo '---- Structural > Registry <br>';

/* Structural > Registry
 *
 * đăng ký:
 */

abstract class Registry
{
    const LOGGER = 'val empty';

    private static $storedValues = [];

    private static $allowedKeys = [
        self::LOGGER,
    ];

    public static function init()
    {
        return self::LOGGER;
    }

    public static function set($key, $value)
    {
        if (!in_array($key, self::$allowedKeys)) {
            echo 'Invalid key given';die;
        }

        echo 'ok <br>';
        self::$storedValues[$key] = $value;
    }

    public static function get($key)
    {
        if (!in_array($key, self::$allowedKeys)
            || !isset(self::$storedValues[$key])
        ) {
            echo 'Invalid key given';die;
        }

        return self::$storedValues[$key];
    }
}

echo '<br> Registry <br>';

echo '<br>init(): <br>';
echo '<pre>';
print_r(Registry::init());
echo '</pre>';

$key = 0;
$value = 'val 1';

echo '<br>set($key, $value): <br>';
Registry::set($key, $value);

echo '<br>get($key): <br>';
echo '<pre>';
print_r(Registry::get($key));
echo '</pre>';









