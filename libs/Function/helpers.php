<?php
/**
 * 自定义视图加载地址
 */
if (! function_exists('_view')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string  $view
     * @param  array   $data
     * @param  array   $mergeData
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function _view($view = null, $data = [], $mergeData = [])
    {
        list($moduleName,$viewBlock,$viewName) = explode('.', $view);
        if(php_sapi_name()=='fpm-fcgi'){
            return view()->file(base_path('modules/'.$moduleName.'/views/'.$viewBlock.'/'.$viewName.'.blade.php'),$data,$mergeData);
        }
        return view()->file(base_path('modules\\'.$moduleName.'\\views\\'.$viewBlock.'\\'.$viewName.'.blade.php'),$data,$mergeData);
    }
}

/**
 * 
 */
if(! function_exists('_JqGrid')) {
    function _JqGrid($model, $params,$primaryKey,$search)
    {
        $jqGrid = new \Modules\Libs\Utils\JqGrid\JqGrid($model, $params,$primaryKey,$search);
        return $jqGrid->show();
    }
}

