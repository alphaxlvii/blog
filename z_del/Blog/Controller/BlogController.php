<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Libs\Management\HelperManagement;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())
                ->orderBy('published_at', 'desc')
                ->paginate(config('blog.posts_per_page'));

        return HelperManagement::view('blog.index', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        return HelperManagement::view('blog.post')->withPost($post);
    }
}