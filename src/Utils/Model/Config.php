<?php
namespace Utils\Model;

class Config
{
    static public $instance; 
    
    private function __construct()
    {
        // echo "constr";
    }
    

    static public function getConfig()
    {
        $globalName = APPLICATION_PATH.'/config/config.global.php';
        $localName =  APPLICATION_PATH.'/config/config.local.php';
        
        $globalConfig=[];
        if(file_exists($globalName))
        {
            $globalConfig = require_once $globalName;   
        }

        $localConfig=[];
        if(file_exists($localName))
        {
            $localConfig = include_once $localName;
        }
        $config = array_replace_recursive($globalConfig, $localConfig);
        return $config;        
    }
    
}