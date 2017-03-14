<?php

namespace App\Http\Controllers;

use App\SocialAccount;
use Illuminate\Http\Request;
use App\FacebookPost;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Facebook;
use Facebook\FacebookRequest;
use App;

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

      /*$fb = new Facebook\Facebook([
        'app_id' => env('FACEBOOK_APP_ID'),
        'app_secret' => env('FACEBOOK_APP_SECRET'),
        'default_graph_version' => 'v2.2',
      ]);

      if(\Auth::check()) {
        $userId = \Auth::user()->id;
      }
      $socialAccountUser = SocialAccount::whereUserId($userId)
        ->first();

      $linkData = [
        'link' => 'http://www.mohitaghera.in',
        'message' => 'Hello World !!',
      ];

      try {
        // Returns a `Facebook\FacebookResponse` object
        $response = $fb->post('/me/feed', $linkData, $socialAccountUser->token);
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }

      $graphNode = $response->getGraphNode();

      echo 'Posted with id: ' . $graphNode['id'];*/


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
      FacebookPost::create([
        'body' => request('body'),
        'published_date' => request('published_date'),

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
        //
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
        //
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
