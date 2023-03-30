<?php namespace Config;

class Cookie extends \CodeIgniter\Config\BaseConfig {
    
    public string $prefix = '';

    public $expires = 0;

    public string $path = '/';

    public string $domain = '';

    public bool $secure = false;

    public bool $httponly = true;

    public string $samesite = 'Lax';

    public bool $raw = false;
}
