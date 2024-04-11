<?php

namespace App\Http\Controllers;

use App\Models\ingredients;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $ingredients = ingredients::latest()->get();
        // $ingredients = ingredients::all();
        return view('admin.ingredients', compact('ingredients'));
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add_ingredient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
    //     $request->validate([
    //         'chief_name'=>'required' ,
    //         'chief_phone'=>'required| min:10',
    //         'chief_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'chief_email'=>'required' ,
    //         'chief_passwoard'=>'required' ,
    //     ],

    
    // );


         ingredients::create([
            'name' => $request->ingredient_name,
            'servingSize' => $request->ingredient_servingSize,
            'calories' => $request->ingredient_calories,
            'totalFat' => $request->ingredient_totalFat,
            'cholesterol' => $request->ingredient_cholesterol,
            'sodium' => $request->ingredient_sodium,
            'vitaminA' => $request->ingredient_vitaminA,
            'vitaminC' => $request->ingredient_vitaminC,
            'protein' => $request->ingredient_protein,
            'sugars' => $request->ingredient_sugars,

                
            ]);

            session()->flash('Add', 'تم اضافة المكون بنجاح');
            // return back();
            $ingredients = ingredients::latest()->get();
        // $ingredients = ingredients::all();
        return view('admin.ingredients', compact('ingredients'));
        
            

    }

    /**
     * Display the specified resource.
     */
    public function show(ingredients $ingredients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredients = ingredients::where('id', $id)->first();
       
        return view('admin.edit_ingredient', compact('ingredients'));
    }


   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $ingredients = ingredients::findOrFail($request->ingredient_id);

        //     $request->validate([
        //         'chief_name'=>'required' ,
        //         'chief_phone'=>'required| min:10',
        //         'chief_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //         'email'=>'required' ,
        //         'password'=>'required' ,
        //     ],
            
          
        
        // );
        

        $ingredients->update([
           
            'name' => $request->ingredient_name,
            'servingSize' => $request->ingredient_servingSize,
            'calories' => $request->ingredient_calories,
            'totalFat' => $request->ingredient_totalFat,
            'cholesterol' => $request->ingredient_cholesterol,
            'sodium' => $request->ingredient_sodium,
            'vitaminA' => $request->ingredient_vitaminA,
            'vitaminC' => $request->ingredient_vitaminC,
            'protein' => $request->ingredient_protein,
            'sugars' => $request->ingredient_sugars,
            
            
        ]);

        session()->flash('edit', 'تم تعديل المكون بنجاح');
        return back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ingredients  $ingredients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // return $id;
        $ingredients = ingredients::where('id', $id)->first();
      
        
        $ingredients->delete();

        session()->flash('delete', 'تم حذف المكون بنجاح');

        return back();
    }
}
