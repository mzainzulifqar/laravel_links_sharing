<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Communitylink;
use Illuminate\Http\Request;

class CommunitylinksController extends Controller
{
    //

    public function index(Channel $channel = null){
    	
    	$links = Communitylink::approved()
      ->with('votes')
      ->latest('updated_at')
      ->Paginate(10);
      
      $channels = Channel::all();
    	return view('index',compact('links','channels'));

    }

    public function store(Request $request){
    	
    	$result = Communitylink::from(auth()->user())->contribute($this->validateRequest());

        if($result && auth()->user()->isApproved())
        {
          if(session()->has('success'))
          {
            return redirect()->back();
          }

            return back()->with('success','Thanks for the contribution');
        
         }
        else {

             return back()->with('success','Your link has been posted for approval'); 
        }

    }



    public function validateRequest()
    {
       $attr =  request()->validate(
        [
          'channel_id' => 'required|exists:channels,id', //12923019
          'link' => 'required|active_url',
          'title'=>'required'
        ]);

       return $attr;
    }


    /**
    *
    *get_channel_related_links
    *@return 
    */

    public function get_channel_related_links($slug){

        $channels  = Channel::all();

        $links = Communitylink::approved()->whereHas('channel',function($query) use ($slug){
          $query->where('slug',$slug);
        })->paginate(10);

        return view('index',compact('channels','links','slug'));
      
    }
    
}
