<?php

namespace App\Http\Controllers;

use App\Models\chef_attachments;
use Illuminate\Http\Request;
use App\Models\Chef;
use Illuminate\Support\Facades\Storage;
use File;

class ChefAttachmentsController extends Controller
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
    // echo 'tt';
        $this->validate($request, [

        'file_name' => 'mimes:pdf,jpeg,png,jpg',

        ], [
            'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
        ]);
        
        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();


    //     /////////////////////
      
        $image_path= 'Chef_Attachments/'.$request->chef_name.$request->chef_id.'/'.$file_name;
             if(file_exists($image_path)){

                session()->flash('exists', 'المرفق موجود مسبقاً');
                return back();
                      
                }
    // ////////////////////

        $attachments =  new chef_attachments();
        $attachments->file_name = $file_name;
        $attachments->chef_name = $request->chef_name;
        $attachments->chef_id = $request->chef_id;
       
        $attachments->save();


    

           
    //     // move pic
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Chef_Attachments/'. $request->chef_name.$request->chef_id), $imageName);
        
        session()->flash('Add_Chef_Attachments', 'تم اضافة المرفق بنجاح');
        return back();

    }


    /**
     * Display the specified resource.
     */
    public function show(chef_attachments $chef_attachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    
    {
        $chefs = chef::where('id',$id)->first();
     
        $attachments  = chef_attachments::where('chef_id',$id)->get();

        return view('admin.chef_attachments',compact('chefs','attachments'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, chef_attachments $chef_attachments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   
    public function open_file($id,$name,$file_name)

    {
       
          $path = public_path('Chef_Attachments/'.$name.$id.'/'.$file_name);
        return response()->file($path);
    }
    public function get_file($id,$name,$file_name)

    {
       
        $path = public_path('Chef_Attachments/'.$name.$id.'/'.$file_name);
        return response()->download($path);
    }

    public function destroy($id_att,$id,$name,$file_name)
    {
        // return $id_att;
        // $chefs = chef_attachments::findOrFail($request->id_file);
        $chefs = chef_attachments::where('id', $id_att)->first();
        $chefs->delete();
        $attachment_path= 'Chef_Attachments/'.$name.$id.'/'. $file_name;
        unlink($attachment_path);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

}
