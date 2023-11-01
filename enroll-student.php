<?php

use App\Entities\Course;
use App\Entities\Student;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();

$student = $em->find(Student::class, 1);
$course = $em->find(Course::class, 1);

$student->enrollInCourse($course);

$em->flush();