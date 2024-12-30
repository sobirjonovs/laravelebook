<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Exceptions\PaymentFailedException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/web.php',
            __DIR__ . '/../routes/users.php',
        ],
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(fn() => route('loginv2.form'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->report(function (PaymentFailedException $exception) {
            // sms yuborish, telegram bildirishoma yuborish kabi ishlarni
            // bajarishingiz mumkin
        })->stop();

        $exceptions->render(function (PaymentFailedException $exception, \Illuminate\Http\Request $request) {
            if ($request->expectsJson())  {
                return response()->json([
                    'xabar' => $exception->getMessage(),
                    'istisno' => get_class($exception)
                ]);
            }
        });
    })
    ->create();
