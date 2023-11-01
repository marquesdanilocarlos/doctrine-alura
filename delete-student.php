<?php

use App\Entities\Student;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();

$student = $em->find(Student::class, 7);
$em->remove($student);

$em->flush();

