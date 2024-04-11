<?php

namespace App\Http\Controllers;

use App\Models\Dieases_bloked_ingredient;
use App\Models\ingredients;
use App\Models\Disease;
use App\Models\Dish_ingredients;
use App\Models\Dish;
use App\Models\Step;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UsertwoController extends Controller
{
    //
        //////disease_dishes_right
        public function disease_dishes_right($id)
        { 
            // echo $id.'lll7777ll';
            $dont_eat_ingredients=[];
            $dont_eat_dishs=[];
            $eat_dishs=[];
            $diease_bloked_ingredients = Dieases_bloked_ingredient::where('disease_id',$id)->get();
            foreach($diease_bloked_ingredients as  $diease_bloked_ingredient){
                $dont_eat_ingredients[]= $diease_bloked_ingredient->ingredient_id;

                // echo $diease_bloked_ingredient->ingredient_id;
                // echo '<br>';
            }

            foreach($dont_eat_ingredients as $dont_eat_ingredient ){
                // echo $dont_eat_ingredient.'<br>';
            $dishs_ingredient=Dish_ingredients::where('ingredient_id','=', $dont_eat_ingredient)->get();
            foreach($dishs_ingredient as $dish_ingredient)
            {
                $dont_eat_dishs[]= $dish_ingredient->dish_id; 
            } 
            }
            // print_r ($dont_eat_dishs);
            // print_r( $dont_eat_ingredients);
        //   return $diease_bloked_ingredients ;
        $dishs_ingredient_all=Dish_ingredients::all();
        foreach($dishs_ingredient_all as $dish_ingredient_all){
         // echo '<br>';
         // echo $dish_ingredient_all->dish_id;
         if(!in_array($dish_ingredient_all->dish_id,$dont_eat_dishs))
         $eat_dishs[]= $dish_ingredient_all->dish_id;         
        }
        // print_r ($eat_dishs);
        $eat_dishs_unique = array_unique($eat_dishs);
        // print_r ($eat_dishs_unique);
        $right_dishs=[];
        $right_dishs_breakfast=[];
        $right_dishs_LunchDinnerMain=[];
        $right_dishs_LunchDinner=[];
        $right_dishs_sweets=[];
        $right_dishs_drink=[];

        foreach($eat_dishs_unique as $v){
         $dish= dish::where('id',$v)->where('state',1)->first();
         if( $dish)
        array_push($right_dishs,$dish);
      } 
      $breakfast="فطور";
      $LunchDinner="غداء\عشاء";
      $pattern="رئيسي";
      $pattern1="مقبلات";
      $sweets="حلويات";
    //   $drink="مشروبات";
      foreach($right_dishs as $right_dish)
      {
        if ($right_dish->type==$breakfast)
        array_push($right_dishs_breakfast,$right_dish);

    elseif($right_dish->type==$LunchDinner && $right_dish->pattern==$pattern)
        array_push($right_dishs_LunchDinnerMain,$right_dish);

    elseif($right_dish->type==$LunchDinner && $right_dish->pattern==$pattern1)
        array_push($right_dishs_LunchDinner,$right_dish);

    elseif($right_dish->type==$sweets)
        array_push($right_dishs_sweets,$right_dish);
    else 
        array_push($right_dishs_drink,$right_dish);
      }
    
      $countBreakfast= count($right_dishs_breakfast);
      $countLunchDinnerMain= count($right_dishs_LunchDinnerMain);
      $countLunchDinner= count($right_dishs_LunchDinner);
      $countSweets= count($right_dishs_sweets);
      $countDrink= count($right_dishs_drink);
      $all_right_dishs=count($right_dishs);
    
      $disease = Disease::where('id',$id )->first();

      return view('user.view_disease_dishs',compact('countBreakfast','countLunchDinnerMain','countLunchDinner','countSweets','countDrink','all_right_dishs','disease'));
        
        }


         //
     public function view_disease_breakfast_dishs($id)
     {

            $dont_eat_ingredients=[];
            $dont_eat_dishs=[];
            $eat_dishs=[];
            $diease_bloked_ingredients = Dieases_bloked_ingredient::where('disease_id',$id)->get();
            foreach($diease_bloked_ingredients as  $diease_bloked_ingredient){
                $dont_eat_ingredients[]= $diease_bloked_ingredient->ingredient_id;

                // echo $diease_bloked_ingredient->ingredient_id;
                // echo '<br>';
            }

            foreach($dont_eat_ingredients as $dont_eat_ingredient ){
                // echo $dont_eat_ingredient.'<br>';
            $dishs_ingredient=Dish_ingredients::where('ingredient_id','=', $dont_eat_ingredient)->get();
            foreach($dishs_ingredient as $dish_ingredient)
            {
                $dont_eat_dishs[]= $dish_ingredient->dish_id; 
            } 
            }
            // print_r ($dont_eat_dishs);
            // print_r( $dont_eat_ingredients);
        //   return $diease_bloked_ingredients ;
        $dishs_ingredient_all=Dish_ingredients::all();
        foreach($dishs_ingredient_all as $dish_ingredient_all){
        // echo '<br>';
        // echo $dish_ingredient_all->dish_id;
        if(!in_array($dish_ingredient_all->dish_id,$dont_eat_dishs))
        $eat_dishs[]= $dish_ingredient_all->dish_id;         
        }
        // print_r ($eat_dishs);
        $eat_dishs_unique = array_unique($eat_dishs);
        // print_r ($eat_dishs_unique);
        $right_dishs=[];
        $eastern_dishs=[];
        $western_dishs=[];
       
        foreach($eat_dishs_unique as $v){
        $dish= dish::where('id',$v)->where('state',1)->first();
        if( $dish)
        array_push($right_dishs,$dish);
    } 
        //////////////////////////////////////
        $type="فطور";
        $eastern="شرقي";
        $western="غربي";
        foreach($right_dishs as $right_dish)
        {
          if ($right_dish->type==$type)
            { 
                if($right_dish->country==$eastern)
                   array_push($eastern_dishs,$right_dish);

                elseif($right_dish->country==$western)
                    array_push($western_dishs,$right_dish);
      
            }
        }
       $disease = Disease::where('id',$id )->first();
       return view('user.view_disease_easternWestern_dishs',compact('western_dishs','eastern_dishs','disease','type'));
   
      
     }


        ////
        public function view_disease_LunchDinner_dishsMain($id)
        {
            $dont_eat_ingredients=[];
            $dont_eat_dishs=[];
            $eat_dishs=[];
            $diease_bloked_ingredients = Dieases_bloked_ingredient::where('disease_id',$id)->get();
            foreach($diease_bloked_ingredients as  $diease_bloked_ingredient){
                $dont_eat_ingredients[]= $diease_bloked_ingredient->ingredient_id;
            }

            foreach($dont_eat_ingredients as $dont_eat_ingredient ){
            $dishs_ingredient=Dish_ingredients::where('ingredient_id','=', $dont_eat_ingredient)->get();
            foreach($dishs_ingredient as $dish_ingredient)
            {
                $dont_eat_dishs[]= $dish_ingredient->dish_id; 
            } 
            }
          
        $dishs_ingredient_all=Dish_ingredients::all();
        foreach($dishs_ingredient_all as $dish_ingredient_all){
        if(!in_array($dish_ingredient_all->dish_id,$dont_eat_dishs))
        $eat_dishs[]= $dish_ingredient_all->dish_id;         
        }
        $eat_dishs_unique = array_unique($eat_dishs);
        $right_dishs=[];
        $eastern_dishs=[];
        $western_dishs=[];
       
        foreach($eat_dishs_unique as $v){
        $dish= dish::where('id',$v)->where('state',1)->first();
        if( $dish)
        array_push($right_dishs,$dish);
    } 
        //////////////////////////////////////
        $type="غداء\عشاء";
        $eastern="شرقي";
        $western="غربي";
        $pattern="رئيسي";

        foreach($right_dishs as $right_dish)
        {
          if ($right_dish->type==$type && $right_dish->pattern==$pattern)
            { 
                if($right_dish->country==$eastern)
                   array_push($eastern_dishs,$right_dish);

                elseif($right_dish->country==$western)
                    array_push($western_dishs,$right_dish);
      
            }
        }
        $disease = Disease::where('id',$id )->first();
        return view('user.view_disease_LunchDinner_easternWestern_dishs',compact('western_dishs','eastern_dishs','disease','type','pattern'));
         
        }

        ///\\\
         //
         public function view_disease_LunchDinner_dishs($id)
         {
            // return 'ooo';
            $dont_eat_ingredients=[];
            $dont_eat_dishs=[];
            $eat_dishs=[];
            $diease_bloked_ingredients = Dieases_bloked_ingredient::where('disease_id',$id)->get();
            foreach($diease_bloked_ingredients as  $diease_bloked_ingredient){
                $dont_eat_ingredients[]= $diease_bloked_ingredient->ingredient_id;

            }

            foreach($dont_eat_ingredients as $dont_eat_ingredient ){
            $dishs_ingredient=Dish_ingredients::where('ingredient_id','=', $dont_eat_ingredient)->get();
            foreach($dishs_ingredient as $dish_ingredient)
            {
                $dont_eat_dishs[]= $dish_ingredient->dish_id; 
            } 
            }
            $dishs_ingredient_all=Dish_ingredients::all();
            foreach($dishs_ingredient_all as $dish_ingredient_all){
                if(!in_array($dish_ingredient_all->dish_id,$dont_eat_dishs))
                $eat_dishs[]= $dish_ingredient_all->dish_id;         
            }
        
            $eat_dishs_unique = array_unique($eat_dishs);
            $right_dishs=[];
            $eastern_dishs=[];
            $western_dishs=[];
        
            foreach($eat_dishs_unique as $v){
            $dish= dish::where('id',$v)->where('state',1)->first();
            if( $dish)
            array_push($right_dishs,$dish);
    } 
        //////////////////////////////////////
            $type="غداء\عشاء";
            $eastern="شرقي";
            $western="غربي";
            $pattern="مقبلات";
            foreach($right_dishs as $right_dish)
            {
              if ($right_dish->type==$type && $right_dish->pattern==$pattern)
                { 
                    if($right_dish->country==$eastern)
                       array_push($eastern_dishs,$right_dish);
    
                    elseif($right_dish->country==$western)
                        array_push($western_dishs,$right_dish);
          
                }
            }
            $disease = Disease::where('id',$id )->first();
            return view('user.view_disease_LunchDinner_easternWestern_dishs',compact('western_dishs','eastern_dishs','disease','type','pattern'));
          
         }

         ////\\\\////
         //
         public function view_disease_sweets_dishs($id)
         {
            // return $id;
            $dont_eat_ingredients=[];
            $dont_eat_dishs=[];
            $eat_dishs=[];
            $diease_bloked_ingredients = Dieases_bloked_ingredient::where('disease_id',$id)->get();
            foreach($diease_bloked_ingredients as  $diease_bloked_ingredient){
                $dont_eat_ingredients[]= $diease_bloked_ingredient->ingredient_id;
            }

            foreach($dont_eat_ingredients as $dont_eat_ingredient ){
            $dishs_ingredient=Dish_ingredients::where('ingredient_id','=', $dont_eat_ingredient)->get();
            foreach($dishs_ingredient as $dish_ingredient)
            {
                $dont_eat_dishs[]= $dish_ingredient->dish_id; 
            } 
            }

            $dishs_ingredient_all=Dish_ingredients::all();
            foreach($dishs_ingredient_all as $dish_ingredient_all){
            if(!in_array($dish_ingredient_all->dish_id,$dont_eat_dishs))
            $eat_dishs[]= $dish_ingredient_all->dish_id;         
            }
            
            $eat_dishs_unique = array_unique($eat_dishs);
           
            $right_dishs=[];
            $eastern_dishs=[];
            $western_dishs=[];
        
            foreach($eat_dishs_unique as $v){
            $dish= dish::where('id',$v)->where('state',1)->first();
            if( $dish)
            array_push($right_dishs,$dish);
        } 
        //////////////////////////////////////
            $type="حلويات";
            $eastern="شرقي";
            $western="غربي";
            foreach($right_dishs as $right_dish)
            {
              if ($right_dish->type==$type)
                { 
                    if($right_dish->country==$eastern)
                       array_push($eastern_dishs,$right_dish);
    
                    elseif($right_dish->country==$western)
                        array_push($western_dishs,$right_dish);
          
                }
            }
            $disease = Disease::where('id',$id )->first();
            return view('user.view_disease_easternWestern_dishs',compact('western_dishs','eastern_dishs','disease','type'));
          
         }


        //  drinks
         //
         public function view_disease_drinks($id)
         {
            // return "uuu";
            $dont_eat_ingredients=[];
            $dont_eat_dishs=[];
            $eat_dishs=[];
            $diease_bloked_ingredients = Dieases_bloked_ingredient::where('disease_id',$id)->get();
            foreach($diease_bloked_ingredients as  $diease_bloked_ingredient){
                $dont_eat_ingredients[]= $diease_bloked_ingredient->ingredient_id;
            }

            foreach($dont_eat_ingredients as $dont_eat_ingredient ){
            $dishs_ingredient=Dish_ingredients::where('ingredient_id','=', $dont_eat_ingredient)->get();
            foreach($dishs_ingredient as $dish_ingredient)
            {
                $dont_eat_dishs[]= $dish_ingredient->dish_id; 
            } 
            }

            $dishs_ingredient_all=Dish_ingredients::all();
            foreach($dishs_ingredient_all as $dish_ingredient_all){
            if(!in_array($dish_ingredient_all->dish_id,$dont_eat_dishs))
            $eat_dishs[]= $dish_ingredient_all->dish_id;         
            }
            
            $eat_dishs_unique = array_unique($eat_dishs);
           
            $right_dishs=[];
            // $eastern_dishs=[];
            $drinks=[];
        
            foreach($eat_dishs_unique as $v){
            $dish= dish::where('id',$v)->where('state',1)->first();
            if( $dish)
            array_push($right_dishs,$dish);
        } 
        //////////////////////////////////////
        $type="مشروبات";
        foreach($right_dishs as $right_dish)
            {
              if ($right_dish->type==$type)
                { 
                array_push($drinks,$right_dish);
          
                }
            }
        $disease = Disease::where('id',$id )->first();
            
        return view('user.view_disease_drinks',compact('drinks','disease','type'));
          
         }


        //  all
        //
        public function view_disease_all_dishs($id)
        {
            // return 'll';
            $dont_eat_ingredients=[];
            $dont_eat_dishs=[];
            $eat_dishs=[];
            $diease_bloked_ingredients = Dieases_bloked_ingredient::where('disease_id',$id)->get();
            foreach($diease_bloked_ingredients as  $diease_bloked_ingredient){
                $dont_eat_ingredients[]= $diease_bloked_ingredient->ingredient_id;
            }

            foreach($dont_eat_ingredients as $dont_eat_ingredient ){
            $dishs_ingredient=Dish_ingredients::where('ingredient_id','=', $dont_eat_ingredient)->get();
            foreach($dishs_ingredient as $dish_ingredient)
            {
                $dont_eat_dishs[]= $dish_ingredient->dish_id; 
            } 
            }

            $dishs_ingredient_all=Dish_ingredients::all();
            foreach($dishs_ingredient_all as $dish_ingredient_all){
            if(!in_array($dish_ingredient_all->dish_id,$dont_eat_dishs))
            $eat_dishs[]= $dish_ingredient_all->dish_id;         
            }
            
            $eat_dishs_unique = array_unique($eat_dishs);
           
            $right_dishs=[];
            $eastern_dishs=[];
            $western_dishs=[];
        
            foreach($eat_dishs_unique as $v){
            $dish= dish::where('id',$v)->where('state',1)->first();
            if( $dish)
            array_push($right_dishs,$dish);
        } 
        //////////////////////////////////////

        $disease = Disease::where('id',$id )->first();
        return view('user.view_disease_all_dishs',compact('right_dishs','disease'));
         
        }

        //Nothfication view new dish
        public function notifications_view_dish($id)
        {
         
          $dish = dish::where('id',$id)->first();
          $steps = Step::where('dish_id',$id)->get();
          $notes = Note::where('dish_id',$id)->get();
          //Nothfication
          $get_id=DB::table('notifications')->where('data->dish_id',$id)->where('notifiable_id',auth()->user()->id)->pluck('id');

        //   return $get_id;
        //    DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        DB::table('notifications')->where('id',$get_id)->delete();
          //Nothfication end
         
          return view('user.view_dish',compact('dish','steps','notes'));
          
        }

        public function remove_all_notifications()
        {
           $user = User::find(auth()->user()->id);
           foreach($user->unreadNotifications as $notification){
            // $notification->markAsRead();
            $notification->delete();
           }

           return redirect()->back();
          
        }

}
