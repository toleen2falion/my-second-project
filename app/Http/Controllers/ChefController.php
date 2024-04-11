<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;

use App\Models\Chef;

use App\Models\Dish;

use App\Models\Step;

use App\Models\ingredients;

use App\Models\chef_attachments;

use Illuminate\Support\Facades\ChefAuth;

use Illuminate\Support\Facades\Auth;




class ChefController extends Controller
{
    //
    public function index()
    {

        // return view('admin.chefs');
        // // $chefs = chefs::all();
        $chefs = Chef::latest()->get();
        return view('admin.chefs', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    //    echo "ii";
        return view('admin.add_chef');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
       
        $request->validate([
            'chef_name'=>'required' ,
            'chef_phone'=>'required| min:10',
            'chef_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'=>'required | unique:chefs' ,
            'chef_passwoard'=>'required' ,
        ],

    
    );
        
        
  
        if ($image = $request->chef_image) {
            $destinationPath = 'image_Chef/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        
        }
    
       chef::create([
            'image' => $profileImage,
            'name' => $request->chef_name,
            'phone' => $request->chef_phone,
            'email' => $request->email,
            'password' => $request->chef_passwoard,
            'num_dishes'=>0,
         

            
       ]);


// __المرفقات

       
        if ($request->hasFile('pic')) {

            $chef_id = chef::latest()->first()->id;
            
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $chef_name = $request->chef_name;

            $attachments = new chef_attachments();
            $attachments->file_name = $file_name;
            $attachments->chef_name = $chef_name;
           
            $attachments->chef_id = $chef_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Chef_Attachments/' . $chef_name.$chef_id), $imageName);
        }




        session()->flash('Add_chef', 'تم اضافة الطاهي بنجاح');
        // return back();
       
        $chefs = chef::latest()->get();
        return view('admin.chefs', compact('chefs'));
        
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chefs  $chefs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        $chefs = chef::where('id', $id)->first();
       
        return view('admin.edit_chef', compact('chefs'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chefs  $chefs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       

        $chefs = chef::findOrFail($request->chef_id);
        
      

        // $request->validate([
        //     'chef_name'=>'required' ,
        //     'chef_phone'=>'required| min:10',
        //     'chef_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'email'=>'required | unique:chefs' ,
        //     'password'=>'required' ,
        // ],

    
    // );

  
        if ($image = $request->chef_image) {
            $destinationPath = 'image_Chef/';
            $image_name=$chefs->image;
            $image_path= 'image_Chef/'.$image_name;

            if(file_exists($image_path)){
                unlink($image_path);
            }
            
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            
        $chefs->update([
            'image' => $profileImage,]);
        
        }
        
     

        $chefs->update([
            // 'image' => $profileImage,
            'name' => $request->chef_name,
            'phone' => $request->chef_phone,
            'email' => $request->email,
            'password' => $request->password,
            
        ]);

        session()->flash('edit', 'تم تعديل الطاهي بنجاح');
        session()->flash('edit_profile', 'تم تعديل معلوماتك الشخصية بنجاح');
        return back();
      

    }
       /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chefs  $chefs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo 'ii';
        // return $id;
        //
    //     $chefs = chefs::findOrFail($request->chef_id);
           $chefs = chef::where('id', $id)->first();
      
       

        $image_name=$chefs->image;
        $image_path= 'image_Chef/'.$image_name;
        if(file_exists($image_path)){
                    unlink($image_path);
            }
      

        /////////حذف  المرفقات الخاص بالشيقف عند حذفه///////
        $attachments=chef_attachments::where('chef_id',$id)->get();
        foreach($attachments as $attachment){
             $attachment_name=$attachment->file_name;
            $attachment_path= 'Chef_Attachments/'.$chefs->name.$chefs->id.'/'. $attachment_name;
        
        
            unlink($attachment_path);
           

        }
          // ////////
        
        $chefs->delete();

      
      

        session()->flash('delete_chef', 'تم حذف الطاهي بنجاح');

        return back();
    }

    //////chef profile
    public function profile()
    {
        return view('chef.profile');
     
    }

    ///////
      //////chef dishs
      public function dishs()
      {
        $id= Auth::guard('chef')->user()->id;
        // return $id;
        $dishs = dish::where('chef_id', $id)->get();
          return view('chef.dishs',compact('dishs'));
       
      }
  
     
      ////////
      ///////
      public function add_dish()
      {
          //
        //  echo "ii";
          return view('chef.add_dish');
      }

      public function store_dish(Request $request)
      {
        //   return $request->state;
         
    //       $request->validate([
    //           'chef_name'=>'required' ,
    //           'chef_phone'=>'required| min:10',
    //           'chef_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //           'email'=>'required | unique:chefs' ,
    //           'chef_passwoard'=>'required' ,
    //       ],
  
      
    //   );
          
          
    
          if ($image = $request->dish_image) {
              $destinationPath = 'image_Dish/';
              $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
              $image->move($destinationPath, $profileImage);
          
          }
      
         
      
        
          Dish::create([
              
              'image' => $profileImage,
              'name' => $request->dish_name,
              'type' => $request->dish_type,
              'pattern' => $request->dish_pattern,
              'country' => $request->dish_country,
              'cost' => $request->dish_cost,
              'cookTime' => $request->dish_cookTime,
              'numberIndividual' => $request->dish_numberIndividual,
              'description' => $request->dish_description,
              'chef_id' => $request->chef_id,
              'state' =>  $request->state,
           
              
         ]);
  
  

  
  
  
  
          session()->flash('Add_dish', 'تم اضافة الطبق بنجاح');
          // return back();
       
          $id= Auth::guard('chef')->user()->id;
        // return $id;
        $dishs = dish::where('chef_id', $id)->get();
          return view('chef.dishs',compact('dishs'));
         
       
          
      }

      //////chef dishs steps
    //   public function steps($id)
    //   {
      
    //     return view('chef.dish_steps',compact('id'));
       
       
    //   }

    //   public function store_steps(Request $request)
    //   {
      
    // //  return $request;
    //         $request->validate([
    //             'inputs.*.content'=>'required',
    //         ],
    //         [
    //             'inputs.*.content' => 'يجب كتابة الخطوة',
    //         ]
    //         );
    //         foreach ($request->inputs as $key => $value){
    //             Step::create($value);
    //         }
    //         return back()->with('success','تمت إضافة الخطوات بنجاح');
        
       
       
    //   }
    //   //////chef dishs ingredients
    //   public function ingredients($id)
    //   {
    //      $ingredients = ingredients::all();
    //      $dish= dish::where('id', $id)->first();
    //      return view('chef.dish_ingredients', compact('ingredients','dish'));
        
       
       
    //   }
    //   public function add_ingredient_to_dish($id)
    //   {
       
    //         $ingredient = ingredients::findOrFail($id);
    //         $dish_cart = session()->get('dish_cart', []);
    //         if(isset($dish_cart[$id])) {
    //             $dish_cart[$id]['quantity']++;
    //         } else {
    //             $dish_cart[$id] = [
                 
    //                 "name" => $ingredient->name,
    //                 "servingSize" => $ingredient->servingSize,
    //                 "quantity" => 1
    //             ];
    //         }
    //         session()->put('dish_cart', $dish_cart);
    //         return redirect()->back()->with('success', 'ingredient has been added to dish_cart!');
        
       
       
    //   }


    //   public function dish_cart($d_id)
    //   {
    //     $dish= dish::where('id', $d_id)->first();
    //     return view('chef.dish_cart', compact('dish'));
        
    //   }

      
    //   public function remove(Request $request)
    // {
    //     if($request->id) {
    //         $dish_cart = session()->get('dish_cart');
    //         if(isset($dish_cart[$request->id])) {
    //             unset($dish_cart[$request->id]);
    //             session()->put('dish_cart', $dish_cart);
    //         }
    //         session()->flash('success', 'Product successfully removed!');
    //     }
    // }

     
    // public function uuu(Request $request)
    // {
    //     // $request->validate([
    //     //     'inputs.*.content'=>'required',
    //     // ],
    //     // [
    //     //     'inputs.*.content' => 'يجب كتابة الخطوة',
    //     // ]
    //     // );
    //         $totalCalories=0;
    //         $totalTotalFat=0;
    //         $totalCholesterol=0;
    //         $totalSodium=0;
    //         $totalVitaminA=0;
    //         $totalVitaminC=0;
    //         $totalProtein=0;
    //         $totalSugars=0;


    //     foreach ($request->inputs as $key => $value){
    //         // Step::create($value);
    //         // return ($request->inputs);
    //         // return ($value['servingSize']);
    //         // echo '<br>';
    //         // echo $value['servingSize'];
    //         // echo '<br>';
    //         // echo $value['ingredient_id']." ,".$value['servingSize'].",";
    //         // echo $value['measruing_unit'];
    //         // echo $value['ingredient_id'];
    //         // echo '<br>';
    //         $ingredients = ingredients::where('id', $value['ingredient_id'])->first();


    //         if($value['measruing_unit']=='معلقة صغيرة')
    //             $value['servingSize'] = 5 *  $value['servingSize'];

    //         else if($value['measruing_unit']=='معلقة كبيرة')
    //             $value['servingSize'] = 15 *  $value['servingSize'];

    //         else if($value['measruing_unit']=='كوب')
    //             $value['servingSize'] = 180 *  $value['servingSize'];
      
           
    //         echo "جرام". $value['servingSize'];
    //         echo ",";
    //         echo "<br>";
    //         echo $ingredients->name;
    //         echo ":"."<br>";
    //         echo $ingredients->servingSize;
    //         echo "<br>";
    //         echo ",colories=";
    //         echo $ingredients->calories;
    //         echo "<br>";
    //         echo "totalFat=";
    //         echo $ingredients->totalFat;
    //         echo "<br>";
    //         echo "cholesterol=";
    //         echo $ingredients->cholesterol;
    //         echo "<br>";
    //         echo "sodium=";
    //         echo $ingredients->sodium;
    //         echo "<br>";
    //         echo "vitaminA=";
    //         echo $ingredients->vitaminA;

            
    //         echo "<br>";
    //         echo "vitaminC=";
    //         echo $ingredients->vitaminC;
    //         echo "<br>";
    //         echo "vitamproteininA=";
    //         echo $ingredients->protein;
    //         echo "<br>";
    //         echo "sugars=";
    //         echo $ingredients->sugars;
    //         echo "<br>";
    //         echo "<br>";
    //         $NewCalories= ($value['servingSize']*$ingredients->calories)/100;
    //         echo "NewCalories=".$NewCalories;
    //         echo "<br>";
    //         $NewTotalFat= ($value['servingSize']*$ingredients->totalFat)/100;
    //         echo "NewTotalFat=".$NewTotalFat;
    //         echo "<br>";
    //         $NewCholesterol= ($value['servingSize']*$ingredients->cholesterol)/100;
    //         echo "NewCholesterol=".$NewCholesterol;
    //         echo "<br>";
    //         $NewSodium= ($value['servingSize']*$ingredients->sodium)/100;
    //         echo "NewSodium=".$NewSodium;
    //         echo "<br>";
    //         $NewVitaminA= ($value['servingSize']*$ingredients->vitaminA)/100;
    //         echo "NewVitaminA=".$NewVitaminA;
    //         echo "<br>";
    //         $NewVitaminC= ($value['servingSize']*$ingredients->vitaminC)/100;
    //         echo "NewVitaminC=".$NewVitaminC;
    //         echo "<br>";
    //         $NewProtein= ($value['servingSize']*$ingredients->protein)/100;
    //         echo "NewProtein=".$NewProtein;
    //         echo "<br>";
    //         $NewSugars= ($value['servingSize']*$ingredients->sugars)/100;
    //         echo "NewSugars=".$NewSugars;
            
            
    //         echo "<br>";
    //         echo "<br>";
    //         echo "<br>";
    //         echo "<br>";
    //         $totalCalories= $totalCalories + $NewCalories;
    //         $totalTotalFat= $totalTotalFat + $NewTotalFat;
    //         $totalCholesterol= $totalCholesterol + $NewCholesterol;
    //         $totalSodium= $totalSodium + $NewSodium;
    //         $totalVitaminA= $totalVitaminA + $NewVitaminA;
    //         $totalVitaminC= $totalVitaminC + $NewVitaminC;
    //         $totalProtein= $totalProtein + $NewProtein;
    //         $totalSugars= $totalSugars + $NewSugars;
        
    //     }
    //     // return back()->with('success','تمت إضافة الخطوات بنجاح');
    //     echo "<br>";
    //     echo  $totalCalories;
    //     echo "<br>";
    //     echo $totalTotalFat;
    //     echo "<br>";
    //     echo  $totalCholesterol;
    //     echo "<br>";
    //     echo  $totalSodium;
    //     echo "<br>";
    //     echo  $totalVitaminA;
    //     echo "<br>";
    //     echo  $totalVitaminC;
    //     echo "<br>";
    //     echo   $totalProtein;
    //     echo "<br>";
    //     echo  $totalSugars;
    // }

      

}

