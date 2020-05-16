<?php

namespace App\Services;

use App\Contracts\QualificationServiceInterface;
use App\Models\Qualification;

/**
 * Inherits basic CRUD functionalities from BaseService
 */
class QualificationService extends BaseService implements QualificationServiceInterface
{
    /**
     * Constructing the Qualification service with Qualification model
     * 
     * @param App\Models\Qualification
     */
    public function __construct(Qualification $qualification)
    {
        $this->model = $qualification;
    }
}