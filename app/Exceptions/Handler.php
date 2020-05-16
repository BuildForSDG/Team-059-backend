<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Database\QueryException;
use \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use \Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ConnectionException){
            return error($exception->getMessage(), 500);
            
        }
        if ($exception instanceof RequestException){
            return badRequest($exception->getMessage(), 400);
        }
        if($exception instanceof ModelNotFoundException){
            return notFound('Requested resource was not found');
        }
        if($exception instanceof MassAssignmentException){
            return unAuthorized('You are trying to fill an unfillable property. I am watching you!');
        }
        if($exception instanceof UnauthorizedException){
            return unAuthorized();
        }
        // if($exception instanceof QueryException){
        //     return error('A query exception occured', 500);
        // }
        if($exception instanceof MethodNotAllowedHttpException){
            return error('Http method used is not valid for requested resource', 404);
        }
        if($exception instanceof NotFoundHttpException){
            return error('Not found', 404);
        }
        if($exception instanceof \InvalidArgumentException){
            return error($exception->getMessage(), 400);
        }
        
        return parent::render($request, $exception);
    }
}
