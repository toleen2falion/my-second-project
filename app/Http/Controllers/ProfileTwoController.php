<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Profile;

use App\Models\User;

use App\Models\Disease;

use App\Models\ingredients;

class ProfileTwoController extends Controller
{
    //
    public function MyProfile()
    {
        $user=User::find(Auth::guard('web')->user()->id)->Profile;
        if ($user)
        return "yes";
    else 
        return view('user.MyProfile');
    }
//
    public function SaveMyProfile(Request $request)
    {
        // return  $request;
        // return view('user.MyProfile');
        Profile::create([
            'user_id' =>(Auth::guard('web')->user()->id),
            'dateOfBirth' => $request->dateOfBirth,
            'height' => $request->height,
            'weight' => $request->weight,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'status' => $request->status,
            'playSport' => $request->playSport,
            'wieghtPlanType' => $request->wieghtPlanType,
            
            ]);
            session()->flash('AddProfile', 'تم حفظ المعلومات. ');

            if($request->status == "نعم"){
                $diseases = Disease::latest()->get();
                $ingredients = ingredients::all();

                return view('user.MyStatus', compact('diseases','ingredients'));
            }
          else
            return \Redirect::route('home');
    }


    // RigtDishForUser
    public function RigtDishForUser()
    { 
        return "oooo";
      
     
    }

}
