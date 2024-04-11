<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ingredients;

use App\Models\Dish_ingredients;

use App\Models\Chef;

use App\Models\Dish;

use App\Models\Step;

use App\Models\Note;

use App\Models\Disease;

class UserController extends Controller
{
    //
    public function view_chef()
    {
        $chefs = Chef::latest()->get();
      
        return view('user.view_chef',compact('chefs'));
     
    }

     //
     public function view_chef_dishs($id)
     {
        $breakfast="فطور";
        // $dishs = dish::where('chef_id', $id)->get();
        $chef = Chef::where('id',$id)->first();
        $breakfast_dishs = dish::where('chef_id',$id)->where('type',$breakfast)
        ->where('state',1)->count();
        // return $breakfast_dishs;
        $LunchDinner="غداء\عشاء";
        $pattern="رئيسي";
        $LunchDinner_dishsMain = dish::where('chef_id',$id)->where('type',$LunchDinner)
        ->where('pattern',$pattern)->where('state',1)->count();

         //
         $pattern1="مقبلات";
         $LunchDinner_dishs = dish::where('chef_id',$id)->where('type',$LunchDinner)
         ->where('pattern',$pattern1)->where('state',1)->count();
         //
         $sweets="حلويات";
         $sweets_dishs = dish::where('chef_id',$id)->where('type',$sweets)
         ->where('state',1)->count();

          //
          $drink="مشروبات";
          $drinks = dish::where('chef_id',$id)->where('type',$drink)
          ->where('state',1)->count();

          //
          $all_dishs = dish::where('chef_id',$id)->where('state',1)->count();

 
        return view('user.view_chef_dishs',compact('all_dishs','drinks','sweets_dishs','LunchDinner_dishs','LunchDinner_dishsMain','breakfast_dishs','chef'));
      
      
     }

     //
     public function view_chef_breakfast_dishs($id)
     {
        $type="فطور";
        $eastern="شرقي";
        $chef = Chef::where('id',$id)->first();
        $eastern_dishs = dish::where('chef_id',$id)->where('type',$type)
        ->where('state',1)->where('country',$eastern)->get();

        $western="غربي";
        $western_dishs = dish::where('chef_id',$id)->where('type',$type)
        ->where('state',1)->where('country',$western)->get();

      //   return $western_dishs;
        return view('user.view_chef_easternWestern_dishs',compact('western_dishs','eastern_dishs','chef','type'));
      
     }

      //
      public function view_chef_BreakfastDish($id)
      {
        $dish = dish::where('id',$id)->first();
        $steps = Step::where('dish_id',$id)->get();
        $notes = Note::where('dish_id',$id)->get();
       
        return view('user.view_dish',compact('dish','steps','notes'));
        //  $breakfast="فطور";
        //  $eastern="شرقي";
        //  $chef = Chef::where('id',$id)->first();
        //  $breakfast_dishs_eastern = dish::where('chef_id',$id)->where('type',$breakfast)
        //  ->where('state',1)->where('country',$eastern)->get();
        //  // return $breakfast_dishs_eastern;
        //  return view('user.view_chef_breakfast_dishs',compact('breakfast_dishs_eastern','chef'));
       
      }

        //
     public function view_chef_LunchDinner_dishsMain($id)
     {
        $type="غداء\عشاء";
        $eastern="شرقي";
        $pattern="رئيسي";
        $chef = Chef::where('id',$id)->first();
        $eastern_dishs = dish::where('chef_id',$id)->where('type',$type)
        ->where('pattern',$pattern)->where('state',1)->where('country',$eastern)->get();

        $western="غربي";
        $western_dishs = dish::where('chef_id',$id)->where('type',$type)
        ->where('pattern',$pattern)->where('state',1)->where('country',$western)->get();

      //   return $western_dishs;
        return view('user.view_chef_LunchDinner_easternWestern_dishs',compact('western_dishs','eastern_dishs','chef','type','pattern'));
      
     }

