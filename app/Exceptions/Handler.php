<?php

namespace CodeDelivery\Exceptions;

use Exception;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
=======
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
<<<<<<< HEAD
        HttpException::class,
        ModelNotFoundException::class,
=======
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
<<<<<<< HEAD
        return parent::report($e);
=======
        parent::report($e);
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
<<<<<<< HEAD
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }

=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
        return parent::render($request, $e);
    }
}
