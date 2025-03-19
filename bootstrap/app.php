<?php

use App\Exceptions\InvalidOrderException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Psr\Log\LogLevel;
use PDOException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        //apiPrefix: 'api/admin',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append([
            \App\Http\Middleware\AfterMiddleware::class,
            \App\Http\Middleware\BeforeMiddleware::class,
            \App\Http\Middleware\AfterMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
       //Пример использования метода level() для установки уровня журнала для исключения:
        //$exceptions->level(PDOException::class, LogLevel::CRITICAL);
        //Пример использования метода ignore() для игнорирования исключения:
        //$exceptions->stopIgnoring(HttpException::class);
        //Пример использования метода render() для регистрации пользовательского обработчика исключений:
        /*$exceptions->render(function (InvalidOrderException $e, Request $request) {
            return response()->view('errors.invalid-order', status: 500);
        });*/
        /*Вы также можете использовать render метод для переопределения поведения рендеринга для встроенных исключений Laravel или Symfony,
         таких как NotFoundHttpException. Если замыкание, заданное для renderметода, не возвращает значение, будет использован рендеринг
         исключений Laravel по умолчанию:*/
        /*$exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Record not found.'
                ], 404);
            }
        });*/

    })->create();
