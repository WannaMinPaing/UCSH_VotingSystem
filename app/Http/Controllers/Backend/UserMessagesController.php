<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\UserMessages;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreMessage;
use App\Http\Controllers\Controller;

class UserMessagesController extends Controller
{
    public function index()
    {
        return view('backend.message.index');
    }

    public function ssd()
    {
        $data = UserMessages::query();
        return Datatables::of($data)
        ->editColumn('created_at',function($each){
            return Carbon::parse($each->created_at)->format(' h:i:s/ A / Y-m-d');
        })

        ->editColumn('message',function($each){
            if( (strlen($each->message)) > 15 )
                $message_short=substr($each->message, 0,15)."...";
            else
                $message_short=$each->message;
            return $message_short;
        })
                
        ->addColumn('action',function($each){
            $delete_icon='<a href="#" class="text-danger delete"  data-id="'.$each->id.'" data-name="'.$each->name.'"><i class="fas fa-trash-alt"></i></a>';
            $detail_icon='<a href=" '.route('admin.message.show',$each->id).' " class="text-warning"><i class="fas fa-info-circle"></i></a>';

            return '<div class="action-icon">'.$delete_icon.$detail_icon.'</div>';
        })
        
        ->make(true);
    }

    public function store(StoreMessage $request)
    {
        
        $message = new UserMessages();
        $message->name = $request->name;
        $message->phone_num = $request->phone_num;
        $message->email=$request->email;
        $message->message=$request->message;
        $message->ip = $request->ip();
        $message->user_agent= $request->server('HTTP_USER_AGENT');
        $message->save();

        return redirect()->route('home')->with('create','Thank for contacting us.');
    }

    public function show($id)
    {
        $message = UserMessages::findOrFail($id);
        return view('backend.message.show',compact('message'));
    }

    public function destroy($id)
    {
        $voter= UserMessages::findOrFail($id);
        $voter->delete();

        return 'success';
    }

}


