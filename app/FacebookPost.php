<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookPost extends Model
{
  protected $fillable = ['body', 'published_date'];
}
