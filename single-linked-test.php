<?php

require __DIR__. DIRECTORY_SEPARATOR. 'Stru'. DIRECTORY_SEPARATOR .'autoload.php';

use Stru\Arr\ArrayList;
use Stru\SingleLinked\SingleLinked;
use Stru\SingleLinked\SingleLinkedNode;

$node = new SingleLinkedNode();
$linked = new SingleLinked();
$linked->insert(1);
$linked->insert(2);
$linked->insert(3);
$linked->insert(4);
$linked->delete(4);
$linked->insert(5);

var_dump($linked->getNodeByIndex(4));
echo PHP_EOL . $linked->getLength();
