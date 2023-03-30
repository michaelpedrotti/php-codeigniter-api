<?php namespace Config;

use Psr\Log\LogLevel;

class Exceptions extends \CodeIgniter\Config\BaseConfig {

    public bool $log = true;

    public array $ignoreCodes = [404];

    public string $errorViewPath = APPPATH . 'Views/errors';

    public array $sensitiveDataInTrace = [];

    public bool $logDeprecations = true;

    public string $deprecationLogLevel = LogLevel::WARNING;
}
