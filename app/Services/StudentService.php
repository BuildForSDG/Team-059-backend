<?php

namespace App\Services;

use App\Contracts\StudentServiceInterface;
use App\Models\Student;

/**
 * Inherits basic CRUD functionalities from BaseService
 */
class StudentService extends BaseService implements StudentServiceInterface
{
    /**
     * Constructing the Student service with Student model
     * 
     * @param App\Models\Student
     */
    public function __construct(Student $student)
    {
        $this->model = $student;
    }
}