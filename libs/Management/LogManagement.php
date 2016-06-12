<?php
namespace Libs\Management;

use Log;

/**
 * 
 * @author qin
 * @data 2016.4.6
 */
class LogManagement
{
    public static function error($getMessage, $getFile, $getLine)
    {
        Log::error('Caught exception: '.  $getMessage. "\n" . $getFile. "\n" . $getLine . "\n");
        return response()->json(['code'=>500, 'msg'=>'未知错误，请稍候重试']);
    }
}