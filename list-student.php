<?php

use App\Entities\Phone;
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
    echo "Name: {$student->getName()}";
    echo "<br/>";
    echo "Telefones: <br/>";
    /**
     * @var Phone $phone
     */
    foreach ($student->getPhones() as $phone) {
        echo $phone->getNumber() . '<br/><br/>';
    }
}