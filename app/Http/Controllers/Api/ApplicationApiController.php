<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Console\Application as ConsoleApplication;
use Illuminate\Http\Request;

class ApplicationApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Application::limit(10)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($this->checkDate($request->tg_id)){
            return response(["error"=>"Siz bir kunda faqat 3 ta murojat yo'lay olasiz!"],404);
        }

        $profile = Profile::where('tg_id',$request->tg_id)->first();
        $application = Application::create([
            "user_id"=>$profile->user->id,
            "subject"=>$request->subject,
            "message"=>$request->message,
        ]);

        return response(["success"=>"Savolingiz yuborildi"],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return $application;
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
        return $application->delete();
    }

    protected function checkDate(string $tg_id){
        $profile = Profile::where('tg_id',$tg_id)->first();
        $last_applications = Application::where('user_id',$profile->user->id)->latest()->take(3)->get()->toArray();
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
