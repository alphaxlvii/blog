<?php

namespace Libs\Management;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use function Qiniu\json_decode;

/**
 * 
 * @author qin
 * @data 2016.3.14
 */
class ControllerManagement extends Controller
{

    /**
     * Register auth middleware on the controller.
     *
     * @param
     *
     * @return void
     */

    /**
     public function __construct(){
        $this->middleware('auth');
     }*/

    /**
     * 参数删除id
     * @param unknown $params
     * @return array
     */
    protected function unsetId($params, $primaryKey='id')
    {
        unset($params[$primaryKey]);
        return $params;
    }
    
    /**
     * 新建数据参数
     * @param unknown $params
     * @return array
     */
    protected function createParams($params)
    {
        $authUserInfo = auth()->user();// 获取当前用户信息
        $params['CreateId'] = $authUserInfo->id;
        $params['CreateName'] = $authUserInfo->name;
        $params['CreateTime'] = date('Y-m-d H:i:s', time());
        return $params;
    }

    protected function createRecord($params)
    {
        $params['CreateID'] = Auth::user()->id;
        $params['CreateName'] = Auth::user()->name;
        $params['CreateTime'] = Carbon::now();
        return $params;
    }


    /**
     * 更新数据参数
     * @param unknown $params
     * @return array
     */
    protected function updateParams($params, $primaryKey='id')
    {
        unset($params[$primaryKey]);
        $authUserInfo = auth()->user();// 获取当前用户信息
        $params['ModifyId'] = $authUserInfo->id;
        $params['ModifyName'] = $authUserInfo->name;
        $params['ModifyTime'] = date('Y-m-d H:i:s', time());
        return $params;
    }

    protected function updateRecord($params,$primaryKey='id')
    {
        unset($params[$primaryKey]);
        $params['ModifyID'] = Auth::user()->id;
        $params['ModifyName'] = Auth::user()->name;
        $params['ModifyTime'] = Carbon::now();
        return $params;
    }
    
    /**
     * 权限管理
     * 新建数据参数
     * @param unknown $params
     * @return array
     */
    protected function adminCreateParams($params)
    {
        $authUserInfo = auth()->user();// 获取当前用户信息
        $params['created_id'] = $authUserInfo->id;
        $params['created_name'] = $authUserInfo->name;
        return $params;
    }
    
    /**
     * 权限管理
     * 更新数据参数
     * @param unknown $params
     * @return array
     */
    protected function adminUpdateParams($params, $primaryKey='id')
    {
        unset($params[$primaryKey]);
        $authUserInfo = auth()->user();// 获取当前用户信息
        $params['updated_id'] = $authUserInfo->id;
        $params['updated_name'] = $authUserInfo->name;
        return $params;
    }

    /**
     * 提交验证是否存在数据的验证参数
     * @param unknown $params
     * @param array $field
     * @return array
     */
    protected function hasField($params, $field)
    {
        foreach($field as $v){
            $fields[$v] = $params[$v];
        }
        return $fields;
    }  
    
    /**
     * 表格格式化参数
     * @param array $params
     * @param string $sort 默认排序字段
     *
     * @return array
     */
    protected function formatTableParams($params, $sort = 'id')
    {
        $serach_option = isset($params['serach_option']) ? ( is_array($params['serach_option'])?$params['serach_option']:null ) : null;
        unset($params['serach_option']);
        $pager_option = isset($params['pager_option']) ? ( is_array($params['pager_option'])?$params['pager_option']:null ) : null;
        unset($params['pager_option']);
        $params['where'] = [];// 搜索参数
        
        if(!is_null($serach_option)){
            foreach($serach_option as $k=>$v){
                if(!empty($v)){// 判断搜索参数是否为空
                    //$params['where'][$k] = str_replace(' ', '', $v);
                    $params['where'][$k] = str_replace(' ', '', $v);
                }
            }
        }

        if(!is_null($serach_option)){
            
        }
        $params['currentPage']  = isset($pager_option['currentPage']) ? ( empty($pager_option['currentPage'])?1:$pager_option['currentPage'] ) : 1;// 当前页码
        $params['rowsPerPage']  = $params['pageSize'] = 10;//$params['rows'];// 每页显示数(查询条数)
        $params['sidx']         = isset($params['sidx']) ? ( empty($params['sidx'])?$sort:$params['sidx'] ) : $sort;// 默认id排序
        $params['sord']         = isset($params['sord']) ? $params['sord'] : 'asc';// 默认正序
        $params['index']        = ($params['currentPage']-1) * $params['rowsPerPage'];// 开始位置
        return $params;
    }
    
    /**
     * 获取总页数
     * @param int $totalRecord
     * @param int $rows
     */
    protected function getTotalPage($totalRecord,$rows)
    {
        return $totalRecord%$rows==0 ? $totalRecord/$rows : intval($totalRecord/$rows)+1;
    }
    
    /**
     * 判断当前页码是否存在数据
     *
     * @param array $params
     * @param int $totalRecord
     *
     * @return array $params
     */
    protected function isRightPage($params, $totalRecord){
        if(($params['currentPage']-1) * $params['pageSize'] == $totalRecord){// 判读是否当前页码下数据不存在
            $params['index'] = !$params['index'] - $params['pageSize'] < 0 ? $params['index'] - $params['pageSize'] : 0;
            $params['currentPage'] = $params['currentPage'] - 1;
        }
        return $params;
    }
    
    /**
     * 建造模糊查询fatherlink值
     * @param string $id
     * @return string
     */
    protected function getFatherLink($id)
    {
        $y = 5;
        $x = (int)strlen($id);
        $p = '';
        for($i=0;$i<$y-$x;$i++){
            $p .= '0';
        }
        $fatherLink = $p.$id;
        return $fatherLink;
    }
    
    /**
     * 判断参数是否为数组
     * @param mixed $param
     * @return array [$param]
     */
    protected function isArray($param)
    {
        return is_array($param) ? $param : [ $param ];
    }
    
    /**
     * 数组转字符串
     * @param array $arr
     */
    protected function arrayToStr($arr)
    {
        $str = '';
        foreach($arr as $k=>$v){
            //$v = empty($v) ? 'null' : $v;
            $str .= $v.'-';
        }
        return substr($str, 0, -1);
    }
    
    /**
     * 
     */
    protected function insertParams($params){
        foreach($params as $k=>$v){
            unset($params[$k]['ID']);
            $user = auth()->user();
            $params[$k]['CreateID'] = $user->id;
            $params[$k]['CreateName'] = $user->name;
            $params[$k]['CreateTime'] = date('Y-m-d H:i:s', time());
            $params[$k]['IsDel'] = $v['IsDel']? 1 : '' ;
        }
        return $params;
    }
    
    /**
     * 数组转json
     * @param array $arr
     */
    protected function array2Json($arr){
        return json_encode($arr);
    }
    
    /**
     * json转数组
     * @param array $arr
     */
    protected function json2Array($json){
        return json_decode($json);
    }
    
    /**
     * 表单单个name获取的数组转换二维数组
     * @param array $arr
     */
    protected function array2Arr($arr)
    {
        $b = [];
        foreach($arr as $_k => $_v){
            foreach ($_v as $__k2=> $__v3)
                $b[$__k2][$_k] = $__v3;
        }
        return $b;
    }
    
    protected function objIsArr($obj)
    {
        return empty($obj) ? [] : $obj->toArray();
    }
}