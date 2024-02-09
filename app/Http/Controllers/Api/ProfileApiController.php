<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Profile::limit(10)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name'=>$request->first_name,
            'email'=>fake()->unique()->safeEmail(),
            'password'=>"$request->first_name@$request->last_name"
        ]);

        $profile = Profile::create([
            'user_id'=>$user->id,
            'tg_id'=>$request->tg_id,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'father_name'=>$request->father_name,
            'region'=>$request->region,
            'phone'=>$request->phone,
            'district'=>$request->district,
            'school'=>$request->school,
            'subject'=>$request->subject,
        ]);

        return response(["success"=>"Muvafaqiyatli"],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return $profile;
    }

    public function check_user(String $tg_id){
        $profile = Profile::where('tg_id',$tg_id)->first();
        if ($profile===null) {
            return response(['error'=>"Ma'lumot topilmadi"],404);
        }
        return response(['success'=>"topildi"],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        return $profile->delete();
    }

}
