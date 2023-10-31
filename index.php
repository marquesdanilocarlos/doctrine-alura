<?php

use App\Helper\EntityManagerCreator;

require __DIR__ . '/vendor/autoload.php';

$em = EntityManagerCreator::create();

var_dump($em);