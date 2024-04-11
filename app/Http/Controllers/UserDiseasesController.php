<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User_diseases;

use App\Models\Disease;

use App\Models\ingredients;

use Illuminate\Http\Request;

class UserDiseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function diseaseUserAdd($id)
    {
        //
        // return $id;
        User_diseases::create([
            'user_id' => Auth::guard('web')->user()->id,
            'disease_id' => $id,
       ]);
       
       $diseases = Disease::latest()->get();
       $ingredients = ingredients::all();

       return view('user.MyStatus', compact('diseases','ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function diseaseUserRemove($id)
    {
        //
        $diseaseUserRemove = User_diseases::where('disease_id',$id)
        ->where('user_id',Auth::guard('web')->user()->id)->delete();

        $diseases = Disease::latest()->get();
        $ingredients = ingredients::all();

        return view('user.MyStatus', compact('diseases','ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User_diseases $user_diseases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User_diseases $user_diseases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_diseases $user_diseases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User_diseases $user_diseases)
    {
        //
    }
}
