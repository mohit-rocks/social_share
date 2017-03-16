<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\TwitterPost;
use Twitter;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PostOnTwitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:twitter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allows to post tweets on user\'s twitter profile.';

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
      $posts = TwitterPost::query()->where('completed', 0)
        ->where('published_date', '>', Carbon::now())
        ->where('published_date', '<=', Carbon::now()->addMinutes(5))->get();

      foreach ($posts as $post) {
        try {
          if(\Auth::check()) {
            $userId = \Auth::user()->id;
          }
          else {
            $userId = 1;
          }

          $tweet = Twitter::postTweet(['status' => $post->body, 'format' => 'json']);

          // Set completed to 1 so it should not be posted again.
          TwitterPost::where('id', $post->id)->update(array('completed' => 1));

          Log::info('Published facebook post for user: ' . $userId . ' Posted with id:' . $tweet->id);
        } catch (\Exception $e) {
          Log::info('Something went wrong in twitter auto post.');
        }
      }
    }
}
