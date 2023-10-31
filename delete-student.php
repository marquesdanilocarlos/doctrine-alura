<?php

use App\Entities\Student;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();

$student = $em->getPartialReference(Student::class, 5);
$em->remove($student);

$em->flush();

