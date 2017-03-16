<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\FacebookPost;
use Facebook;
use Socialite;
use App\SocialAccount;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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

      foreach ($posts as $post) {
        $socialAccountUser = SocialAccount::whereUserId($post->uid)
          ->first();
        $linkData = [
          'link' => 'http://www.mohitaghera.in',
          'message' => $post->body,
        ];

        try {
          // Returns a `Facebook\FacebookResponse` object
          $response = $fb->post('/me/feed', $linkData, $socialAccountUser->token);

          // Set completed to 1 so it should not be posted again.
          FacebookPost::where('id', $post->id)->update(array('completed' => 1));

          $graphNode = $response->getGraphNode();
          Log::info('Published facebook post for user: ' . $post->uid . ' Posted with id:' . $graphNode['id']);

        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
      }
    }
}
