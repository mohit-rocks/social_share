<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['body', 'completed'];

    public function scopeIncomplete($query) {
      return $query->where('completed', 0);
    }



}
