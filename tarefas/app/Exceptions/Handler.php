<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * 
     *
     * @var array<class-string<\Throwable
     */
    protected $levels = [
        
    ];

    /**
     * 
     *
     * @var array<int 
     */
    protected $dontReport = [
        
    ];

    /**
     * 
     *
     * @var array<int
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * 
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            
        });
    }
}
