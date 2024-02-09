<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicationController extends Controller
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
        if($this->checkDate()){
            return redirect()->back()->with("error","Siz bir kunda faqat 3 ta murojat yo'lay olasiz!");
        }

        $validated = $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required',
            'file'=> 'file|mimes:jpg,png,pdf|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs(
                'files',
                $name,
                'public'
            );
        }
        $application = Application::create([
            "user_id"=>auth()->user()->id,
            "subject" => $request->subject,
            "message" => $request->message,
            "file_url" => $path ?? null
        ]);
        return redirect()->back()->with("send_message","Murojatingiz yuborildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {

    }

    protected function checkDate(){
        $last_applications = auth()->user()->applications()->latest()->take(3)->get()->toArray();
        if(!(isset($last_applications)) or (count($last_applications)<3)){
            return false;
        }
        $today = Carbon::now()->format("Y-m-d");
        $arr=[];
        // dd($last_applications);
        foreach ($last_applications as $last_application) {
            $last_app_date = Carbon::parse($last_application['created_at'])->format("Y-m-d");
            if($last_app_date==$today){
                array_push($arr,1);
            }
        }
        if (count($arr)===3) {
            return true;
        }
        return false;
    }
}
