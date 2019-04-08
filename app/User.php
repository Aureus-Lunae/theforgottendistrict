<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username', 'display_name', 'email', 'password', 'avatar', 'desc', 'staff', 'rank', 'builder', 'event', 'banned',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function getRankNameAttribute() {
		$value = $this->rank;

		switch ($value) {
		case 8:
			$rank = 'Founder';
			break;
		case 7:
			$rank = 'Developer';
			break;
		case 6:
			$rank = 'Head Admin';
			break;
		case 5:
			$rank = 'Admin';
			break;
		case 4:
			$rank = 'Moderator';
			break;
		case 3:
			if ($this->builder == 1) {
				$rank = 'Builder';
			} else if ($this->event == 1) {
				$rank = 'Event Team';
			} else {
				$rank = 'Helper';
			}
			break;
		case 2:
			$rank = 'Special';
			break;
		case 1:
			$rank = 'Donator';
			break;
		default:
			$rank = 'Member';
			break;
		}
		return $rank;
	}

	public function hasRole($role) {
		$value = $this->rank;

		if ($value < $role) {
			return false;
		} else {
			return true;
		}
	}

	public function getNameAttribute() {
		return $this->display_name;
	}

	public function news() {
		return $this->hasMany(news::class, 'user_id');
	}

	public function event() {
		return $this->hasMany(event::class, 'user_id');
	}

	public function sender() {
		return $this->hasMany(PM::class, 'sender_id');
	}

	public function receiver() {
		return $this->hasMany(PM::class, 'receiver_id');
	}

}
