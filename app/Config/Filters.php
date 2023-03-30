<?php namespace Config;

use App\Filters\{AuthenticationFilter, AuthorizationFilter};

class Filters extends \CodeIgniter\Config\BaseConfig {

    public array $aliases = [
        'is_authenticated' => AuthenticationFilter::class,
        'is_authorized' => AuthorizationFilter::class,
    ];

    public array $globals = [
        'before' => [],
        'after' => [
//            'toolbar',
        ],
    ];

    public array $methods = [
//        'post' => ['foo', 'bar']
    ];

    public array $filters = [
//        'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
    ];
}
