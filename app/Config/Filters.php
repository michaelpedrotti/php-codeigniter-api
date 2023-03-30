<?php namespace Config;

class Filters extends \CodeIgniter\Config\BaseConfig {

    public array $aliases = [
//        'toolbar'       => DebugToolbar::class,
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
