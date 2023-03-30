<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface as Request;
use CodeIgniter\HTTP\ResponseInterface as Response;

/**
 * 
 * @link https://medium.com/geekculture/codeigniter-4-tutorial-restful-api-jwt-authentication-d5963d797ec4
 */
class AuthenticationFilter implements FilterInterface {
    
    public function before(Request $request, $arguments = null):void {}
    
    public function after(Request $request, Response $response, $arguments = null):void { }
}
