<?php


namespace App\Http\Controllers\Portal;


use App\Http\Controllers\BasePortalController;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends BasePortalController
{
    private $post;
    public function __construct()
    {
        parent::__construct();
        $this->post = new Post();
    }

    public function index()
    {
        $product_news = $this->product->getProductNews();
        return view('page.posts.index', compact('product_news'));
    }

    public function load(Request $request)
    {
        $posts = $this->post->getDataItems(['status' => ACTIVE]);
        return view('page.posts.datatable', compact('posts'));
    }

    public function detail($slug)
    {
        $product_news = $this->product->getProductNews();
        $post = $this->post->getFirstInfo(['slug' => $slug]);
        $post->views = $post->views+1;
        $post->save();
        return view('page.posts.detail', compact('post','product_news'));
    }
}
