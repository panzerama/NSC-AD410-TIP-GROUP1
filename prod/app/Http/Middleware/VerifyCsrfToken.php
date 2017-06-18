<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "/tip/edit/modify",
        "/tip/edit/add",
        "/tip/edit/inactivate",
        "/division/edit/modify",
        "/division/edit/add",
        "/division/edit/inactivate"
    ];
}
