<?php
namespace Modules\Blog\Controller;
use App\Http\Controllers\Controller;
use Libs\Management\HelperManagement;
use Modules\Blog\Model\Navbar;
use Libs\Utils\ArrayUtils;
use Modules\Blog\Model\Post;

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
        $posts = ArrayUtils::obj2Arr(Post::all());
        //request()->session()->put('navbarActive', '$nav');
        return HelperManagement::_view('blog.blog.welcome', compact('posts'));
    }
    
    public function Navbar($nav = null)
    {
        //if($nav == 'post'){  return abort(404); }
        //$navbar = ArrayUtils::obj2Arr(Navbar::with('posts')->where(['navbar'=>'/'.$nav])->get()->first());
        $navbar = Navbar::with(['posts'=>function ($query){
            $query->orderBy('created_at', 'desc');
        }])->where(['navbar'=>'/'.$nav])->get()->first()->toArray();
        $posts = $navbar['posts'];
        //request()->session()->put('navbarActive', '$nav');
        //print_r($navbar);
        print_r($navbar);
        return HelperManagement::_view('blog.blog.welcome', compact('posts'));
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