<?php

namespace App;

use App\Communitylinkvotes;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Communitylink extends Model
{
    
	protected  $table = 'community_links';
    protected $fillable = ['channel_id','user_id','title','link'];

    /**
    *
    * Which link belongs to which user
    *@return 
    */
    
    public function user(){

    	return $this->belongsTo('App\User');
    }

    /**
    *
    * Which link belongs to which channel
    *@return 
    */    
    public function channel(){

        return $this->belongsTo(Channel::class);
    }

    /**
    *
    * User posting the link is
    * he approved user or link approved
    *@return 
    */
    public static function from(User $user)
    {
    	$link = new static;

    	$link->user_id = $user->id;

        if($user->isApproved())
        {
            $link->approvedLink();
        }

    	return $link;
    }

    /**
    *
    * Saving everything to database
    *@return 
    */
    public function contribute($attr)
    {
        if ($existing = $this->hasAlreadyBeenSubmitted($attr['link'])) {
            session()->flash('success','This link already exist,So we put it to top.
                Thanks! for your contribution');
             return $existing->touch();
        }

    	return $this->fill($attr)->save();
    }

    /**
    *
    * Filerting only approved links
    *@return 
    */
    public static function approved()
    {
        $q = new static;
        return $q->where('approved',1);
    }

    /**
    *
    *Setting the link to approved if User approved
    *@return 
    */
    public function approvedLink(){

        $this->approved = true;
        return $this;
    }

    /*
     *
     * Check either link is already posted
     *
     */
    protected  function hasAlreadyBeenSubmitted($link){
        
        return static::where('link',$link)->first();
        
    }

    /**
    *
    *links votes with respect to users
    *@return 
    */
    public function votes(){
            
        return $this->hasMany(Communitylinkvotes::class,'community_links_id');
    }


    public static  function get_voted_users($id){

        $result = DB::select(DB::raw('SELECT users.name FROM users join community_links_votes on community_links_votes.user_id = users.id join community_links on community_links.id = community_links_votes.community_links_id where community_links.id = '.$id.'  '));

        return $result;

    }
   
}
