<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterPost extends Model
{
  protected $fillable = ['body', 'published_date'];
}
