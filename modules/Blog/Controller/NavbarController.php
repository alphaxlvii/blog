<?php
namespace Modules\Blog\Controller;

use App\Http\Controllers\Controller;
use Libs\Utils\ArrayUtils;
use Modules\Blog\Model\Navbar;
use App\Http\Requests\Request;

class NavbarController extends Controller
{
    public static function Navbar()
    {
        $nav_can_enter = config('blog.nav_can_enter');
        $nav_can_enter_arr = empty($nav_can_enter) ? null : explode('|', $nav_can_enter);
        $navbars = Navbar::select('id','navbar','title')->orderBy('sort','asc');
        if(!is_null($navbars)){
            $navbars = $navbars->whereIn('navbar',$nav_can_enter_arr);
        }
        $navbars = $navbars->get();
        return ArrayUtils::obj2Arr($navbars);
    }
}