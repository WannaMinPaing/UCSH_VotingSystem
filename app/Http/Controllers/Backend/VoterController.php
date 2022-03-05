<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreVoter;
use App\Http\Requests\UpdateVoter;
use Carbon\Carbon;

class VoterController extends Controller
{
    
    public function index()
    {
        return view('backend.voter.index');
    }

    public function ssd()
    {
        $data = User::query();
        return Datatables::of($data)
        ->editColumn('created_at',function($each){
            return Carbon::parse($each->created_at)->format('h:i:s/ A / Y-m-d');
        })

        ->editColumn('has_vote',function($each){
            $yesOrNo= ($each->has_vote) == 'No' ? '<div class="text-danger">'.$each->has_vote.'</div>' : '<div class="text-success">'.$each->has_vote.'</div>';
            return $yesOrNo;
        })
        
        ->addColumn('action',function($each){
            $edit_icon='<a href=" '.route('admin.voter.edit',$each->id).' " class="text-warning"><i class="fas fa-edit"></i></a>';
            $delete_icon='<a href="#" class="text-danger delete"  data-id="'.$each->id.'" 
            data-email="'.$each->email.'"><i class="fas fa-trash-alt"></i></a>';
            $detail_icon='<a href=" '.route('admin.voter.show',$each->id).' " class="text-warning"><i class="fas fa-info-circle"></i></a>';

            return '<div class="action-icon">'.$edit_icon.$delete_icon.$detail_icon.'</div>';
        })
        ->rawColumns(['has_vote','action'])
        ->make(true);
    }

    public function create()
    {
        return view('backend.voter.create');
    }

    public function store(StoreVoter $request)
    {
        $voter = new User();
        $voter->email = $request->email;
        $voter->year = $request->year;
        $voter->password= mt_rand(100000, 999999);
        $voter->save();

        return redirect()->route('admin.voter.index')->with('create','Successfully Created');
    }

    public function edit($id)
    {
        $voter = User::findOrFail($id);
        return view('backend.voter.edit',compact('voter'));
    }

    public function update($id,UpdateVoter $request)
    {   
        $voter = User::findOrFail($id);
        $voter->email = $request->email;
        $voter->year = $request->year;
        $voter->update();

        return redirect()->route('admin.voter.index')->with('update','Successfully Updated');
    }

    public function destroy($id)
    {
        $voter= User::findOrFail($id);
        $voter->delete();

        return 'success';
    }

    public function show($id)
    {
        $voter = User::findOrFail($id);
        return view('backend.voter.show',compact('voter'));
    }
}
