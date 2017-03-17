<?php

namespace App\Http\Controllers;

use App\TwitterPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;

class TwitterPostController extends Controller
{
    protected $uid;

    public function __construct()
    {
      $this->middleware('auth');

      if(\Auth::check()) {
        $this->uid = \Auth::user()->id;
      }
      else {
        $this->uid = 1;
      }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = TwitterPost::where('uid', '=', $this->uid)->get();
      return view('twitterposts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('twitterposts.create');
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
        'body' => 'required|max:140',
        'published_date' => 'required|after:now',

      ]);

      TwitterPost::create([
        'body' => request('body'),
        'published_date' => request('published_date'),
        'uid' => $this->uid,
      ]);
      return(redirect('/twitter-posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = TwitterPost::find($id);
      return view('twitterposts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = TwitterPost::find($id);
      return view('twitterposts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      $this->validate(request(), [
        'body' => 'required',
        'published_date' => 'required|after:now',

      ]);

      TwitterPost::find($id)->update([
        'body' => Input::get('body'),
        'published_date' => Input::get('published_date'),
      ]);
      return (redirect('/twitter-posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = TwitterPost::find($id);
      $post->delete();

      // redirect
      Session::flash('message', 'Successfully deleted the post!');
      return Redirect::to('twitter-posts');
    }
}
