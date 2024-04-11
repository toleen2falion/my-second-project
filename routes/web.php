<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ChefAttachmentsController;
use App\Http\Controllers\DoctorAttachmentsController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\DishIngredientsController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DieasesBlokedIngredientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsertwoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\FollowChefController;
use App\Http\Controllers\ProfileTwoController;
use App\Http\Controllers\UserDiseasesController;
use App\Http\Controllers\UserBlokedIngredientsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
//
Route::get('/home/chefs', [UserController::class, 'view_chef']);
Route::get('/home/chefs/view_chef_dishs/{id}', [UserController::class, 'view_chef_dishs']);
Route::get('/home/chefs/view_chef_breakfast_dishs/{id}', [UserController::class, 'view_chef_breakfast_dishs']);
Route::get('/home/chefs/view_chef_BreakfastDish/{id}', [UserController::class, 'view_chef_BreakfastDish']);
//
Route::get('/home/chefs/view_chef_LunchDinner_dishsMain/{id}', [UserController::class, 'view_chef_LunchDinner_dishsMain']);
Route::get('/home/chefs/view_chef_LunchDinner_dishs/{id}', [UserController::class, 'view_chef_LunchDinner_dishs']);
Route::get('/home/chefs/view_chef_sweets_dishs/{id}', [UserController::class, 'view_chef_sweets_dishs']);
Route::get('/home/chefs/view_chef_drinks/{id}', [UserController::class, 'view_chef_drinks']);
Route::get('/home/chefs/view_chef_all_dishs/{id}', [UserController::class, 'view_chef_all_dishs']);
///
///home page
Route::get('/home/view_breakfast_dishs', [UserController::class, 'view_breakfast_dishs']);
Route::get('/home/view_LunchDinner_dishsMain', [UserController::class, 'view_LunchDinner_dishsMain']);
Route::get('/home/view_LunchDinner_dishs', [UserController::class, 'view_LunchDinner_dishs']);
Route::get('/home/view_sweets_dishs', [UserController::class, 'view_sweets_dishs']);
Route::get('/home/view_drinks', [UserController::class, 'view_drinks']);
Route::get('/home/view_all_dishs', [UserController::class, 'view_all_dishs']);
///
//search
Route::get('/home/chefs/search', [UserController::class, 'chef_search'])->name('chef_search');
Route::get('/home/chefs/dishs_search', [UserController::class, 'chef_dishs_search'])->name('chef_dishs_search');
Route::get('/home/chefs/drinks_search', [UserController::class, 'chef_drinks_search'])->name('chef_drinks_search');
Route::get('/home/chefs/LunchDinner_dishs_search', [UserController::class, 'chef_LunchDinner_dishs_search'])->name('chef_LunchDinner_dishs_search');
Route::get('/home/dishs_search', [UserController::class, 'dishs_search'])->name('dishs_search');
Route::get('/home/drinks_search', [UserController::class, 'drinks_search'])->name('drinks_search');
Route::get('/home/LunchDinner_dishs_search', [UserController::class, 'LunchDinner_dishs_search'])->name('LunchDinner_dishs_search');
Route::get('/home/all_dishName_search', [UserController::class, 'all_dishName_search'])->name('all_dishName_search');
Route::get('/home/chefs/all_dishName_search', [UserController::class, 'chef_all_dishName_search'])->name('chef_all_dishName_search');
///
///today_recipe
Route::get('/home/today_recipe', [UserController::class, 'today_recipe']);
Route::get('/home/add_ingredient_to_today_recipe_cart/{id}', [UserController::class, 'add_ingredient_to_today_recipe_cart']);
Route::get('/home/today_recipe_cart', [UserController::class, 'today_recipe_cart']);
Route::delete('/home/remove_from_today_recipe_cart', [UserController::class, 'remove'])->name('remove_from_today_recipe_cart');
Route::post('/home/checkout', [UserController::class, 'checkout'])->name('checkout');
////
///dont_eat
Route::get('/home/dont_eat', [UserController::class, 'dont_eat']);
Route::get('/home/add_ingredient_to_dont_eat_cart/{id}', [UserController::class, 'add_ingredient_to_dont_eat_cart']);
Route::get('/home/dont_eat_cart', [UserController::class, 'dont_eat_cart']);
Route::delete('/home/remove_from_dont_eat_cart', [UserController::class, 'remove_from_dont_eat_cart'])->name('remove_from_dont_eat_cart');
Route::post('/home/checkout_dont_eat_cart', [UserController::class, 'checkout_dont_eat_cart'])->name('checkout_dont_eat_cart');
//
///diseases
Route::get('/home/diseases', [UserController::class, 'diseases']);

