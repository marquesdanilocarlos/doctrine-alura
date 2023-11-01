<?php

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    public function getStudentsAndCourses()
    {
        return $this->createQueryBuilder('student')
            ->addSelect('phone')
            ->addSelect('course')
            ->leftJoin('student.phones', 'phone')
            ->leftJoin('student.courses', 'course')
            ->getQuery()
            ->getResult();

        /*$students = $this->_em->createQuery(
            "SELECT student, phone, course 
            FROM {$this->getEntityName()} student 
            LEFT JOIN student.phones phone 
            LEFT JOIN student.courses course"
        )->getResult();

        return $students;*/
    }
}