<?php

use App\Entities\Student;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();

$studentRepository = $em->getRepository(Student::class);

/**
 * @var Student[] $students
 */
$students = $studentRepository->findAll();


foreach ($students as $student) {
    echo "ID: {$student->id}";
    echo "<br/>";
    echo "Name: {$student->name}";
    echo "<br/>";
}