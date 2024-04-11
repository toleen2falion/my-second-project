<?php

namespace App\Http\Controllers;

use App\Models\doctor_attachments;
use Illuminate\Http\Request;

use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;
use File;

class DoctorAttachmentsController extends Controller
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
        //  return $request;
        $this->validate($request, [

        'file_name' => 'mimes:pdf,jpeg,png,jpg',

        ], [
            'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
        ]);
        
        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();


    //     /////////////////////
      
        $image_path= 'Doctor_Attachments/'.$request->doctor_name.$request->doctor_id.'/'.$file_name;
             if(file_exists($image_path)){

                session()->flash('exists', 'المرفق موجود مسبقاً');
                return back();
                      
                }
    // ////////////////////

        $attachments =  new doctor_attachments();
        $attachments->file_name = $file_name;
        $attachments->doctor_name = $request->doctor_name;
        $attachments->doctor_id = $request->doctor_id;
       
        $attachments->save();


    

           
    //     // move pic
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Doctor_Attachments/'. $request->doctor_name.$request->doctor_id), $imageName);
        
        session()->flash('Add_Doctor_Attachments', 'تم اضافة المرفق بنجاح');
        return back();

    }


    /**
     * Display the specified resource.
     */
    public function show(doctor_attachments $doctor_attachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    
    {
        $doctors = doctor::where('id',$id)->first();
     
        $attachments  = doctor_attachments::where('doctor_id',$id)->get();

        return view('admin.doctor_attachments',compact('doctors','attachments'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, doctor_attachments $doctor_attachments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_att,$id,$name,$file_name)
    {
        // return $id_att;
        // $doctors = doctor_attachments::findOrFail($request->id_file);
        $doctors = doctor_attachments::where('id', $id_att)->first();
        $doctors->delete();
        $attachment_path= 'Doctor_Attachments/'.$name.$id.'/'. $file_name;
        unlink($attachment_path);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

    public function open_file($id,$name,$file_name)

    {
       
          $path = public_path('Doctor_Attachments/'.$name.$id.'/'.$file_name);
        return response()->file($path);
    }

    public function get_file($id,$name,$file_name)

    {
       
        $path = public_path('Doctor_Attachments/'.$name.$id.'/'.$file_name);
        return response()->download($path);
    }
}
