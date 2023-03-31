<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface as Request;
use CodeIgniter\HTTP\ResponseInterface as Response;
use App\Services\AuthenticationService as Service;

/**
 * 
 * @link https://medium.com/geekculture/codeigniter-4-tutorial-restful-api-jwt-authentication-d5963d797ec4
 */
class AuthenticationFilter implements FilterInterface {
    
    public function before(Request $req, $args = null) {
        
        try {
            
            $token = $req->getHeaderLine("Authorization");
            
            if(empty($token)){
                
                throw new \Exception('No Authorization header was sent');
            }
            
            $token = preg_replace('/[Bb]earer\s+/', '', $token);

            $payload = Service::newInstance()->verify($token);
            
            $req->user = $payload->id;
        } 
        catch (\Exception $e) {
            
            return \Config\Services::response()
                ->setStatusCode(401)
                ->setJSON([
                    'error' => true, 
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);   
        } 
    }
    
    public function after(Request $req, Response $res, $args = null):void { }
}
