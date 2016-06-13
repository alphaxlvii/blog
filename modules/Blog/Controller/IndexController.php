<?php
namespace Modules\Blog\Controller;
use App\Http\Controllers\Controller;
use Libs\Management\HelperManagement;
use Modules\Blog\Model\Navbar;
use Libs\Utils\ArrayUtils;
use Modules\Blog\Model\Post;
use DB;

class IndexController extends Controller
{ 
    public function __construct(){

    }
    
    public function Index($nav = null)
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(1);
        return HelperManagement::_view('blog.blog.lists', compact('posts'));
    }
    
    public function Navbar($nav = null)
    {
        $navbar = DB::select('SELECT id FROM blog_navbars WHERE navbar = :nav ',[ 'nav'=>$nav ]);
        $navbar_post_ids = DB::select('SELECT post_id FROM blog_post_navbar_pivot WHERE navbar_id = :navbar_id',['navbar_id'=>$navbar[0]->id]);       
        $posts_ids = [];
        foreach($navbar_post_ids as $v){
            $posts_ids[] = $v->post_id;
        }
        $posts = Post::whereIn('id',$posts_ids)->orderBy('created_at', 'desc')->paginate(1);
        return HelperManagement::_view('blog.blog.lists', compact('posts'));
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