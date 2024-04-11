<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store_notes(Request $request)
    {
//      echo 'llll';
//    return $request;
          $request->validate([
              'inputs.*.content'=>'required',
          ],
          [
              'inputs.*.content' => 'يجب كتابة الخطوة',
          ]
          );
          foreach ($request->inputs as $key => $value){
            Note::create($value);
          }
          return back()->with('success','تمت إضافة الملاحظات بنجاح');
      
     
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function delete_dish_note(Request $request)
    {
        //
        //  return $request;
         Note::where('dish_id',$request->dish_id)
         ->where('id',$request->note_id)->delete();
  
          session()->flash('delete', 'تم حذف الملاحظة بنجاح');
  
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
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
