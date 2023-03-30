<?php namespace Config;

use CodeIgniter\Format\JSONFormatter;


class Format extends \CodeIgniter\Config\BaseConfig {

    public array $supportedResponseFormats = [
        'application/json',
    ];

    public array $formatters = [
        'application/json' => JSONFormatter::class,
    ];

    public array $formatterOptions = [
        'application/json' => JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
    ];

    public function getFormatter(string $mime) {
        
        return Services::format()->getFormatter($mime);
    }
}
