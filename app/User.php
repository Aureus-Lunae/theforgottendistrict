<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'desc', 'staff', 'rank', 'builder', 'event', 'banned'
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
                if ($this->builder == 1){
                    $rank = 'Builder';
                } else if ($this->event == 1){
                    $rank = 'Event Team';
                } else {
                    $rank = 'Helper';
                }
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
}
