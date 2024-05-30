<?php



// return Application::configure(basePath: dirname(__DIR__))
//     ->withRouting(
//         web: __DIR__ . '/../routes/web.php',
//         api: __DIR__ . '/../routes/api.php',
//         commands: __DIR__ . '/../routes/console.php',
//         health: '/up',
//     )
//     ->withMiddleware(function (Middleware $middleware) {

//         // $middleware->append([
//         //     IP_Middlewar::class
//         // ]);

//         $middleware->alias([
//             "MyAuth" => AuthMiddleware::class
//         ]);


//         $middleware->web([

//         ]);

//         $middleware->api([
//         ]);

//         $middleware->group("admin", [
//             IP_Middlewar::class,
//             AuthMiddleware::class
//         ]);

//     })
//     ->withExceptions(function (Exceptions $exceptions) {
//         //
//     })->create();

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClearSessionCookies;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'user' => UserMiddleware::class,
            'guest' => RedirectIfAuthenticated::class,
            'clear_cookies' => ClearSessionCookies::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