         //
         public function view_chef_LunchDinner_dishs($id)
         {
            $type="غداء\عشاء";
            $eastern="شرقي";
            $pattern="مقبلات";
            $chef = Chef::where('id',$id)->first();
            $eastern_dishs = dish::where('chef_id',$id)->where('type',$type)
            ->where('pattern',$pattern)->where('state',1)->where('country',$eastern)->get();
    
            $western="غربي";
            $western_dishs = dish::where('chef_id',$id)->where('type',$type)
            ->where('pattern',$pattern)->where('state',1)->where('country',$western)->get();
    
          //   return $western_dishs;
            return view('user.view_chef_LunchDinner_easternWestern_dishs',compact('western_dishs','eastern_dishs','chef','type','pattern'));
          
         }

           //
           public function view_chef_sweets_dishs($id)
           {
              $type="حلويات";
              $eastern="شرقي";
              
              $chef = Chef::where('id',$id)->first();
              $eastern_dishs = dish::where('chef_id',$id)->where('type',$type)
              ->where('state',1)->where('country',$eastern)->get();
      
              $western="غربي";
              $western_dishs = dish::where('chef_id',$id)->where('type',$type)
              ->where('state',1)->where('country',$western)->get();
      
            //   return $western_dishs;
              return view('user.view_chef_easternWestern_dishs',compact('western_dishs','eastern_dishs','chef','type'));
            
           }

           //
           public function view_chef_drinks($id)
           {
              $type="مشروبات";
             
              
              $chef = Chef::where('id',$id)->first();

              $drinks = dish::where('chef_id',$id)->where('type',$type)
              ->where('state',1)->get();
      
            //   return $western_dishs;
              return view('user.view_chef_drinks',compact('drinks','chef','type'));
            
           }

            //
            public function view_chef_all_dishs($id)
            {
               $chef = Chef::where('id',$id)->first();
 
               $all_dishs = dish::where('chef_id',$id)->where('state',1)->get();
       
             //   return $western_dishs;
               return view('user.view_chef_all_dishs',compact('all_dishs','chef'));
             
            }

             //home page 
             public function view_breakfast_dishs()
             {
                
              $type="فطور";
              $eastern="شرقي";
            
              $eastern_dishs = dish::where('type',$type)->where('state',1)
              ->where('country',$eastern)->get();
      
              $western="غربي";
              $western_dishs = dish::where('type',$type)->where('state',1)
              ->where('country',$western)->get();
      
            //   return $western_dishs;
              return view('user.view_easternWestern_dishs',compact('western_dishs','eastern_dishs','type'));
            
              
             }

               //
         public function view_LunchDinner_dishsMain()
         {
            $type="غداء\عشاء";
            $eastern="شرقي";
            $pattern="رئيسي";
           
            $eastern_dishs = dish::where('type',$type)
            ->where('pattern',$pattern)->where('state',1)->where('country',$eastern)->get();
    
            $western="غربي";
            $western_dishs = dish::where('type',$type)
            ->where('pattern',$pattern)->where('state',1)->where('country',$western)->get();
    
          //   return $western_dishs;
            return view('user.view_LunchDinner_easternWestern_dishs',compact('western_dishs','eastern_dishs','type','pattern'));
          
         }

              //
              public function view_LunchDinner_dishs()
              {
                 $type="غداء\عشاء";
                 $eastern="شرقي";
                 $pattern="مقبلات";
                
                 $eastern_dishs = dish::where('type',$type)
                 ->where('pattern',$pattern)->where('state',1)->where('country',$eastern)->get();
         
                 $western="غربي";
                 $western_dishs = dish::where('type',$type)
                 ->where('pattern',$pattern)->where('state',1)->where('country',$western)->get();
         
               //   return $western_dishs;
               return view('user.view_LunchDinner_easternWestern_dishs',compact('western_dishs','eastern_dishs','type','pattern'));
               
              }

                //
           public function view_sweets_dishs()
           {
              $type="حلويات";
              $eastern="شرقي";
              
              $eastern_dishs = dish::where('type',$type)
              ->where('state',1)->where('country',$eastern)->get();
      
              $western="غربي";
              $western_dishs = dish::where('type',$type)
              ->where('state',1)->where('country',$western)->get();
      
            //   return $western_dishs;
              return view('user.view_easternWestern_dishs',compact('western_dishs','eastern_dishs','type'));
            
           }