Route::get('/home/disease/bloked_ingredients/{id}', [UserController::class, 'disease_bloked_ingredients']);

Route::get('/home/disease/dishes_right/{id}', [UsertwoController::class, 'disease_dishes_right']);
///diseases category
Route::get('/home/diseases/view_disease_breakfast_dishs/{id}', [UsertwoController::class, 'view_disease_breakfast_dishs']);

Route::get('/home/diseases/view_disease_LunchDinner_dishsMain/{id}', [UsertwoController::class, 'view_disease_LunchDinner_dishsMain']);

Route::get('/home/diseases/view_disease_LunchDinner_dishs/{id}', [UsertwoController::class, 'view_disease_LunchDinner_dishs']);

Route::get('/home/diseases/view_disease_sweets_dishs/{id}', [UsertwoController::class, 'view_disease_sweets_dishs']);

Route::get('/home/diseases/view_disease_drinks/{id}', [UsertwoController::class, 'view_disease_drinks']);

Route::get('/home/diseases/view_disease_all_dishs/{id}', [UsertwoController::class, 'view_disease_all_dishs']);
///

// ///page welcome type user
Route::get('/welcome', function () {
    return view('welcome');
});
// ///

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

////userRegistered
//comment
Route::get('/userRegistered/dashboard/add_comment', [CommentController::class, 'add_comment'])->middleware(['auth', 'verified']);

Route::post('/userRegistered/dashboard/delete_comment', [CommentController::class, 'delete_comment'])->middleware(['auth', 'verified']);

//shopping list
Route::get('/userRegistered/dashboard/shopping_list', [ShoppingListController::class, 'shopping_list'])->middleware(['auth', 'verified']);

Route::get('/userRegistered/dashboard/add_to_shopping_list/{id}', [ShoppingListController::class, 'add_to_shopping_list'])->middleware(['auth', 'verified']);

Route::get('/userRegistered/dashboard/add_quantity_to_shopping_list', [ShoppingListController::class, 'add_quantity_to_shopping_list'])->middleware(['auth', 'verified']);

Route::get('/userRegistered/dashboard/remove_from_shopping_list/{id}', [ShoppingListController::class, 'remove_from_shopping_list'])->middleware(['auth', 'verified']);

//follow_chef
Route::get('/userRegistered/dashboard/follow_chef/{id}', [FollowChefController::class, 'follow_chef'])->middleware(['auth', 'verified']);

Route::get('/userRegistered/dashboard/unfollow_chef/{id}', [FollowChefController::class, 'unfollow_chef'])->middleware(['auth', 'verified']);

//Nothfication view new dish
Route::get('/userRegistered/dashboard/view_new_dish/{id}', [UsertwoController::class, 'notifications_view_dish'])->middleware(['auth', 'verified']);

Route::get('/userRegistered/dashboard/remove_all_notifications', [UsertwoController::class, 'remove_all_notifications'])->middleware(['auth', 'verified']);

//profile
Route::get('/userRegistered/dashboard/MyProfile', [ProfileTwoController::class, 'MyProfile'])->middleware(['auth', 'verified']);

Route::get('/userRegistered/dashboard/SaveMyProfile', [ProfileTwoController::class, 'SaveMyProfile'])->middleware(['auth', 'verified']);

//diseaseUser

Route::get('/userRegistered/dashboard/diseaseUserAdd/{id}', [UserDiseasesController::class, 'diseaseUserAdd'])->middleware(['auth', 'verified']);

Route::get('/userRegistered/dashboard/diseaseUserRemove/{id}', [UserDiseasesController::class, 'diseaseUserRemove'])->middleware(['auth', 'verified']);

//user_bloked_ingredients

