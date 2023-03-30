<?php namespace Config;

class Modules extends \CodeIgniter\Modules\Modules {

    public $enabled = true;
 
    public $discoverInComposer = true;

    public $composerPackages = [];

    public $aliases = [
        'events',
        'filters',
        'registrars',
        'routes',
        'services',
    ];
}
