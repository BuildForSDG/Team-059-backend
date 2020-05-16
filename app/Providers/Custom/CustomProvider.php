<?php

namespace App\Providers\Custom;

use Illuminate\Support\ServiceProvider;

class CustomProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Binding User Interface to User Service 
        $this->app->bind('App\Contracts\UserServiceInterface', 'App\Services\UserService');
        // Binding School Interface to School Service 
        $this->app->bind('App\Contracts\SchoolServiceInterface', 'App\Services\SchoolService');
        // Binding Teacher Interface to Teacher Service 
        $this->app->bind('App\Contracts\TeacherServiceInterface', 'App\Services\TeacherService');
        // Binding Qualification Interface to Qualification Service 
        $this->app->bind('App\Contracts\QualificationServiceInterface', 'App\Services\QualificationService');
        // Binding Certification Interface to Certification Service 
        $this->app->bind('App\Contracts\CertificationServiceInterface', 'App\Services\CertificationService');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
