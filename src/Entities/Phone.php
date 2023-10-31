<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{
    #[Id, GeneratedValue, Column]
    private int $id;

    #[ManyToOne(targetEntity: Student::class, inversedBy: "phones")]
    private readonly Student $student;

    public function __construct(
        #[Column]
        private readonly string $number
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setStudent(Student $student)
    {
        $this->student = $student;
    }

}