<?php

namespace App\Exceptions;

use Throwable;
use App\Utils\Helpers;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof UnauthorizedException) {
            $code = $exception->getCode();
            return (new Helpers())->errorResponder(null, (is_numeric($code) && $code > 0 ? $code : 500), $exception->getMessage());
        }

        return parent::render($request, $exception);
    }
}
