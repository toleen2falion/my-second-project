<?php

namespace App\Http\Controllers;

use App\Models\User_bloked_ingredients;
use Illuminate\Http\Request;

use App\Models\Disease;

use App\Models\ingredients;

use Illuminate\Support\Facades\Auth;

class UserBlokedIngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function blokedIngredientUserAdd($id)
    {
        //
        // return $id;
        User_bloked_ingredients::create([
            'user_id' => Auth::guard('web')->user()->id,
            'ingredient_id' => $id,
       ]);
       
       $diseases = Disease::latest()->get();
       $ingredients = ingredients::all();

       return view('user.MyStatus', compact('diseases','ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function blokedIngredientUserRemove($id)
    {
        //
        $user_bloked_ingredients = User_bloked_ingredients::where('ingredient_id',$id)
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
    public function show(User_bloked_ingredients $user_bloked_ingredients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User_bloked_ingredients $user_bloked_ingredients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_bloked_ingredients $user_bloked_ingredients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User_bloked_ingredients $user_bloked_ingredients)
    {
        //
    }
}
