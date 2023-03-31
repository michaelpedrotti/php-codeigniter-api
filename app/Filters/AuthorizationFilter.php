<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface as Request;
use CodeIgniter\HTTP\ResponseInterface as Response;
use App\Services\AuthorizationService as Service;

class AuthorizationFilter implements FilterInterface {
    
    public function before(Request $request, $arguments = null) {
        
        $router = \Config\Services::router();
               
        $opts = $router->getMatchedRouteOptions();
        
        if(!Service::newInstance()->hasPermission($opts['resource'], '', $request->user)){
            
            return \Config\Services::response()
                ->setStatusCode(403)
                ->setJSON([
                    'error' => true, 
                    'message' => 'Forbidden',
                    'trace' => $e->getTraceAsString()
                ]);
        }
    }
    
    public function after(Request $request, Response $response, $arguments = null):void { }
}
