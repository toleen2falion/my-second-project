<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Follow_chef;

use App\Models\Dish;

use App\Models\Chef;

use App\Models\Step;

use App\Models\Note;

use App\Models\Dish_ingredients;

use App\Models\ingredients;

use App\Models\chef_attachments;

use Illuminate\Support\Facades\ChefAuth;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Notification;

use App\Notifications\PublishDish;




class DishController extends Controller
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
    public function show(Dish $dish)
    {
        //
    }

    ///

    public function update_dish_info(Request $request)
    {
        //  return $request;

    $dish = dish::findOrFail($request->dish_id);

        if($request->dish_cookTime == 0 ){
        
             $dish->update([
            'type' => $request->dish_type,
            'pattern' => $request->dish_pattern,
            'country' => $request->dish_country,
            'cost' => $request->dish_cost,
            'numberIndividual' => $request->dish_numberIndividual,
            'description' => $request->dish_description,
            
        ]);
            
        }

    else { 
        $dish->update([
            'type' => $request->dish_type,
            'pattern' => $request->dish_pattern,
            'country' => $request->dish_country,
            'cost' => $request->dish_cost,
            'cookTime' => $request->dish_cookTime,
            'numberIndividual' => $request->dish_numberIndividual,
            'description' => $request->dish_description,
            
        ]);

       }

      session()->flash('edit', 'تم تعديل الطبق بنجاح');
      return back();
        

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    //    return $id;
        $dish = dish::where('id', $id)->first();
       
        return view('chef.edit_dish', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    //   return $request;

        $dish = dish::findOrFail($request->dish_id);
        
    //     // $request->validate([
    //     //     'chef_name'=>'required' ,
    //     //     'chef_phone'=>'required| min:10',
    //     //     'chef_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     //     'email'=>'required | unique:chefs' ,
    //     //     'password'=>'required' ,
    //     // ],

    
    // // );

  
        if ($image = $request->dish_image) {
            $destinationPath = 'image_Dish/';
            $image_name=$dish->image;
            $image_path= 'image_Dish/'.$image_name;

            if(file_exists($image_path)){
                unlink($image_path);
            }
            
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            
        $dish->update([
            'image' => $profileImage,]);
        
        }
        
     

        $dish->update([
            // 'image' => $profileImage,
            'name' => $request->dish_name,
            
            
        ]);

        session()->flash('edit', 'تم تعديل الطبق بنجاح');
   
        return back();
      

    }

    /**
     * Remove the specified resource from storage.
     *////////////////////
     public function destroy(Request $request)
    {
       
       
        //
        $dish = dish::where('id',$request->dish_id)->first();
    //    return  $dish;
      
        $image_name=$dish->image;
        $image_path= 'image_Dish/'.$image_name;
        if(file_exists($image_path)){
                    unlink($image_path);
            }
      
        
        $dish->delete();

      
        session()->flash('delete', 'تم حذف الطبق بنجاح');

        return back();
    }
    /////////////////////


     ///////DishDetails
     public function DishDetails($id)
     {
        $dish = dish::where('id', $id)->first();
        $steps = Step::where('dish_id',$id)->get();
        $notes = Note::where('dish_id',$id)->get();
        $ingredients = Dish_ingredients::where('dish_id',$id)->get();

        return view('chef.dish_details',compact('dish','steps','ingredients','notes'));
      
     }


     public function edit_dish_state($id)
     {
       
        $dish = dish::where('id', $id)->first();
        $chef = chef::where('id', $dish->chef_id)->first(); 
        // return $dish;
        if($dish->state==0){
       $dish->update([
        'state' =>'1', 
        ]);
        
        $chef->update([
            'num_dishes' =>$chef->num_dishes+1, 
            ]);
        }
        else{
            $dish->update([
                'state' =>'0', 
                ]);

            $chef->update([
                'num_dishes' =>$chef->num_dishes-1, 
                ]);
            
        }
        // session()->flash('edit', 'تم تعديل حالة الطبق بنجاح');

         // Notifications
        // UsersFollowChef تم تخزين فيها ارقام المستخدمين الذين يتابعون الشيف الذي نشر الطبق
        $UsersFollowChef=[];
        $users_follow=[];
        if($dish->state==1){
        $users_Follow_chef=Follow_chef::where('chef_id',$dish->chef_id)->get();
        foreach($users_Follow_chef as $user)
            {
            $UsersFollowChef[]= $user->user_id; 
            } 
        // return $dish->chef_id;
        // users الحصول على المستخدمين من جدول المستخدمين
        $users=[];
        foreach($UsersFollowChef as $u){
         $user= User::where('id',$u)->first();
        array_push($users,$user);
      } 

      Notification::send($users, new PublishDish($dish->id,$chef->name,$dish->name));
    //   return $chef->name;
        }
         
        // $users=User::
        // Notification::send();
        // Notifications END
   
        return back();

     }
}
