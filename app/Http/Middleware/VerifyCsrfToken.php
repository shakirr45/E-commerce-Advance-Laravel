<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    // etaw ana hoa ce  ================>
    protected $addHttpCookie = true;

    protected $except = [
        //
        'success',
        'fail'
    ];
}
