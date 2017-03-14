<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\FacebookPost;
use Facebook;

class PostOnFacebook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:facebook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allows to post facebook posts on user\'s faceboook profile.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $posts = FacebookPost::query()->where('completed', 0)
        ->where('published_date', '>', Carbon::now())
        ->where('published_date', '<=', Carbon::now()->addMinutes(5))->get();

      $fb = new Facebook\Facebook([
        'app_id' => env('FACEBOOK_APP_ID'),
        'app_secret' => env('FACEBOOK_APP_SECRET'),
        'default_graph_version' => 'v2.2',
      ]);

      if(\Auth::check()) {
        $userId = \Auth::user()->id;
      }
      $socialAccountUser = SocialAccount::whereUserId($userId)
        ->first();

      foreach ($posts as $post) {
        $linkData = [
          'link' => 'http://www.mohitaghera.in',
          'message' => $post->body,
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
        echo 'Posted with id: ' . $graphNode['id'];
      }

    }
}
