<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacebookPost;

class FacebookPostController extends Controller
{
    public function index() {
      $posts = FacebookPost::all();
      return view('facebook-posts.index', compact('posts'));
    }

    public function show(FacebookPost $post) {
      return view('twitter-posts.show', compact('post'));
    }
}
