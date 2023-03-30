<?php namespace Config;

class Migrations extends \CodeIgniter\Config\BaseConfig {
    
    public bool $enabled = true;

    public string $table = 'migrations';

    public string $timestampFormat = 'Y-m-d-His_';
}
