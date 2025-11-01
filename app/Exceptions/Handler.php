<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        // Handle database connection errors with a professional error page
        if ($e instanceof QueryException) {
            $errorCode = $e->getCode();
            $errorMessage = $e->getMessage();

            // Check for common database connection error codes
            // 1045 = Access denied (MySQL/MariaDB)
            // HY000 = General SQL error, often related to connection issues
            $errorCodeString = (string) $errorCode;
            $lowerMessage = strtolower($errorMessage);
            if (str_contains($lowerMessage, 'access denied') ||
                str_contains($lowerMessage, 'connection') ||
                str_contains($lowerMessage, 'could not find driver') ||
                str_contains($errorMessage, 'SQLSTATE[HY000]') ||
                str_contains($errorMessage, 'SQLSTATE[HY000') ||
                $errorCode === 1045 ||
                str_contains($errorCodeString, 'HY000')) {

                // Don't show technical details to users
                return response()->view('errors.database', [], 503);
            }
        }

        return parent::render($request, $e);
    }
}
