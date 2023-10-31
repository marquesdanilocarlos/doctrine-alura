<?php

use App\Entities\Phone;
use App\Entities\Student;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();

$student = new Student('Sheldon');

$phone1 = new Phone('61 9 9999-9999');
$phone2 = new Phone('61 9 8888-8888');

$em->persist($phone1);
$em->persist($phone2);

$student->addPhone($phone1);
$student->addPhone($phone2);

$em->persist($student);
$em->flush();