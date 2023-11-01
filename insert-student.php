<?php

use App\Entities\Phone;
use App\Entities\Student;
use App\Helper\EntityManagerCreator;

require __DIR__. '/vendor/autoload.php';

$em = EntityManagerCreator::create();

$student = new Student('Xupinski');

$student->addPhone(new Phone('61 9 9999-9999'));
$student->addPhone(new Phone('61 9 8888-8888'));

$em->persist($student);
$em->flush();