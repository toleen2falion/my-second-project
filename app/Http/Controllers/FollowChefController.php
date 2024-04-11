<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Follow_chef;
use Illuminate\Http\Request;

class FollowChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function follow_chef($id)
    {
        //
        // echo $id."..".Auth::guard('web')->user()->id;
        Follow_chef::create([
            'chef_id' => $id,
            'user_id' => Auth::guard('web')->user()->id,
       ]);
       session()->flash('follow', 'تم متابعة الطاهي بنجاح');
       return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function unfollow_chef($id)
    {
        //
        // return "888";
        $unFollow_chef = Follow_chef::where('chef_id',$id)
        ->where('user_id',Auth::guard('web')->user()->id)->delete();
      

        session()->flash('unfollow', 'تم إلغاء متابعة الطاهي بنجاح');

        return back();
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
    public function show(Follow_chef $follow_chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Follow_chef $follow_chef)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Follow_chef $follow_chef)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follow_chef $follow_chef)
    {
        //
    }
}
