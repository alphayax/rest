<?php

require_once '../vendor/autoload.php';

$rest = new \alphayax\rest\Rest( 'https://api.github.com/users/alphayax/repos');
$rest->addHeader( 'User-Agent', 'alphayax-rest');
$rest->GET();

print_r( $rest);
