<?php

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    public function getStudentsAndCourses()
    {
        $students = $this->_em->createQuery(
            "SELECT student, phone, course 
            FROM {$this->getEntityName()} student 
            LEFT JOIN student.phones phone 
            LEFT JOIN student.courses course"
        )->getResult();

        return $students;
    }
}