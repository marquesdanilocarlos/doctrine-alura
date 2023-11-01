<?php

namespace App\Entities;

use App\Repositories\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[OneToMany(mappedBy: 'student', targetEntity: Phone::class, cascade: ['persist', 'remove'], fetch: 'EAGER')]
    private Collection $phones;

    #[ManyToMany(targetEntity: Course::class, inversedBy: 'students')]
    private Collection $courses;

    public function __construct(

        #[Column]
        private string $name
    ) {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhones(): Collection
    {
        return $this->phones;
    }

    public function addPhone(Phone $phone): void
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function enrollInCourse(Course $course): void
    {
        if ($this->courses->contains($course)) {
            return;
        }

        $this->courses->add($course);
        $course->addStudent($this);
    }
}