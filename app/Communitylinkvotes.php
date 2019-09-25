<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communitylinkvotes extends Model
{
    //

    protected $table = 'community_links_votes';

     
    public function users()
    {
    return $this->belongsToMany(User::class, 'community_links_votes','user_id','community_links_id');
    }

}
