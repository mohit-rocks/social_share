<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;

class FacebookPost extends Model
{

  use FormAccessible;
  protected $fillable = ['body', 'published_date', 'uid'];

  public function scopeActivityOlderThan($query, $interval) {
    $query->where('published_date', '>=', Carbon::now());
    $query->where('published_date', '<', Carbon::now()->addMinutes($interval)->toDateTimeString());
    return $query;
  }
}
