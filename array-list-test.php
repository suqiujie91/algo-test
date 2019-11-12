<?php

require __DIR__. DIRECTORY_SEPARATOR. 'Stru'. DIRECTORY_SEPARATOR .'autoload.php';

use stru\arr\ArrayList;

$arr = new ArrayList(10);
$arr->init();
$arr->insert(9,11);
$arr->delete(8);
$arr->delete(9);
$arr->delete(6);
var_dump($arr->data);
//$data = $arr->init();
