<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postable_posts = Post::open()
                                ->notMine()
                                ->latest()
                                ->take(5)
                                ->get();

        $my_posts = Post::with('comments')
                            ->open()
                            ->mine()
                            ->latest()
                            ->take(5)
                            ->get();

        // 文字数をカットする数全角=2,半角=1
        $cut_string_num = 200;

        return view('home')
                    ->with(compact(
                        'postable_posts',
                        'my_posts',
                        'cut_string_num'
                    ));
    }
}
