<?php namespace Config;

use CodeIgniter\Cache\Handlers\DummyHandler;
use CodeIgniter\Cache\Handlers\PredisHandler;
use CodeIgniter\Cache\Handlers\RedisHandler;

class Cache extends \CodeIgniter\Config\BaseConfig {
    
    public string $handler = 'dummy';

    public string $backupHandler = 'dummy';

    public string $storePath = WRITEPATH . 'cache/';

    public $cacheQueryString = false;

    public string $prefix = '';

    public int $ttl = 60;

    public string $reservedCharacters = '{}()/\@:';
    
    public array $redis = [
        'host'     => '127.0.0.1',
        'password' => null,
        'port'     => 6379,
        'timeout'  => 0,
        'database' => 0,
    ];

    public array $validHandlers = [
        'dummy'     => DummyHandler::class,
        'predis'    => PredisHandler::class,
        'redis'     => RedisHandler::class,
    ];
}