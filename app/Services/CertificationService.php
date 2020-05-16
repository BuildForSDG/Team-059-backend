<?php

namespace App\Services;

use App\Contracts\CertificationServiceInterface;
use App\Models\Certification;

/**
 * Inherits basic CRUD functionalities from BaseService
 */
class CertificationService extends BaseService implements CertificationServiceInterface
{
    /**
     * Constructing the Certification service with Certification model
     * 
     * @param App\Models\Certification
     */
    public function __construct(Certification $certification)
    {
        $this->model = $certification;
    }
}