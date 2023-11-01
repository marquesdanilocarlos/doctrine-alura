<?php

use App\Entities\Course;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();

$course = new Course('Symfony');

$em->persist($course);
$em->flush();