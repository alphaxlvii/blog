<?php
namespace Modules\Blog\Controller;
use App\Http\Controllers\Controller;
use Libs\Management\HelperManagement;
use Modules\Blog\Model\Navbar;
use Libs\Utils\ArrayUtils;

class IndexController extends Controller
{
/*     public function Index($nav = null, $slug = null)
    {
        $navbars = ArrayUtils::obj2Arr(Navbar::select('id','navbar','title')->get());
        $navbar = ArrayUtils::obj2Arr(Navbar::with('posts')->where(['navbar'=>'/'.$nav])->get()->first());

        print_r($navbars);
        print_r($navbar);
        return $nav.','.$slug;
        return HelperManagement::_view('blog.index.welcome');
    } */
    
    public function __construct(){
        
        
    }
    
    public function Index($nav = null)
    {
        //if($nav == 'post'){  return abort(404); }
        $navbar = ArrayUtils::obj2Arr(Navbar::with('posts')->where(['navbar'=>'/'.$nav])->get()->first());
        //request()->session()->put('navbarActive', '$nav');
        return HelperManagement::_view('blog.blog.welcome', compact($navbar));
    }
    
    public function Navbar($nav = null)
    {
        //if($nav == 'post'){  return abort(404); }
        //$navbar = ArrayUtils::obj2Arr(Navbar::with('posts')->where(['navbar'=>'/'.$nav])->get()->first());
        $navbar = Navbar::where(['navbar'=>'/'.$nav])->get()->first();
        $posts = $navbar->posts->toArray();
        //request()->session()->put('navbarActive', '$nav');
        //print_r($navbar);
        print_r($posts);
        return HelperManagement::_view('blog.blog.welcome', compact($navbar));
    }
    
    public function showPost($slug)
    {
        return $slug;
    }
    
    public function showAbout()
    {
        return 'about';
    }
    
}