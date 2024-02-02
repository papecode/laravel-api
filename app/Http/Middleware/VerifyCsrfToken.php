<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        'http://localhost:8000/hello/Abdou?nom=Diop',
        'http://localhost:8000/add',
        'http://localhost:8000/update/1',
        'http://localhost:8000/delete/2'
    ];
}
