<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TwitterPost;

class TwitterPostController extends Controller
{
    public function index() {
      $posts = TwitterPost::all();
      return view('twitter-posts.index', compact('posts'));
    }

    public function show(TwitterPost $post) {
      return view('twitter-posts.show', compact('post'));
    }
}