            //
            public function view_drinks()
            {
               $type="مشروبات";
              
               $drinks = dish::where('type',$type)
               ->where('state',1)->get();
       
             //   return $western_dishs;
               return view('user.view_drinks',compact('drinks','type'));
             
            }

              //
              public function view_all_dishs()
              {
                
                 $all_dishs = dish::where('state',1)->get();
         
               //   return $western_dishs;
                 return view('user.view_all_dishs',compact('all_dishs'));
               
              }

              //search
              public function chef_search(Request $request)
              {

                  // return $request->name;
                  $chefs = Chef::where('name', 'LIKE', "%" . $request->name . "%")->get();
                  // // $student = Student::where('name', 'LIKE', "%" . $request->name . "%")
                  // // ->where('email', 'LIKE', "%" . $request->email . "%")
                  // // ->where('course', 'LIKE', "%" . $request->course . "%")->paginate(10);
                
                  // return  $chefs;
                  return view('user.search.view_chef',compact('chefs'));
              }


              //

              public function chef_dishs_search(Request $request)
              {
                   
                if($request->type=="فطور")
                  $type="فطور";
                elseif($request->type=="غداء\عشاء")
                  $type="غداء\عشاء";
                elseif($request->type=="حلويات")
                  $type="حلويات";
                else
                  $type="مشروبات";
                
                  // return $request->type;
                $eastern="شرقي";
                $western="غربي";
                $cost=$request->cost;
                $cookTime=$request->cookTime;
                $numberIndividual=$request->numberIndividual;
                $calories=$request->calories;
                $max_calories=$request->max_calories;
                $chef = Chef::where('id',$request->chef_id)->first();
                
                if(($request->calories)&&(!$request->max_calories))
                 {
                   if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }
/////////////
                 elseif($request->max_calories){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }

/////////
                 elseif((!$request->calories)&&(!$request->max_calories)){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }
               ///////
       return view('user.view_chef_easternWestern_dishs',compact('western_dishs','eastern_dishs','chef','type'));
                
              }



              ////chef_drinks_search
              public function chef_drinks_search(Request $request)
              {
                  //  return"kk";
    
                $type=$request->type;
                  // return $type;
                $cost=$request->cost;
                $cookTime=$request->cookTime;
                $numberIndividual=$request->numberIndividual;
                $calories=$request->calories;
                $max_calories=$request->max_calories;
                $chef = Chef::where('id',$request->chef_id)->first();
                
                if(($request->calories)&&(!$request->max_calories))
                 {
                   if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                  
                 }
/////////////
                 elseif($request->max_calories){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                  
                 }

/////////
                 elseif((!$request->calories)&&(!$request->max_calories)){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                  
                 }
               ///////
               return view('user.view_chef_drinks',compact('drinks','chef','type'));
                
              }



              ////////LunchDinner_dishs_search//////
              public function chef_LunchDinner_dishs_search(Request $request)
              { 
                // return $request->pattern;
                
                $type=$request->type;
                $pattern=$request->pattern;
                  // return $request->type;
                $eastern="شرقي";
                $western="غربي";
                $cost=$request->cost;
                $cookTime=$request->cookTime;
                $numberIndividual=$request->numberIndividual;
                $calories=$request->calories;
                $max_calories=$request->max_calories;
                $chef = Chef::where('id',$request->chef_id)->first();
                
                if(($request->calories)&&(!$request->max_calories))
                 {
                   if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }
/////////////
                 elseif($request->max_calories){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }

/////////
                 elseif((!$request->calories)&&(!$request->max_calories)){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('chef_id',$request->chef_id)
                    ->where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }
               ///////
               return view('user.view_chef_LunchDinner_easternWestern_dishs',compact('western_dishs','eastern_dishs','chef','type','pattern'));
                
              }

