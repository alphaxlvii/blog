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
        return ArrayUtils::obj2Arr(Navbar::select('id','navbar','title')->orderBy('sort','asc')->get());
    }
}