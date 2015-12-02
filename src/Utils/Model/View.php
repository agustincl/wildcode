<?php
namespace Utils\Model;

class View
{
    static public function Render($route,$dispatch)
    {
        return self::Layout($route,
            $dispatch['layout'],
            array('content'=>$dispatch['content']));
    }
    
    static public function RenderLayout($route, $dispatch)
    {
        $content = $dispatch['content'];
    
        ob_start();
        include('/modules/'.$route['module'].'/views/layout/'.
            $dispatch['layout'].'.phtml');
        $view = ob_get_contents();
        ob_end_clean();
    
        return $view;
    }
    
    static public function RenderView($route, $viewParams)
    {
        ob_start();
        include('/modules/'.$route['module'].'/views/'.
            $route['controller'].'/'.
            $route['action'].'.phtml');
        $view = ob_get_contents();
        ob_end_clean();
    
        return $view;
    }
}
