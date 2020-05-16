<?php

namespace App\Services;

use App\Contracts\TeacherServiceInterface;
use App\Models\Teacher;

/**
 * Inherits basic CRUD functionalities from BaseService
 */
class TeacherService extends BaseService implements TeacherServiceInterface
{
    /**
     * Constructing the Teacher service with Teacher model
     * 
     * @param App\Models\Teacher
     */
    public function __construct(Teacher $teacher)
    {
        $this->model = $teacher;
    }
}