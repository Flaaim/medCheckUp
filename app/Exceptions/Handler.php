<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Mailer\Exception\TransportException;



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
        $this->renderable(function(Exception $e, $request){ 
            return $this->handleException($request, $e);
        });
        
    }

    public function handleException($request, $e){
        
        switch(true){          
            case $e instanceof MethodNotAllowedHttpException:
                return redirect()->route('home');
            case $e instanceof NotFoundHttpException:
                return redirect()->route('fallback');
            case $e instanceof NoTypeDetectedException:
                return redirect()->back()->with('error', 'Неверный формат файла');
            //case $e instanceof QueryException:
                //return redirect()->route('home')->with('error', 'Непредвиденная ошибка');
            case $e instanceof TransportException:
                return redirect()->back()->with('error', 'Произошла ошибка при отправке письма, если проблема повторяется, обратитесь к администратору');
        }
        return null;
    }
}
