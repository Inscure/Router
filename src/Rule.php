<?php

namespace Router;

class Rule
{
    protected $rule;
    
    protected $method;
    
    const METHOD_DEFAULT = 'any';
            
    public function __construct($rule) 
    {
        $this->rule = $rule;
        
        $this->method = self::METHOD_DEFAULT;
    }
    
    public function setMethod($method)
    {
        $this->method = $method;
    }
}