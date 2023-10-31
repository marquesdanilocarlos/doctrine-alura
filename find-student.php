<?php

use App\Entities\Student;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();

$studentRepository = $em->getRepository(Student::class);

/**
 * @var Student[] $students
 */
$student = $studentRepository->find(2);

var_dump($student);

echo "<hr/>";

$pedro = $studentRepository->findOneBy(['name' => 'Pedro']);

var_dump($pedro);

echo "<hr/>";

$count = $studentRepository->count([]);

var_dump($count);
