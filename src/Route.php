<?php

namespace Router;

class Route 
{
//    public function __construct() 
//    {
//        $this->rules = 
//    }
    
    protected $rules = array();
    
    public static function entry($rule)
    {
        $this->rules[] = new Rule($rule);
        
        return $this;
    }
    
    public static function get()
    {
        
    }
    
    public static function set()
    {
        
    }
    
    
}
