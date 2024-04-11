<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

use Illuminate\Support\Facades\DoctorAuth;

use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //   // $doctors = doctors::all();
          $doctors = Doctor::latest()->get();
          return view('admin.doctors', compact('doctors'));
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
        return view('admin.add_doctor');
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
            'doctor_name'=>'required' ,
            'doctor_phone'=>'required| min:10',
            'doctor_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'=>'required | unique:doctors' ,
            'doctor_passwoard'=>'required' ,
        ],

    
    );
        
        
  
        if ($image = $request->doctor_image) {
            $destinationPath = 'image_doctor/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        
        }
    
       doctor::create([
            'image' => $profileImage,
            'name' => $request->doctor_name,
            'phone' => $request->doctor_phone,
            'email' => $request->email,
            'password' => $request->doctor_passwoard,
         

            
       ]);


// __المرفقات

       
        if ($request->hasFile('pic')) {

            $doctor_id = doctor::latest()->first()->id;
            
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $doctor_name = $request->doctor_name;

            $attachments = new doctor_attachments();
            $attachments->file_name = $file_name;
            $attachments->doctor_name = $doctor_name;
           
            $attachments->doctor_id = $doctor_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Doctor_Attachments/' . $doctor_name.$doctor_id), $imageName);
        }




        session()->flash('Add_doctor', 'تم اضافة الطبيب بنجاح');
        // return back();
       
        $doctors = doctor::latest()->get();
        return view('admin.doctors', compact('doctors'));
        
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        $doctors = doctor::where('id', $id)->first();
       
        return view('admin.edit_doctor', compact('doctors'));
    }

    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       

        $doctors = doctor::findOrFail($request->doctor_id);
        
      

        // $request->validate([
        //     'doctor_name'=>'required' ,
        //     'doctor_phone'=>'required| min:10',
        //     'doctor_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'email'=>'required | unique:doctors' ,
        //     'password'=>'required' ,
        // ],

    
    // );

  
        if ($image = $request->doctor_image) {
            $destinationPath = 'image_doctor/';
            $image_name=$doctors->image;
            $image_path= 'image_doctor/'.$image_name;

            if(file_exists($image_path)){
                unlink($image_path);
            }
            
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            
        $doctors->update([
            'image' => $profileImage,]);
        
        }
        
     

        $doctors->update([
            // 'image' => $profileImage,
            'name' => $request->doctor_name,
            'phone' => $request->doctor_phone,
            'email' => $request->email,
            'password' => $request->password,
            
        ]);

        session()->flash('edit', 'تم تعديل الطبيب بنجاح');
        session()->flash('edit_profile', 'تم تعديل معلوماتك الشخصية بنجاح');
        return back();
      

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo 'ii';
        // return $id;
        //
    //     $doctors = doctors::findOrFail($request->doctor_id);
           $doctors = doctor::where('id', $id)->first();
      
       

        $image_name=$doctors->image;
        $image_path= 'image_doctor/'.$image_name;
        if(file_exists($image_path)){
                    unlink($image_path);
            }
      

        /////////حذف  المرفقات الخاص بالشيقف عند حذفه///////
        $attachments=doctor_attachments::where('doctor_id',$id)->get();
        foreach($attachments as $attachment){
             $attachment_name=$attachment->file_name;
            $attachment_path= 'Doctor_Attachments/'.$doctors->name.$doctors->id.'/'. $attachment_name;
        
        
            unlink($attachment_path);
           

        }
          ////////
        
        $doctors->delete();

      
      

        session()->flash('delete_doctor', 'تم حذف الطبيب بنجاح');

        return back();
    }

      //////doctor profile
      public function profile()
      {
        
          return view('doctor.profile');
       
      }

      

}
