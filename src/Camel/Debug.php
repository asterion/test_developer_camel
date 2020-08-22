<?php
namespace App\Camel;

/**
 *
 */
trait Debug
{
    public static function dump($data) {
        ob_start();

        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        ob_end_flush();
    }
}
