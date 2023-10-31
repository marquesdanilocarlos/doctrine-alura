<?php

use App\Entities\Student;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();

$student = new Student($argv[1]);
$em->persist($student);
$em->flush();