Route::get('/userRegistered/dashboard/blokedIngredientUserAdd/{id}', [UserBlokedIngredientsController::class, 'blokedIngredientUserAdd'])->middleware(['auth', 'verified']);

Route::get('/userRegistered/dashboard/blokedIngredientUserRemove/{id}', [UserBlokedIngredientsController::class, 'blokedIngredientUserRemove'])->middleware(['auth', 'verified']);

Route::get('/userRegistered/dashboard/RigtDishForUser', [ProfileTwoController::class, 'RigtDishForUser'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

////////////admin//
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');
////admin_chef
Route::get('/admin/dashboard/chefs', [ChefController::class, 'index'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/add_chefs', [ChefController::class, 'create'])->middleware(['auth:admin', 'verified']);
Route::post('/admin/dashboard/store_chefs', [ChefController::class, 'store'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/edit_chef/{id}', [ChefController::class, 'edit'])->middleware(['auth:admin', 'verified']);
Route::patch('/admin/dashboard/update_chef', [ChefController::class, 'update'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/destroy_chef/{id}', [ChefController::class, 'destroy'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/ChefAttachments/{id}', [ChefAttachmentsController::class, 'edit'])->middleware(['auth:admin', 'verified']);
Route::post('/admin/dashboard/ChefAddAttachments', [ChefAttachmentsController::class, 'store'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/View_file/{id}/{name}/{file_name}', [ChefAttachmentsController::class, 'open_file'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/download/{id}/{name}/{file_name}', [ChefAttachmentsController::class, 'get_file'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/delete_file/{id_att}/{id}/{name}/{file_name}', [ChefAttachmentsController::class, 'destroy'])->middleware(['auth:admin', 'verified']);
////admin_doctor
Route::get('/admin/dashboard/doctors', [DoctorController::class, 'index'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/add_doctors', [DoctorController::class, 'create'])->middleware(['auth:admin', 'verified']);
Route::post('/admin/dashboard/store_doctors', [DoctorController::class, 'store'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/edit_doctor/{id}', [DoctorController::class, 'edit'])->middleware(['auth:admin', 'verified']);
Route::patch('/admin/dashboard/update_doctor', [DoctorController::class, 'update'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/destroy_doctor/{id}', [DoctorController::class, 'destroy'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/DoctorAttachments/{id}', [DoctorAttachmentsController::class, 'edit'])->middleware(['auth:admin', 'verified']);
Route::post('/admin/dashboard/DoctorAddAttachments', [DoctorAttachmentsController::class, 'store'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/View_file_D/{id}/{name}/{file_name}', [DoctorAttachmentsController::class, 'open_file'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/download_D/{id}/{name}/{file_name}', [DoctorAttachmentsController::class, 'get_file'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/delete_file_D/{id_att}/{id}/{name}/{file_name}', [DoctorAttachmentsController::class, 'destroy'])->middleware(['auth:admin', 'verified']);
/////admin ingredients
Route::get('/admin/dashboard/ingredients', [IngredientsController::class, 'index'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/add_ingredients', [IngredientsController::class, 'create'])->middleware(['auth:admin', 'verified']);
Route::post('/admin/dashboard/store_ingredients', [IngredientsController::class, 'store'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/edit_ingredient/{id}', [IngredientsController::class, 'edit'])->middleware(['auth:admin', 'verified']);
Route::patch('/admin/dashboard/update_ingredient', [IngredientsController::class, 'update'])->middleware(['auth:admin', 'verified']);
Route::get('/admin/dashboard/destroy_ingredient/{id}', [IngredientsController::class, 'destroy'])->middleware(['auth:admin', 'verified']);

require __DIR__.'/adminauth.php';

///chefAuth//
Route::get('/chef/dashboard', function () {
    return view('chef.dashboard');
})->middleware(['auth:chef', 'verified'])->name('chef.dashboard');
///chef
Route::get('/chef/dashboard/profile', [ChefController::class, 'profile'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');
Route::patch('/chef/dashboard/update_chef', [ChefController::class, 'update'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

//chef dish

Route::get('/chef/dashboard/dishs', [ChefController::class, 'dishs'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard_dishs');

Route::get('/chef/dashboard/DishDetails/{id}', [DishController::class,'DishDetails'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::get('/chef/dashboard/add_dish', [ChefController::class, 'add_dish'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::post('/chef/dashboard/store_dish', [ChefController::class, 'store_dish'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

// Route::get('/chef/dashboard/steps/{id}', [ChefController::class, 'steps'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');
Route::post('/chef/dashboard/store_steps', [StepController::class, 'store_steps'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');



Route::get('/chef/dashboard/ingredients/{id}', [DishIngredientsController::class, 'ingredients'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');
Route::get('/chef/dashboard/add_ingredient_to_dish/{id}', [DishIngredientsController::class, 'add_ingredient_to_dish'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');
Route::get('/chef/dashboard/dish_cart/{d_id}', [DishIngredientsController::class, 'dish_cart'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');
Route::delete('/chef/dashboard/remove_from_dish_cart', [DishIngredientsController::class, 'remove'])->middleware(['auth:chef', 'verified'])->name('remove_from_dish_cart');

Route::post('/chef/dashboard/uuu', [DishIngredientsController::class, 'uuu'])->middleware(['auth:chef', 'verified'])->name('uuu');

Route::patch('/chef/dashboard/update_dish_ingredient', [DishIngredientsController::class, 'update_dish_ingredient'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::post('/chef/dashboard/delete_dish_ingredient', [DishIngredientsController::class, 'delete_dish_ingredient'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::post('/chef/dashboard/delete_dish_step', [StepController::class, 'delete_dish_step'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::get('/chef/dashboard/edit_dish/{id}', [DishController::class, 'edit'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::patch('/chef/dashboard/update_dish', [DishController::class, 'update'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::patch('/chef/dashboard/update_dish_info', [DishController::class, 'update_dish_info'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::post('/chef/dashboard/destroy_dish', [DishController::class, 'destroy'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::post('/chef/dashboard/store_notes', [NoteController::class, 'store_notes'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::post('/chef/dashboard/delete_dish_note', [NoteController::class, 'delete_dish_note'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

Route::get('/chef/dashboard/edit_dish_state/{id}', [DishController::class, 'edit_dish_state'])->middleware(['auth:chef', 'verified'])->name('chef.dashboard');

require __DIR__.'/chefauth.php';

/////doctor auth//
Route::get('/doctor/dashboard', function () {
    return view('doctor.dashboard');
})->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');

//doctor dashboard
Route::get('/doctor/dashboard/profile', [DoctorController::class, 'profile'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');
Route::patch('/doctor/dashboard/update_doctor', [DoctorController::class, 'update'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');
//
Route::get('/doctor/dashboard/diseases', [DiseaseController::class, 'index'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');

Route::get('/doctor/dashboard/add_diseases', [DiseaseController::class, 'store'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');

Route::patch('/doctor/dashboard/update_diseases', [DiseaseController::class, 'update'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');

Route::post('/doctor/dashboard/delete_diseases', [DiseaseController::class, 'destroy'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');

Route::get('/doctor/dashboard/ingredients/{id}', [DieasesBlokedIngredientController::class, 'ingredients'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');

Route::get('/doctor/dashboard/add_ingredient/{id}', [DieasesBlokedIngredientController::class, 'add_ingredient'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');

Route::get('/doctor/dashboard/disease_cart/{d_id}', [DieasesBlokedIngredientController::class, 'disease_cart'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');

//
Route::delete('/doctor/dashboard/remove_from_disease_cart', [DieasesBlokedIngredientController::class, 'remove'])->middleware(['auth:doctor', 'verified'])->name('remove_from_disease_cart');

Route::post('/doctor/dashboard/duu', [DieasesBlokedIngredientController::class, 'duu'])->middleware(['auth:doctor', 'verified'])->name('duu');
//
Route::get('/doctor/dashboard/diease_bloked_ingredient/{id}', [DieasesBlokedIngredientController::class, 'diease_bloked_ingredient'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboardd');

Route::post('/doctor/dashboard/delete_diease_bloked_ingredient', [DieasesBlokedIngredientController::class, 'delete_diease_bloked_ingredient'])->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');

//

require __DIR__.'/doctorauth.php';