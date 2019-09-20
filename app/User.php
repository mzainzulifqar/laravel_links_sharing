<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isApproved(){
        
        return !! $this->approved;
    }

    public function votedFor(Communitylink $link)
    {
        return $link->votes->contains('user_id',$this->id);
    }

    public function voteFor(Communitylink $link)
    {
        return $link->votes()->create(['user_id' => $this->id,'community_links_id' => $link->id]);
    }
}
