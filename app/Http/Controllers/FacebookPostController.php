<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacebookPost;
use Socialite;
use App;
use Twitter;

class FacebookPostController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = FacebookPost::orderby('created_at', 'desc')->get();

      return view('facebookposts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('facebookposts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate(request(), [
        'body' => 'required',
        'published_date' => 'required|after:now',

      ]);
      if(\Auth::check()) {
        $userId = \Auth::user()->id;
      }
      else {
        $userId = 1;
      }
      FacebookPost::create([
        'body' => request('body'),
        'published_date' => request('published_date'),
        'uid' => $userId,
      ]);
      return(redirect('/facebook-posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FacebookPost $post)
    {
      return view('facebookposts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = FacebookPost::find($id);
      return view('facebookposts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate(request(), [
        'body' => 'required',
        'published_date' => 'required|after:now',

      ]);

      FacebookPost::find($id)->update([
        'body' => request('body'),
        'published_date' => request('published_date'),
      ]);
      return (redirect('/facebook-posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
