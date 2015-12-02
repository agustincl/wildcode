<?php
namespace Utils\Model;

class Dispatch
{
    static public function run($route)
    {
        
        $modulename = '\\'.$route['module'].'\\Module';
                          
        $module = new $modulename($route);
//         $content = $class->$actionname();
        
        return array('content'=>$module->getContent(),
                     'layout'=>$module->getLayout()
        );        
    }
    

    
}