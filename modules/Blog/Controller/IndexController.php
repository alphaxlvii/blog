<?php
namespace Modules\Blog\Controller;
use App\Http\Controllers\Controller;
use Libs\Management\HelperManagement;
use Modules\Blog\Model\Navbar;
use Libs\Utils\ArrayUtils;
use Modules\Blog\Model\Post;

class IndexController extends Controller
{ 
    public function __construct(){
        
        
    }
    
    public function Index($nav = null)
    {
        $posts = ArrayUtils::obj2Arr(Post::all());
        return HelperManagement::_view('blog.blog.welcome', compact('posts'));
    }
    
    public function Navbar($nav = null)
    {
        $navbar = Navbar::with(['posts'=>function ($query){
            $query->orderBy('created_at', 'desc');
        }])->where(['navbar'=>'/'.$nav])->get()->first()->toArray();
        $posts = $navbar['posts'];
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