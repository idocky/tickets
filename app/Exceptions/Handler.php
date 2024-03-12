<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    protected $dontReport = [];

    public function render($request, Throwable $exception)
    {
        return $this->prepareJsonResponse($request, $exception);
    }

    protected function prepareJsonResponse($request, Throwable $exception)
    {
        return response()->json([
            'error' => 'Something went wrong',
            'message' => $exception->getMessage()
        ], 500);
    }
}
