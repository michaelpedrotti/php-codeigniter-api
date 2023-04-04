<?php

if(!function_exists('getattr')){
    
    /**
     * 
     * @param object|class|array $object
     * @param string $attr
     * @param mixed $default
     * 
     * @return mixed
     */
    function getattr($object, $attr, $default = null) {

        if(is_array($object)){
            
            return (array_key_exists($attr, $object) && (is_numeric($object[$attr]) || !empty($object[$attr]))) ? $object[$attr] : $default;
        }
        else {
            
            return (property_exists($object, $attr)  && (is_numeric($object->$attr) || !empty($object->$attr))) ? $object->$attr : $default;
        }
    }
}