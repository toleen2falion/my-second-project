<?php

namespace App\Http\Controllers;

use App\Models\Shopping_list;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ShoppingListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function shopping_list()
    {
        //
        $Shopping_lists=Shopping_list::where('user_id',Auth::guard('web')->user()->id)->get();
        // return   $Shopping_lists;
        return view('user.shopping_list',compact('Shopping_lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_to_shopping_list($id)
    {
        //
        // return $id;
        Shopping_list::create([
            'user_id' => (Auth::guard('web')->user()->id ),
            'ingredient_id' => $id,
            ]);

            session()->flash('Add', 'تم اضافة المكون إلى سلة المشتريات ');
            return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add_quantity_to_shopping_list(Request $request)
    {
        //
        // return $request;
         ///value to g
         if($request->ingredient_measruingUnit=='معلقة صغيرة')
         $request->ingredient_quantity = 5 *  $request->ingredient_quantity;

      else if($request->ingredient_measruingUnit=='معلقة كبيرة')
          $request->ingredient_quantity = 15 *  $request->ingredient_quantity;

      else if($request->ingredient_measruingUnit=='كوب')
          $request->ingredient_quantity = 180 *  $request->ingredient_quantity;
///
        //   return   $request->ingredient_quantity;
        $Shopping_list=Shopping_list::where('user_id',Auth::guard('web')->user()->id)
        ->where('ingredient_id',$request->ingredient_id)->first();
// return  $Shopping_list->quantity;

        Shopping_list::where('user_id',Auth::guard('web')->user()->id)
        ->where('ingredient_id',$request->ingredient_id)->update([
               
            'quantity' =>  $Shopping_list->quantity + $request->ingredient_quantity,
            'measruingUnit' => 'جرام',
        ]);

        session()->flash('Add', 'تم اضافة كمية المكون إلى سلة المشتريات ');
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Shopping_list $shopping_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shopping_list $shopping_list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shopping_list $shopping_list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove_from_shopping_list($id)
    {
        //
        // return $id;
        Shopping_list::where('user_id',Auth::guard('web')->user()->id)
        ->where('ingredient_id', $id)->delete();
      

        session()->flash('delete', 'تم حذف المكون بنجاح');

        return back();
    

    }
}
