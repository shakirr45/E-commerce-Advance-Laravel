<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    // For Aamarpay =====>
    protected $addHttpCookie = true;

    // For Aamarpay =====>
    protected $except = [
        //
        'success','fail'
    ];
}
