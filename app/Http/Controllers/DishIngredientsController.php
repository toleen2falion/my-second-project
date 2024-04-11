<?php

namespace App\Http\Controllers;

use App\Models\Chef;

use App\Models\Dish;

use App\Models\Step;

use App\Models\ingredients;

use App\Models\Dish_ingredients;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\ChefAuth;

use Illuminate\Support\Facades\Auth;



class DishIngredientsController extends Controller
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
    public function show(Dish_ingredients $dish_ingredients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish_ingredients $dish_ingredients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish_ingredients $dish_ingredients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish_ingredients $dish_ingredients)
    {
        //
    }

     //////chef dishs ingredients
     public function ingredients($id)
     {
       
        $ingredients = ingredients::all();
        $dish= dish::where('id', $id)->first();
        return view('chef.dish_ingredients', compact('ingredients','dish'));
       
      
      
     }
     public function add_ingredient_to_dish($id)
     {
      
           $ingredient = ingredients::findOrFail($id);
           $dish_cart = session()->get('dish_cart', []);
           if(isset($dish_cart[$id])) {
               $dish_cart[$id]['quantity']++;
           } else {
               $dish_cart[$id] = [
                
                   "name" => $ingredient->name,
                   "servingSize" => $ingredient->servingSize,
                   "quantity" => 1
               ];
           }
           session()->put('dish_cart', $dish_cart);
           return redirect()->back()->with('success', 'ingredient has been added to dish_cart!');
       
      
      
     }


     public function dish_cart($d_id)
     {
       $dish= dish::where('id', $d_id)->first();
       return view('chef.dish_cart', compact('dish'));
       
     }

     
     public function remove(Request $request)
   {
       if($request->id) {
           $dish_cart = session()->get('dish_cart');
           if(isset($dish_cart[$request->id])) {
               unset($dish_cart[$request->id]);
               session()->put('dish_cart', $dish_cart);
           }
           session()->flash('success', 'Product successfully removed!');
       }
   }

    
   public function uuu(Request $request)
   {
    $dish_id=$request->inputs[0]['dish_id'];
    // return $dish_id;
    $dishs = dish::findOrFail($dish_id);
        
    $totalCalories=$dishs->calories;
    $totalTotalFat=$dishs->totalFat;
    $totalCholesterol=$dishs->cholesterol;
    $totalSodium=$dishs->sodium;
    $totalVitaminA=$dishs->vitaminA;
    $totalVitaminC=$dishs->vitaminC;
    $totalProtein=$dishs->protein;
    $totalSugars=$dishs->sugars;

     try {
       foreach ($request->inputs as $key => $value){
       
        
        
           $ingredients = ingredients::where('id', $value['ingredient_id'])->first();
 
           if(isset($value['type']))
           $type ='رئيسي';
        else 
        $type = 'ثانوي';

        ///save
        Dish_ingredients::create([
            'dish_id' => $value['dish_id'],
            'ingredient_id' => $value['ingredient_id'],
            'type' => $type,
            'quantity' => $value['servingSize'],
            'measruingUnit' => $value['measruing_unit'],
             
            ]);


            if($value['measruing_unit']=='معلقة صغيرة')
               $value['servingSize'] = 5 *  $value['servingSize'];

           else if($value['measruing_unit']=='معلقة كبيرة')
               $value['servingSize'] = 15 *  $value['servingSize'];

           else if($value['measruing_unit']=='كوب')
               $value['servingSize'] = 180 *  $value['servingSize'];
     

           
           
        //    echo $ingredients->vitaminC;
           
        //    echo "<br>";
           $NewCalories= ($value['servingSize']*$ingredients->calories)/100;
           $NewTotalFat= ($value['servingSize']*$ingredients->totalFat)/100;
           $NewCholesterol= ($value['servingSize']*$ingredients->cholesterol)/100;
           $NewSodium= ($value['servingSize']*$ingredients->sodium)/100;
           $NewVitaminA= ($value['servingSize']*$ingredients->vitaminA)/100;
           $NewVitaminC= ($value['servingSize']*$ingredients->vitaminC)/100;
           $NewProtein= ($value['servingSize']*$ingredients->protein)/100;
           $NewSugars= ($value['servingSize']*$ingredients->sugars)/100;
           
           
        //    echo "<br>";
           $totalCalories= $totalCalories + $NewCalories;
           $totalTotalFat= $totalTotalFat + $NewTotalFat;
           $totalCholesterol= $totalCholesterol + $NewCholesterol;
           $totalSodium= $totalSodium + $NewSodium;
           $totalVitaminA= $totalVitaminA + $NewVitaminA;
           $totalVitaminC= $totalVitaminC + $NewVitaminC;
           $totalProtein= $totalProtein + $NewProtein;
           $totalSugars= $totalSugars + $NewSugars;

        
        
        $dish_id = $value['dish_id'];
          
       }
       ////إضافة القيم الغذائية للطبق
    //    $dishs = dish::findOrFail($dish_id);

       $dishs->update([
        'calories' =>$totalCalories,
        'totalFat' => $totalTotalFat,
        'cholesterol' => $totalCholesterol,
        'sodium' => $totalSodium,
        'vitaminA' => $totalVitaminA,
        'vitaminC' => $totalVitaminC,
        'protein' =>  $totalProtein,
        'sugars' => $totalSugars,
       
        
        
    ]);
    session()->flash('Add', 'تم اضافة hjj بنجاح');
    return redirect()->route('chef.dashboard_dishs');
   
}

 catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        // session()->forget('dish_cart');
    // foreach ($request->inputs as $key => $value){
    //     if(isset($value['ingredient_id'])) {
    //         $request->id == $value['ingredient_id'];
    //         $dish_cart = session()->get('dish_cart');
    //         if(isset($dish_cart[$request->id])) {
    //             unset($dish_cart[$request->id]);
    //             session()->put('dish_cart', $dish_cart);
    //         }
    //         session()->flash('success', 'Product successfully removed!');
    //     }
    // }
   
   }

   ////تعديل مكونات طبق
   public function update_dish_ingredient(Request $request)
   {
        // return $request;
        $NewQuantity=$request->new_quantity;
        $ingredient = ingredients::where('id', $request->ingredient_id)->first();
        
         if(($request->old_quantity != $request->new_quantity)||($request->old_measruingUnit!=$request->new_measruingUnit))
            {
            ///old value to g
              if($request->old_measruingUnit=='معلقة صغيرة')
               $request->old_quantity = 5 *  $request->old_quantity;

            else if($request->old_measruingUnit=='معلقة كبيرة')
                $request->old_quantity = 15 *  $request->old_quantity;

            else if($request->old_measruingUnit=='كوب')
                $request->old_quantity = 180 *  $request->old_quantity;

         ///
            $old_in_Calories= ($request->old_quantity*$ingredient->calories)/100;
            $old_in_TotalFat= ($request->old_quantity*$ingredient->totalFat)/100;
            $old_in_Cholesterol= ($request->old_quantity*$ingredient->cholesterol)/100;
            $old_in_Sodium= ($request->old_quantity*$ingredient->sodium)/100;
            $old_in_VitaminA= ($request->old_quantity*$ingredient->vitaminA)/100;
            $old_in_VitaminC= ($request->old_quantity*$ingredient->vitaminC)/100;
            $old_in_Protein= ($request->old_quantity*$ingredient->protein)/100;
            $old_in_Sugars= ($request->old_quantity*$ingredient->sugars)/100;
           
        //
         $dish= dish::where('id', $request->dish_id)->first();
        //  القيم الغذائية للطبق قبل التعديل
        //    طرح القيم الغذائية  للمكون قبل التعديل من القيم الغذائية للطبق 
         $calories= $dish->calories-$old_in_Calories;
         $totalFat= $dish->totalFat-$old_in_TotalFat;
         $cholesterol= $dish->cholesterol-$old_in_Cholesterol;
         $sodium= $dish->sodium-$old_in_Sodium;
         $vitaminA= $dish->vitaminA-$old_in_VitaminA;
         $vitaminC= $dish->vitaminC-$old_in_VitaminC;
         $protein= $dish->protein-$old_in_Protein;
         $sugars= $dish->sugars-$old_in_Sugars;
         
        
////حساب قيمة المكون الجديدة بعد التعديل بالجرام
         ///new value to g
         if($request->new_measruingUnit=='معلقة صغيرة')
        $request->new_quantity = 5 * $request->new_quantity;

      else if($request->new_measruingUnit=='معلقة كبيرة')
         $request->new_quantity = 15 * $request->new_quantity;

      else if($request->new_measruingUnit=='كوب')
         $request->new_quantity = 180 * $request->new_quantity;

          
   ///
      $new_in_Calories= ($request->new_quantity*$ingredient->calories)/100;
      $new_in_TotalFat= ($request->new_quantity*$ingredient->totalFat)/100;
      $new_in_Cholesterol= ($request->new_quantity*$ingredient->cholesterol)/100;
      $new_in_Sodium= ($request->new_quantity*$ingredient->sodium)/100;
      $new_in_VitaminA= ($request->new_quantity*$ingredient->vitaminA)/100;
      $new_in_VitaminC= ($request->new_quantity*$ingredient->vitaminC)/100;
      $new_in_Protein= ($request->new_quantity*$ingredient->protein)/100;
      $new_in_Sugars= ($request->new_quantity*$ingredient->sugars)/100;
      
    //   echo "dish after: "
      $calories= $calories + $new_in_Calories;
      $totalFat=  $totalFat +  $new_in_TotalFat;
      $cholesterol=  $cholesterol + $new_in_Cholesterol;
      $sodium= $sodium +  $new_in_Sodium;
      $vitaminA=  $vitaminA +  $new_in_VitaminA;
      $vitaminC=  $vitaminC +  $new_in_VitaminC;
      $protein= $protein +  $new_in_Protein;
      $sugars= $sugars +  $new_in_Sugars;
      
            
    //update dish_ingredient table
    
    // $dish_ingredient = Dish_ingredients::where('dish_id',$request->dish_id)->where('ingredient_id',$request->ingredient_id)->first();
         
    Dish_ingredients::where('dish_id',$request->dish_id)
    ->where('ingredient_id',$request->ingredient_id)->update([
           
        'quantity' => $NewQuantity,
        'measruingUnit' => $request->new_measruingUnit,
        'type' => $request->type,
        
    ]);
    
    //update dish table
    ////// تعديل حقول القيم الغذائية في الطبق
    $dish->update([
           
        'calories' => $calories,
        'totalFat' => $totalFat,
        'cholesterol' => $cholesterol,
        'sodium' =>$sodium,
        'vitaminA' => $vitaminA,
        'vitaminC' =>$vitaminC,
        'protein' => $protein,
        'sugars' => $sugars,
         
    ]);

  
              
            } else {
            // تعديل النوع في جدول الكسر
            Dish_ingredients::where('dish_id',$request->dish_id)
            ->where('ingredient_id',$request->ingredient_id)->update([
                'type' => $request->type,
                
            ]);
        }
        // echo 'no';
        session()->flash('edit', 'تم تعديل المكون بنجاح');
        return back();
   }

    ////delete مكون طبق
    public function delete_dish_ingredient(Request $request)
    { 
        // return $request;
        echo  $request->quantity;
        echo '<br>';
        echo  $request->measruingUnit;
        //تحويل الكمية إلى وحدة القياس جرام
        if($request->measruingUnit=='معلقة صغيرة')
        $request->quantity = 5 *  $request->quantity;

        else if($request->measruingUnit=='معلقة كبيرة')
        $request->quantity = 15 * $request->quantity;

        else if($request->measruingUnit=='كوب')
        $request->quantity = 180 *  $request->quantity;

        echo '<br>';
        echo  $request->quantity;
        //جلب المعلومات الخاصة بالمكون من جدول المكونات
        $ingredient = ingredients::where('id', $request->ingredient_id)->first();
         ///
         $in_Calories= ($request->quantity*$ingredient->calories)/100;
         $in_TotalFat= ($request->quantity*$ingredient->totalFat)/100;
         $in_Cholesterol= ($request->quantity*$ingredient->cholesterol)/100;
         $in_Sodium= ($request->quantity*$ingredient->sodium)/100;
         $in_VitaminA= ($request->quantity*$ingredient->vitaminA)/100;
         $in_VitaminC= ($request->quantity*$ingredient->vitaminC)/100;
         $in_Protein= ($request->quantity*$ingredient->protein)/100;
         $in_Sugars= ($request->quantity*$ingredient->sugars)/100;
         
         //جلب القيم الغذائية للطبق
         $dish= dish::where('id', $request->dish_id)->first();
          //    طرح القيم الغذائية  للمكون   من القيم الغذائية للطبق 
          $calories= $dish->calories-$in_Calories;
          $totalFat= $dish->totalFat-$in_TotalFat;
          $cholesterol= $dish->cholesterol-$in_Cholesterol;
          $sodium= $dish->sodium-$in_Sodium;
          $vitaminA= $dish->vitaminA-$in_VitaminA;
          $vitaminC= $dish->vitaminC-$in_VitaminC;
          $protein= $dish->protein-$in_Protein;
          $sugars= $dish->sugars-$in_Sugars;

        //حذف مكون الطبق من جدول الكسر
          Dish_ingredients::where('dish_id',$request->dish_id)
          ->where('ingredient_id',$request->ingredient_id)->delete();
             
        //تعديل القيم الغذائية للطبق
            $dish->update([
            
                'calories' => $calories,
                'totalFat' => $totalFat,
                'cholesterol' => $cholesterol,
                'sodium' =>$sodium,
                'vitaminA' => $vitaminA,
                'vitaminC' =>$vitaminC,
                'protein' => $protein,
                'sugars' => $sugars,
                
            ]);
              

       
        //
          session()->flash('delete', 'تم حذف المكون بنجاح');

          return back();
         
    }
}
