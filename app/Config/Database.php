<?php namespace Config;

class Database extends \CodeIgniter\Database\Config {

    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    public string $defaultGroup = 'default';

    public array $default = [
//        'DSN'      => '',
        'hostname' => 'dbhost',
        'username' => 'root',
        'password' => 'root',
        'database' => 'app',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true,
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];
        
    public function __construct() {
         
        $this->default = array_merge([
            'DBDriver' => env('DB_DIALECT', 'MySQLi'),
            'hostname' => env('DB_HOST', 'dbhost'),
            'port'     => env('DB_PORT', 3306),
            'username' => env('DB_USERNAME', 'localhost'),
            'password' => env('DB_PASSWORD', 'localhost'),
            'database' => env('DB_NAME', 'app')
        ], $this->default);
        
        parent::__construct();
    }
}
