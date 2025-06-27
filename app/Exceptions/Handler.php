<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

        // Handle 404 errors
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Resource not found.'
                ], 404);
            }
            return response()->view('errors.404', [], 404);
        });

        // Handle 403 errors
        $this->renderable(function (AuthorizationException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Forbidden.'
                ], 403);
            }
            return response()->view('errors.403', [], 403);
        });

        // Handle 419 errors (CSRF token mismatch)
        $this->renderable(function (TokenMismatchException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'CSRF token mismatch.'
                ], 419);
            }
            return response()->view('errors.419', [], 419);
        });

        // Handle 500 errors
        $this->renderable(function (Throwable $e, $request) {
            if ($e instanceof NotFoundHttpException ||
                $e instanceof AuthorizationException ||
                $e instanceof TokenMismatchException ||
                $e instanceof ValidationException ||
                $e instanceof ModelNotFoundException ||
                $e instanceof MethodNotAllowedHttpException) {
                return null; // Let other handlers handle these exceptions
            }

            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Server Error.'
                ], 500);
            }
            
            if (config('app.debug')) {
                return null; // Let Laravel handle the exception in debug mode
            }
            
            return response()->view('errors.500', [], 500);
        });
    }
}