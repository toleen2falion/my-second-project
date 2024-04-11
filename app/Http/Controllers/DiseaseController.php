<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DoctorAuth;
use Illuminate\Support\Facades\Auth;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return "lll";
        $diseases = Disease::latest()->get();
        return view('doctor.diseases', compact('diseases'));
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
        // echo"ll";
        Disease::create([
            'name' => $request->disease_name,
            'description' => $request->disease_description,
            'created_by' => (Auth::guard('doctor')->user()->name),   
            ]);

            session()->flash('Add', 'تم اضافة المرض بنجاح');
            return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Disease $disease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disease $disease)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //تتمة العمل من هنا
        // return $request;
        $disease = Disease::findOrFail($request->disease_id);
       
        if( $request->disease_description == 0){
        
        $disease->update([
            'name' => $request->disease_name,
        ]);
    }
        else {
            $disease->update([
                'name' => $request->disease_name,
                'description' => $request->disease_description,
            ]);
        }
        session()->flash('edit', 'تم تعديل المرض بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
       
        $disease = Disease::where('id', $request->disease_id)->first();
        $disease->delete();

        session()->flash('delete', 'تم حذف المرض بنجاح');

        return back();
    }
}
