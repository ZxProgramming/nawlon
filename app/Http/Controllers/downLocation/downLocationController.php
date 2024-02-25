<?php

namespace App\Http\Controllers\downLocation;

use App\Http\Controllers\Controller;
use App\Models\DownLocation;
use Illuminate\Http\Request;

class downLocationController extends Controller
{

    protected $newLocation=['name','user_id'];
    // This First Controller With Dwonload Location V1
    public function index(){
        $locations = DownLocation::where('user_id',auth()->user()->id)->get();
        return view('user.downLocation.downLocation',compact('locations'));
    }



        public function locationAdd(Request $request){
        $newDataLocation =$request->validate(
            ['name'=>'required',]
        );
$createNewLocation =$request->only($this->newLocation);
        $createNewLocation['user_id'] = auth()->user()->id;
        $addNewLocation = DownLocation::create($createNewLocation );
                    if($addNewLocation ){
            session()->flash('success', 'تم اضافة مكان جديد');
                        return redirect()->back();
                    }

        }
      
        public function locationEdit(Request $request){


        $newDataLocation =$request->validate(
            ['name'=>'required',]
        );
$createNewLocation =$request->only($this->newLocation);
        $createNewLocation['user_id'] = auth()->user()->id;
        $addNewLocation = DownLocation::where('user_id',auth()->user()->id)->
        where('id',$request->location_id)->update($createNewLocation );
                    if($addNewLocation ){
            session()->flash('success', 'تم التعديل مكان جديد');
                        return redirect()->back();
                    }

        }
      
        public function deleteLocation($id){
        

        $deleteNewLocation = DownLocation::where('id',$id)->delete( );
                    if($deleteNewLocation ){
            session()->flash('success', 'تم الغاء المكان');
                        return redirect()->back();
                    }

        }
}
