<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Step $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Step $step)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Step $step)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Step $step)
    {
        //
    }
    
     /**
     * Remove the specified resource from storage.
     */
    public function delete_dish_step(Request $request)
    {
        //
        // return $request;
        Step::where('dish_id',$request->dish_id)
        ->where('id',$request->step_id)->delete();
 
         session()->flash('delete', 'تم حذف الخطوة بنجاح');
 
         return back();
    }
////

    public function store_steps(Request $request)
    {
    
  //  return $request;
          $request->validate([
              'inputs.*.content'=>'required',
          ],
          [
              'inputs.*.content' => 'يجب كتابة الخطوة',
          ]
          );
          foreach ($request->inputs as $key => $value){
              Step::create($value);
          }
          return back()->with('success','تمت إضافة الخطوات بنجاح');
      
     
     
    }
}
