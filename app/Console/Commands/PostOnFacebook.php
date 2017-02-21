<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\FacebookPost;

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
    }
}
