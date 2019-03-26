<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

  public function getShowTimeAttribute() {
    return substr($this->time, 0, -3);
  }

  public function user() {
    return $this->belongsTo(User::class, 'user_id');
  }
}