   //home page 
/////////////////////////////////
  public function dishs_search(Request $request)
              {
                 
                if($request->type=="فطور")
                  $type="فطور";
                elseif($request->type=="غداء\عشاء")
                  $type="غداء\عشاء";
                elseif($request->type=="حلويات")
                  $type="حلويات";
                else
                  $type="مشروبات";
                
                  // return $request->type;
                $eastern="شرقي";
                $western="غربي";
                $cost=$request->cost;
                $cookTime=$request->cookTime;
                $numberIndividual=$request->numberIndividual;
                $calories=$request->calories;
                $max_calories=$request->max_calories;
              
                if(($request->calories)&&(!$request->max_calories))
                 {
                   if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }
/////////////
                 elseif($request->max_calories){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }

/////////
                 elseif((!$request->calories)&&(!$request->max_calories)){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('type',$type)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('type',$type)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }
               ///////
       return view('user.view_easternWestern_dishs',compact('western_dishs','eastern_dishs','type'));
                
              }

              ///\\\\\
   ////drinks_search
              public function drinks_search(Request $request)
              {
                  //  return"kk";
    
                $type=$request->type;
                  // return $type;
                $cost=$request->cost;
                $cookTime=$request->cookTime;
                $numberIndividual=$request->numberIndividual;
                $calories=$request->calories;
                $max_calories=$request->max_calories;
              
                
                if(($request->calories)&&(!$request->max_calories))
                 {
                   if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                  
                 }
/////////////
                 elseif($request->max_calories){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                  
                 }

/////////
                 elseif((!$request->calories)&&(!$request->max_calories)){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $drinks = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('type',$type)
                    ->where('state',1)
                    ->get();
                   }
                  
                 }
               ///////
               return view('user.view_drinks',compact('drinks','type'));
                
              }

