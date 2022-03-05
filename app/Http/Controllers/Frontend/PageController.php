<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\BoySelection;

class PageController extends Controller
{
    public function home()
        {
            return view('frontend.home');
        }

    public function contact()
        {
            return view('frontend.contact');
        }
    
    public function rank()
        {
            $king = BoySelection::orderBy('king_count', 'DESC')->get();
            $prince=BoySelection::orderBy('prince_count', 'DESC')->get();
            return view('frontend.rank',compact('king','prince'));
        }

    public function rank_count()
        {
            $king = BoySelection::orderBy('king_count', 'DESC')->get();
            $prince=BoySelection::orderBy('prince_count', 'DESC')->get();
            return [$king,$prince];
        }
    
    public function getpwd($email)
        {
            
           // $pwd=User::where('email', $email)->firstOrFail()->value('password');
           
           $has_vote=User::where('email', $email)->pluck('has_vote')->first();

            if($has_vote=="No")
            {
                $pwd=User::where('email', $email)->pluck('password')->first();
                return $pwd;   
               // return redirect()->route('contact')->with('update','Successfully Updated');
               //return redirect()->route('home')->with('create','Thank for contacting us.');
            }
            else if($has_vote=="Yes")
                    {
                        return "voted";   
                    }
            else {
                return "can not";
            }
           
        }
    
    public function percent()
    {
        $total_user = User::count();
        $tfcount = User::where('year','=','First Year')->count();
        $tscount = User::where('year','=','Second Year')->count();
        $ttcount = User::where('year','=','Third Year')->count();
        $tfocount = User::where('year','=','Fourth Year')->count();
        $tficount = User::where('year','=','Final Year')->count();
        $tocount = User::where('year','=','Other')->count();
        //return view('frontend.percent');
        return view('frontend.percent',compact('total_user','tfcount','tscount','ttcount','tfocount','tficount','tocount'));  
    }  
    
    public function percent_count()
    { 
        $voted_user = User::where('has_vote','=','yes')->count();
        $unvote_user = User::where('has_vote','=','No',)->count();
        $fcount = User::where('has_vote','=','Yes')->where('year','=','First Year')->count();
        $scount = User::where('has_vote','=','Yes')->where('year','=','Second Year')->count();
        $tcount = User::where('has_vote','=','Yes')->where('year','=','Third Year')->count();
        $focount = User::where('has_vote','=','Yes')->where('year','=','Fourth Year')->count();
        $ficount = User::where('has_vote','=','Yes')->where('year','=','Final Year')->count();
        $ocount = User::where('has_vote','=','Yes')->where('year','=','Other')->count();
        //return view('frontend.percent');
       // return $total_user,$voted_user,$unvote_user,$fcount,$scount,$tcount,$focount,$ficount,$ocount,$tfcount,$tscount,$ttcount,$tfocount,$tficount,$tocount;  
       return [$voted_user,$unvote_user,$fcount,$scount,$tcount,$focount,$ficount,$ocount];

    }

    public function profile($id)
    {
        $selections = BoySelection::findOrFail($id);
        return view('frontend.profile',compact('selections'));  
    }

}
