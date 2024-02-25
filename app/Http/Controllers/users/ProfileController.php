<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // This Second Controller With Profile 
        protected $requestData= [
            'logoImage',
        ];

        public function index(){
        return view('user.profile');
        
        }
        public function editProfile(Request $request){
         $updateLogo = $request->only($this->requestData);
       $img_name = null;

 $logoImage = null;
 extract($_FILES['logoImage']);
        if (!empty($name)) {
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if (in_array($extension, $extension_arr)) {
                $logoImage = rand(0, 1000) . now() . $name;
                $logoImage = str_replace([' ', ':', '-'], 'X', $logoImage);
                $updateLogo['logoImage'] = $logoImage;
                move_uploaded_file($tmp_name, 'public/images/customer/' . $logoImage);

            }
        }
        $updateImage = User::where('id', auth()->user()->id)->update($updateLogo);

                if($updateImage){
            session()->flash('success', 'تم التغيير بنجاح');
            return redirect()->back();
                }
        
        }
}
