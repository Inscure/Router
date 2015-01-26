<?php

namespace Router;

class Router 
{
    private static $instance;
    
    private function __construct() 
    {}
    
    private function __clone()
    {}
    
    public static function getInstance()
    {
        if (! self::$instance) {
            self::$instance = new self;
        }
        
        return self::$instance;
    }
    
    protected function getUri()
    {
        return filter_input(INPUT_SERVER, 'REQUEST_URI');
    }
    
    protected function getPathInfo()
    {
        return filter_input(INPUT_SERVER, 'PATH_INFO');
    }
    
    protected function getRequestMethod()
    {
        return filter_input(INPUT_SERVER, 'REQUEST_METHOD');
    }
    
    public function getRoute()
    {
        foreach(include __DIR__ . '/../app/routes.php' as $route) {
            if (preg_match('/' . $route['regex'] . '/', $this->getPathInfo())) {
                if ($route['method'] == 'any' || strtolower($route['method']) == strtolower($this->getRequestMethod())) {
                    return $route;
                }
            }
        }
        
        throw new \Exception('Wrong uri.');
    }
}


