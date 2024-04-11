<?php

namespace App\Http\Controllers;

use App\Models\Dieases_bloked_ingredient;
use App\Models\ingredients;
use App\Models\Disease;
use Illuminate\Http\Request;

class DieasesBlokedIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //////
    public function ingredients($id)
    { 
        // echo $id;
      
       $ingredients = ingredients::all();
       $disease= Disease::where('id', $id)->first();
       return view('doctor.ingredients', compact('ingredients','disease'));
      
     
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_ingredient($id)
    {
        //
        // echo $id;
        
        $ingredient = ingredients::findOrFail($id);
        $disease_cart = session()->get('disease_cart', []);
        if(isset($disease_cart[$id])) {
            $disease_cart[$id]['quantity']++;
        } else {
            $disease_cart[$id] = [
             
                "name" => $ingredient->name,
                // "servingSize" => $ingredient->servingSize,
                "quantity" => 1
            ];
        }
        session()->put('disease_cart', $disease_cart);
        return redirect()->back()->with('success', 'تم إضافة المكون بنجاح');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function disease_cart($d_id)
     {
        // return $d_id;
        $disease= Disease::where('id', $d_id)->first();
       return view('doctor.disease_cart', compact('disease'));
       
     }
    /**
     * Display the specified resource.
     */
    public function remove(Request $request)
    {
        // echo "kk";
        if($request->id) {
            $disease_cart = session()->get('disease_cart');
            if(isset($disease_cart[$request->id])) {
                unset($disease_cart[$request->id]);
                session()->put('disease_cart', $disease_cart);
            }
            session()->flash('success', 'تم حذف المكون بنجاح');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
      
   public function duu(Request $request)
   {
    // return 7;
    //  return $request;
    $disease_id=$request->inputs[0]['disease_id'];
    // return $disease_id;
    //  $disease= Disease::findOrFail($disease_id);
    //   return $disease;
     try {
       foreach ($request->inputs as $key => $value){
       
           
        $ingredients = ingredients::where('name', 'LIKE', "%" . $value['name'] . "%")->get();
        foreach($ingredients as $ingredient){
            // echo  $disease_id;
            // echo "<br>";
            // echo  $ingredient->name;
            // echo "<br>";
            // echo  $ingredient->id;
            // echo "<br>";

            Dieases_bloked_ingredient::create([
            'disease_id' => $disease_id,
            'ingredient_id' => $ingredient->id,
            
             
            ]);
        }
    // تتمة العمل من هنا

//         ///save

          
       }
  
    session()->flash('Add', 'تم اضافة المكونات بنجاح');
    return redirect()->route('doctor.dashboardd',$disease_id);
   
}

 catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
   }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dieases_bloked_ingredient $dieases_bloked_ingredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dieases_bloked_ingredient $dieases_bloked_ingredient)
    {
        //
    }

      //////
      public function diease_bloked_ingredient($id)
      { 
        //   echo $id;
        
        //  $ingredients = ingredients::all();
         $disease= Disease::where('id', $id)->first();
        //  return view('doctor.diease_bloked_ingredient', compact('ingredients','disease'));
        return view('doctor.diease_bloked_ingredient', compact('disease'));
        
       
       
      }

      //
      public function delete_diease_bloked_ingredient(Request $request)
      {
          //
        //  return $request;
          $diease_bloked_ingredient = Dieases_bloked_ingredient::where('disease_id',$request->disease_id)
          ->where('ingredient_id', $request->ingredient_id)->delete();
        
  
          session()->flash('delete', 'تم حذف المكون بنجاح');
  
          return back();
      }
}
