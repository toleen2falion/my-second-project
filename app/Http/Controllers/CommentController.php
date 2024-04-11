<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add_comment(Request $request)
    {
        //
        $request->validate([
           
            'comment_content'=>'required' ,
        ],

    
    );

    try {
    Comment::create([
        'dish_id' => $request->dish_id,
        'user_id' => $request->user_id,
        'content' => $request->comment_content,
   ]);
   session()->flash('Add', 'تم اضافة تعليقك بنجاح');
   return back();
    // return $request;
        // return back();
    }

    catch (\Exception $e) {
               return redirect()->back()->withErrors('لا يمكنك إضافة أكثر من تعليق.');
           }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function delete_comment(Request $request)
    {
        //
        // return  $request;
        $comment = Comment::where('dish_id',$request->dish_id)
        ->where('user_id', $request->user_id)->delete();
      

        session()->flash('delete', 'تم حذف تعليقك بنجاح');

        return back();
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
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
