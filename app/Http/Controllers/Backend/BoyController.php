<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\BoySelection;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreBoy;
use App\Http\Requests\UpdateBoy;
use Illuminate\Support\Facades\File;

class BoyController extends Controller
{

    /*                                     Boy Index Page                             */
    public function index()
    {
        return view('backend.boy.index');
    }


    /*                                     Boy DataTable                                */
    public function ssd()
    {
        $data = BoySelection::query(); 
        return Datatables::of($data)
        ->editColumn('created_at',function($each){
            return  Carbon::parse($each->created_at)->format('h:i:s/ A / Y-m-d');
        })

        ->addColumn('action',function($each){
            $edit_icon='<a href=" '.route('admin.boy.edit',$each->id).' " class="text-warning"><i class="fas fa-edit"></i></a>';
            $delete_icon='<a href="#" class="text-danger delete"  data-id="'.$each->id.'" data-name="'.$each->name.'"><i class="fas fa-trash-alt"></i></a>';
            $detail_icon='<a href=" '.route('admin.boy.show',$each->id).' " class="text-warning"><i class="fas fa-info-circle"></i></a>';

            return '<div class="action-icon">'.$edit_icon.$delete_icon.$detail_icon.'</div>';
        })
        ->make(true);
    }


    /*                                       Cretate Boy                               */
    public function create()
    {
        return view('backend.boy.create');
    }


    /*                                       Store Boy                                */
    public function store(StoreBoy $request)
    { 
        
         if($request->file('profile')) 
        {
            // 624872374523_a.jpg
            $main_photo = time().'_'.$request->profile->getClientOriginalName();

            // brandimg/624872374523_a.jpg
            $mainphoto_path = $request->file('profile')->storeAs('boy_img', $main_photo, 'public');

            $main_photo_path = '/storage/'.$mainphoto_path;
        }


        $imgs=array();
        if($photos=$request->file('photos'))
        {
            foreach($photos as $photo)
            {
                $name= time().'_'.$photo->getClientOriginalName();
                $rename='/all_boy_photo/'.$name;
                $photo->move(public_path('all_boy_photo'),$rename);
                $imgs[]=$rename;
            }
        
        } 


        $boy = new BoySelection();
        $boy->name = $request->name;
        $boy->age = $request->age;
        $boy->address=$request->address;
        $boy->imgs_path=implode("|",$imgs);
        $boy->mainphoto_path = $main_photo_path;
        $boy->class = $request->class;
        $boy->save();

        return redirect()->route('admin.boy.index')->with('create','Successfully Created');
    }


    /*                                           Boy Edit                                   */
    public function edit($id)
    {
        $boy = BoySelection::findOrFail($id);
        return view('backend.boy.edit',compact('boy'));
    }


    /*                                          Boy Update                                 */
    public function update($id,UpdateBoy $request)
    {  
        
        $boy = BoySelection::findOrFail($id);
        $boy_array=array();

//Update Old Photo       
        if($request->tempore_photo)        
        {
            $boy_tempore_array=explode('|',$request->tempore_photo);
            $boy_imges=explode('|', $boy->imgs_path);

            foreach($boy_imges as $boy_img)
            {
                $exit=in_array($boy_img, $boy_tempore_array);
                
                if($exit != '1')
                {
                    File::delete(public_path($boy_img));               
                }
                else
                {
                    $boy_array[]=$boy_img;
                }
            }
        }
        else
        {
            $boy_imges=explode('|', $boy->imgs_path);
            foreach($boy_imges as $boy_img)
            {
                File::delete(public_path($boy_img));
            }
        }

//Add New Photo Function

        if($new_photos=$request->file('newphotos'))
        {
            foreach($new_photos as $new_photo)
            {
                $name= time().'_'.$new_photo->getClientOriginalName();
                $rename='/all_boy_photo/'.$name;
                $new_photo->move(public_path('all_boy_photo'),$rename);
                $boy_array[]=$rename;
            }

        } 


        

        if($request->file('newphoto_file')) 
        {
            $main_photo = time().'_'.$request->newphoto_file->getClientOriginalName();
            $newphoto_file = $request->file('newphoto_file')->storeAs('boy_img', $main_photo, 'public');
            $main_photo_path = '/storage/'.$newphoto_file;
            File::delete(public_path($request->oldphoto));
        }else
            {
                $main_photo_path=$request->oldphoto;
            }

        $boy->name = $request->name;
        $boy->age = $request->age;
        $boy->address = $request->address;
        $boy->class = $request->class;
        $boy->mainphoto_path = $main_photo_path;
        $boy->imgs_path=implode("|",$boy_array);
        $boy->update();

        return redirect()->route('admin.boy.index')->with('update','Successfully Updated');
    }


    /*                                       Boy Delete                                 */
    public function destroy($id)
    {
        $boy= BoySelection::findOrFail($id);
        File::delete(public_path($boy->mainphoto_path));
        if ($boy->imgs_path != "")
        {
            foreach(explode('|', $boy->imgs_path) as $imgs)
            {
                File::delete(public_path($imgs));
            }
        }
        $boy->delete();

        return 'success';
    }
     

    /*                                       Boy Show                                   */ 
    public function show($id)
    {
        $boy = BoySelection::findOrFail($id);
        return view('backend.boy.show',compact('boy'));  
    }
    
    /*                                       Boy Show  Count                                 */ 
    public function showCount($id)
    {
        $count = BoySelection::findOrFail($id);
        return $count;  
    }

}
