<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FacebookPost extends Model
{
  protected $fillable = ['body', 'published_date', 'uid'];

  public function scopeActivityOlderThan($query, $interval) {
    $query->where('published_date', '>=', Carbon::now());
    $query->where('published_date', '<', Carbon::now()->addMinutes($interval)->toDateTimeString());
    return $query;
  }
}
