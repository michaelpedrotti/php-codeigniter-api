<?php namespace Config;

class Encryption extends \CodeIgniter\Config\BaseConfig {

    public string $key = '';

    public string $driver = 'OpenSSL';

    public int $blockSize = 16;

    public string $digest = 'SHA512';

    public bool $rawData = true;

    public string $encryptKeyInfo = '';

    public string $authKeyInfo = '';

    public string $cipher = 'AES-256-CTR';
}