//\\//\\//\\//\\//\\//\\//\\
    ////////LunchDinner_dishs_search_home//////
              public function LunchDinner_dishs_search(Request $request)
              { 
                // return $request->pattern;
                
                $type=$request->type;
                $pattern=$request->pattern;
                  // return $request->type;
                $eastern="شرقي";
                $western="غربي";
                $cost=$request->cost;
                $cookTime=$request->cookTime;
                $numberIndividual=$request->numberIndividual;
                $calories=$request->calories;
                $max_calories=$request->max_calories;
               
                if(($request->calories)&&(!$request->max_calories))
                 {
                   if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','=',$request->calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }
/////////////
                 elseif($request->max_calories){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('calories','<=', $request->max_calories)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }

/////////
                 elseif((!$request->calories)&&(!$request->max_calories)){
                  if(($request->cookTime)&&($request->numberIndividual))
                   {
                    // echo "ps";
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    
                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&($request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('numberIndividual','=', $request->numberIndividual)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif(($request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('cookTime','<=', $request->cookTime)
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                   elseif((!$request->cookTime)&&(!$request->numberIndividual))
                   {
                    $eastern_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$eastern)
                    ->get();

                    $western_dishs = dish::where('cost', 'LIKE', "%" . $request->cost. "%")
                    ->where('type',$type)->where('pattern',$pattern)
                    ->where('state',1)->where('country',$western)
                    ->get();
                   }
                  
                 }
               ///////
               return view('user.view_LunchDinner_easternWestern_dishs',compact('western_dishs','eastern_dishs','type','pattern'));
                
              }


////\/\/\
              //search
              public function all_dishName_search(Request $request)
              {

                  // return $request->name;
                  $all_dishs = dish::where('name', 'LIKE', "%" . $request->name . "%")
                  ->where('state',1)->get();
                  // // $student = Student::where('name', 'LIKE', "%" . $request->name . "%")
                  // // ->where('email', 'LIKE', "%" . $request->email . "%")
                  // // ->where('course', 'LIKE', "%" . $request->course . "%")->paginate(10);
                
                  // return  $chefs;
                  // return view('user.search.view_chef',compact('chefs'));
                  return view('user.view_all_dishs',compact('all_dishs'));
              }

               //search
               public function chef_all_dishName_search(Request $request)
               {
 
                  //  return $request->chef_id;
                  $chef = Chef::where('id',$request->chef_id)->first();
                   $all_dishs = dish::where('chef_id',$request->chef_id)->where('name', 'LIKE', "%" . $request->name . "%")
                   ->where('state',1)->get();
                   // // $student = Student::where('name', 'LIKE', "%" . $request->name . "%")
                   // // ->where('email', 'LIKE', "%" . $request->email . "%")
                   // // ->where('course', 'LIKE', "%" . $request->course . "%")->paginate(10);
                 
                   // return  $chefs;
                   return view('user.view_chef_all_dishs',compact('all_dishs','chef'));
                   
               }
               /////
                 //today_recipe
                 public function today_recipe()
                 {
                  $ingredients = ingredients::all();
                  return view('user.today_recipe',compact('ingredients'));
                     
                 }

                 //
                 public function add_ingredient_to_today_recipe_cart($id)
                 {
                  
                       $ingredient = ingredients::findOrFail($id);
                       $today_recipe_cart = session()->get('today_recipe_cart', []);
                       if(isset($today_recipe_cart[$id])) {
                           $today_recipe_cart[$id]['quantity']++;
                       } else {
                           $today_recipe_cart[$id] = [
                            
                               "name" => $ingredient->name,
                              //  "servingSize" => $ingredient->servingSize,
                               "quantity" => 1
                           ];
                       }
                       session()->put('today_recipe_cart', $today_recipe_cart);
                       return redirect()->back()->with('success', 'ingredient has been added to today_recipe_cart!');
                  
                 }
                 //
                 public function today_recipe_cart()
                 {
                  // return "kkk";
                   return view('user.today_recipe_cart');
                   
                 }
                 //
                 public function remove(Request $request)
                 {
                     if($request->id) {
                         $today_recipe_cart = session()->get('today_recipe_cart');
                         if(isset($today_recipe_cart[$request->id])) {
                             unset($today_recipe_cart[$request->id]);
                             session()->put('today_recipe_cart', $today_recipe_cart);
                         }
                         session()->flash('success', 'Product successfully removed!');
                     }
                 }
                 ///
                 public function checkout(Request $request)
                 { 
                  // العمل تتمة 
                  $ingredient_dishs=[];

                  foreach ($request->inputs as $key => $value){
                    // $ingredient = ingredients::where('id', $value['ingredient_id'])->first();
                    $dishs_ingredient=Dish_ingredients::where('ingredient_id', $value['ingredient_id'])->get();
                    foreach($dishs_ingredient as  $dish_ingredient)
                    $ingredient_dishs[]= $dish_ingredient->dish_id;
                  }
                  //
                  $ingredient_dishs_unique = array_unique($ingredient_dishs);
                  // print_r($ingredient_dishs_unique);
                  
                   $dishs=[];

                  // الأطباق التي تحتوي على أحد هذه المكونات
                foreach($ingredient_dishs_unique as $v){
                   $dish= dish::where('id',$v)->first();
                  array_push($dishs,$dish);
                } 

                //الأطباق الأكثر تطابقا
                $dishs_maxVal=[];
                $values = array_count_values($ingredient_dishs);
                arsort($values);
                foreach($values as $value)
                { $v= $value;
                break;
                }
                foreach($values as $key=>$value)
                {
                    if ($value==$v)
                    // echo "l";
                   {
                    $dish_maxVal= dish::where('id',$key)->first();
                    array_push($dishs_maxVal,$dish_maxVal);
                   }
                }
                // return $dishs_maxVal;
                // $v=array_keys($values);
                // $max = max($ingredient_dishs_num);
                // $maxVal = array_search($max, $ingredient_dishs_num);
                // foreach( $ingredient_dishs_num as  $ingredient_dish_num)
                // echo  array_search($ingredient_dish_num, $ingredient_dishs_num);
               

                 return view('user.dishs_today_recipe', compact('dishs','dishs_maxVal'));
                  // echo count($dishs);
                
                // foreach($ingredient_dishs as $ingredient_dish)
                //  print_r($ingredient_dishs);
                // // echo $ingredient_dish;
                // echo '<br>';
                // // $dish= dish::all()->where('id',isset($ingredient_dishs));
                  
                // echo $dish;
                // echo '<br>';
                // // }
                // echo count($dish);
                //   echo '<br>';
                //  print_r($ingredient_dishs);
                //  echo count($ingredient_dishs);
                //  for($i=0;$i<count($ingredient_dishs);$i++){
                //  echo $ingredient_dishs[$i].'<br>';  echo '<br>';
                //  $values = array_count_values($ingredient_dishs);
                //  print_r($values);
                //  echo '<br>';
               }
          


               //\//\
                //dont_eat
              public function dont_eat()
              {
                $ingredients = ingredients::all();
                return view('user.dont_eat',compact('ingredients'));
              
              }

                //dont_eat_cart
                public function add_ingredient_to_dont_eat_cart($id)
                {
                 
                      $ingredient = ingredients::findOrFail($id);
                      $dont_eat_cart = session()->get('dont_eat_cart', []);
                      if(isset($dont_eat_cart[$id])) {
                          $dont_eat_cart[$id]['quantity']++;
                      } else {
                          $dont_eat_cart[$id] = [
                           
                              "name" => $ingredient->name,
                             //  "servingSize" => $ingredient->servingSize,
                              "quantity" => 1
                          ];
                      }
                      session()->put('dont_eat_cart', $dont_eat_cart);
                      return redirect()->back()->with('success', 'ingredient has been added to dont_eat_cart!');
                 
                }
                //
                //
                public function dont_eat_cart()
                {
                 // return "kkk";
                  return view('user.dont_eat_cart');
                  
                }
                //
                  //
                  public function remove_from_dont_eat_cart(Request $request)
                  {
                      if($request->id) {
                          $dont_eat_cart = session()->get('dont_eat_cart');
                          if(isset($dont_eat_cart[$request->id])) {
                              unset($dont_eat_cart[$request->id]);
                              session()->put('dont_eat_cart', $dont_eat_cart);
                          }
                          session()->flash('success', 'Product successfully removed!');
                      }
                  }
                  ///

                  // تتتتتت
                   ///
                 public function checkout_dont_eat_cart(Request $request)
                 { 

                    // return 'yy';
                  $dont_eat_dishs=[];
                  $eat_dishs=[];

                  foreach ($request->inputs as $key => $value){
                    $ingredients = ingredients::where('name', 'LIKE', "%" . $value['name'] . "%")->get();
                      foreach($ingredients as $ingredient){
                      // echo  $ingredient->name;
                      // echo "<br>";
                      // echo  $ingredient->id;
                      // echo "<br>";
                    $dishs_ingredient=Dish_ingredients::where('ingredient_id','=', $ingredient->id)->get();
                      foreach($dishs_ingredient as $dish_ingredient)
                      {
                        // echo  $dish_ingredient->dish_id;echo '<br>';
                      // // $dish= dish::where('id',$v)->first();
                      $dont_eat_dishs[]= $dish_ingredient->dish_id; 
                      } 
                    }
                    
                  } 
                // print_r ($dont_eat_dishs);
                 $dishs_ingredient_all=Dish_ingredients::all();
                 foreach($dishs_ingredient_all as $dish_ingredient_all){
                  // echo '<br>';
                  // echo $dish_ingredient_all->dish_id;
                  if(!in_array($dish_ingredient_all->dish_id,$dont_eat_dishs))
                  $eat_dishs[]= $dish_ingredient_all->dish_id; 
                  

                 }
                //  print_r($eat_dishs);
                 $eat_dishs_unique = array_unique($eat_dishs);
                //  print_r($eat_dishs_unique);
                 ///eat_dishs_unique تحتوي على أرقام الأطباق المناسبة
                 $right_dishs=[];
                 foreach($eat_dishs_unique as $v){
                  $dish= dish::where('id',$v)->where('state',1)->first();
                  if( $dish)
                 array_push($right_dishs,$dish);
               } 
                // return $right_dishs;
                //  echo count($right_dishs);
                

                 return view('user.dishs_right_for_you', compact('right_dishs'));
                  
                
               }
          


                //diseases
                public function diseases()
                {
                  // return 999;
                 $diseases = Disease::all();
                 return view('user.diseases',compact('diseases'));
                    
                }


                  //////disease_bloked_ingredients
                public function disease_bloked_ingredients($id)
                  { 
                      // echo $id.'lllll';
                    //   echo $id;
        
                    $disease= Disease::where('id', $id)->first();
                
                    return view('user.diease_bloked_ingredient', compact('disease'));
                  
                  }


                
         }
















