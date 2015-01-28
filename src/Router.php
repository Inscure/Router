<?php

namespace Router;

class Router 
{
    private static $instance;
    
    private $path;
    
    private function __construct() 
    {}
    
    private function __clone()
    {}
    
    /**
     * @return self
     */
    public static function getInstance()
    {
        if (! self::$instance) {
            self::$instance = new self;
        }
        
        return self::$instance;
    }
    
    public function setRoutesPath($path)
    {
        $this->path = $path;
    }
    
    public function getRoute()
    {
        $matches = array();
        foreach(include $this->path as $route) {
            if (preg_match($route['regex'], substr($this->getPathInfo(), 1), $matches)) {
                if ($route['method'] == 'any' || strtolower($route['method']) == strtolower($this->getRequestMethod())) {
                    return $route + array('matches' => $matches);
                }
            }
        }
        
        throw new \Exception('Wrong uri.');
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
    
    
}


