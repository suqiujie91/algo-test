<?php
/**
 * Created by PhpStorm.
 * User: suqj
 * Date: 2019/11/12
 * Time: 12:06 AM
 */

function classLoader($class)
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    $file =  '.' . DIRECTORY_SEPARATOR  . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('classLoader');