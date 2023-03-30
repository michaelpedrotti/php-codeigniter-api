<?php namespace Config;

class Autoload extends \CodeIgniter\Config\AutoloadConfig {

    public $psr4 = [
        APP_NAMESPACE => APPPATH, // For custom app namespace
        'Config'      => APPPATH . 'Config',
    ];

    public $classmap = [];

    public $files = [];

    public $helpers = [];
}