<?php namespace Config;

use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends \CodeIgniter\Config\BaseConfig {
    
    public array $ruleSets = [
        Rules::class,
        FormatRules::class
    ];

    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];
}
