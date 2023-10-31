<?php

use App\Entities\Student;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();
/**
 * @var Student[] $students
 */
$student = $em->find(Student::class, 4);
$student->setName('Nervoso');

$em->flush($student);
