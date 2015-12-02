<?php
namespace Utils\Model;

class Options
{
    public function __construct($module, $options)
    {

        
        $globalName = APPLICATION_PATH.'/config/autoload/'.strtolower($module).'.global.php';
        $localName = APPLICATION_PATH.'/config/autoload/'.strtolower($module).'.local.php';
        
        $globalConfig=[];
        if(file_exists($globalName))
        {
            $globalConfig = require_once $globalName;
        }
        $localConfig=[];
        if(file_exists($localName))
        {
            $localConfig = require_once $localName;
        }
        
        $optionarray = array_replace_recursive($globalConfig, $localConfig);
        
       
        // Overwrite config array and config object values
        foreach ($optionarray as $key => $value)
        {
            $options->$key = $optionarray[$key];
        }
        return $options;
    }
    
}