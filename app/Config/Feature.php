<?php namespace Config;

/**
 * 
 * @link https://codeigniter4.github.io/userguide/installation/upgrade_415.html#upgrade-415-multiple-filters-for-a-route
 */
class Feature extends \CodeIgniter\Config\BaseConfig {

    public bool $multipleFilters = true;

    public bool $autoRoutesImproved = false;
}