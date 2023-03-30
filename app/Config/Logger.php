<?php namespace Config;

class Logger extends \CodeIgniter\Config\BaseConfig {
    
    public $threshold = (ENVIRONMENT === 'production') ? 4 : 9;

    public string $dateFormat = 'Y-m-d H:i:s';

    public array $handlers = [

        'CodeIgniter\Log\Handlers\ErrorlogHandler' => [
            'handles' => ['critical', 'alert', 'emergency', 'debug', 'error', 'info', 'notice', 'warning'],
            'messageType' => 0,
        ]
    ];
}
