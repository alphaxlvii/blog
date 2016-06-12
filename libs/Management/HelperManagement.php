<?php
namespace Libs\Management;

/**
 * 帮助类
 * @author qin
 * @data 2016.5.6
 */
class HelperManagement
{
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string  $view
     * @param  array   $data
     * @param  array   $mergeData
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public static function _view($view = null, $data = [], $mergeData = [])
    {
        list($moduleName,$viewBlock,$viewName) = explode('.', $view);
        if(php_sapi_name()=='fpm-fcgi'){// linux下
            return view()->file(base_path('modules/'.$moduleName.'/view/'.$viewBlock.'/'.$viewName.'.blade.php'),$data,$mergeData);
        }
        return view()->file(base_path('modules\\'.$moduleName.'\\view\\'.$viewBlock.'\\'.$viewName.'.blade.php'),$data,$mergeData);
    }
}