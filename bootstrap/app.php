<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(prepend: [
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function(Throwable $e, Request $request){
            $userNotAuthorized = $e instanceof \jeremykenedy\LaravelRoles\App\Exceptions\RoleDeniedException || 
                                 $e instanceof \jeremykenedy\LaravelRoles\App\Exceptions\PermissionDeniedException || 
                                 $e instanceof \jeremykenedy\LaravelRoles\App\Exceptions\LevelDeniedException;
            if($userNotAuthorized){
                if($request->expectsJson()) return Response::json(array('error' => 403,'message' => 'Unauthorized.'), 403);
                abort(403);
            } 
        });
    })->create();
