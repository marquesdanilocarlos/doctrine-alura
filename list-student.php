<?php

use App\Entities\Course;
use App\Entities\Phone;
use App\Entities\Student;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();
$studentEntity = Student::class;
$students = $em->createQuery("SELECT student FROM {$studentEntity} student")->getResult();


/**
 * @var Student[] $students
 */
//$students = $studentRepository->findAll();


foreach ($students as $student) {
    echo "<br/>";
    echo "ID: {$student->id}";
    echo "<br/>";
    echo "Name: {$student->getName()}";
    echo "<br/>";
    echo "Telefones: <br/>";
    /**
     * @var Phone $phone
     */
    foreach ($student->getPhones() as $phone) {
        echo $phone->getNumber() . '<br/>';
    }

    echo "Cursos:";
    echo implode(', ', $student->getCourses()->map(fn (Course $course) => $course->getName())->toArray());
    echo '<hr>';
}

$dql = "SELECT COUNT(student) FROM {$studentEntity} student WHERE SIZE(student.phones) > 3";
var_dump($em->createQuery($dql)->getSingleScalarResult());