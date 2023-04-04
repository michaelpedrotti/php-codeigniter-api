<?php

if(!function_exists('password_generator')){
    
    /**
     * 
     * @param string $password
     * @return array
     */
    function password_generator($password = ''): array {

       if(empty($password)) {

            $password = str_shuffle(date('Ymd'));
        }

        $encrypt = password_hash($password, PASSWORD_BCRYPT);
        
        return [ $password, $encrypt ];
   }
}