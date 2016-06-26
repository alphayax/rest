<?php

require_once '../vendor/autoload.php';

$srcDir     = __DIR__.'/../src';
$namespace  = 'alphayax\utils';

/// Services documentation
$gen = new \alphayax\mdGen\MdGen( $srcDir, $namespace);
$gen->generate();
