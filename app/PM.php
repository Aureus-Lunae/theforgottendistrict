<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PM extends Model {
	protected $table = 'PM';

	public function sender() {
		return $this->belongsTo(User::class, 'sender_id');
	}

	public function receiver() {
		return $this->belongsTo(User::class, 'receiver_id');
	}

}
