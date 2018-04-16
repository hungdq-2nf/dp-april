<?php

/* Creational > Static Factory
 *
 *
 */

interface FormatterInterface
{
}

class FormatString implements FormatterInterface
{
}

class FormatNumber implements FormatterInterface
{
}

final class StaticFactory
{
    /**
     * @param string $type
     *
     * @return FormatterInterface
     */
    public static function factory(string $type): FormatterInterface
    {
        if ($type == 'number') {
            return new FormatNumber();
        }

        if ($type == 'string') {
            return new FormatString();
        }

        throw new \InvalidArgumentException('Unknown format given');
    }
}







