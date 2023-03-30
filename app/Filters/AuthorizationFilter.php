<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface as Request;
use CodeIgniter\HTTP\ResponseInterface as Response;

class AuthorizationFilter implements FilterInterface {
    
    public function before(Request $request, $arguments = null):void {
        
        
    }
    
    public function after(Request $request, Response $response, $arguments = null):void { }
}
