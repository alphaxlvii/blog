<?php
namespace Libs\Management;
use Route;
/**
 * 
 * @author qin
 * @data 2016.3.17
 */
class RouteManagement
{
    /**
     * 
     * @param string $uri
     * @param string $action
     * @param string $prefix
     */
   public static function get($uri, $action, array $options = [])
   {
        list($u,$r) = explode('.', $uri);
        list($a,$c) = explode('.', $action);
        Route::get('/'.$u.'/'.$r, ['uses'=>'\\Modules\\'.$a.'\\Controller\\'.$c ,'as'=>$uri, 'prefix'=>isset($options['prefix'])?$options['prefix']:null, 'relate'=>isset($options['relate'])?$options['relate']:null ] );
    }
    
    /**
     * 
     * @param string $uri
     * @param string $action
     * @param string $prefix
     */
    public static function post($uri, $action, array $options = [])
    {
        list($u,$r) = explode('.', $uri);
        list($a,$c) = explode('.', $action);
        Route::post('/'.$u.'/'.$r, ['uses'=>'\\Modules\\'.$a.'\\Controller\\'.$c ,'as'=>$uri, 'prefix'=>isset($options['prefix'])?$options['prefix']:null, 'relate'=>isset($options['relate'])?$options['relate']:null ] );
    }
    
    /**
     * 
     * @param string $name
     * @param string $controller
     * @param array $options
     * 
     * 
     */
    public static function resource($name, $controller, $relate='null', array $options = [])
    {
        list($c,$o) = explode('.', $controller);
        Route::resource($name, '\\Modules\\'.$c.'\\Controller\\'.$o, $options);
    }
    
}