<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Application;
use App\Models\Profile;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return redirect('dashboard');
    }

    public function dashboard()
    {
        return view('dashboard')->with([
            "applications" => Application::paginate(10),
        ]);
    }

    public function users()
    {
        $users = Profile::latest()->paginate(10);
        return view('users.index')->with('users', $users)->with('search',false);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = Profile::where('first_name', 'like', "%$query%")
        ->orWhere('last_name', 'like', "%$query%")
        ->orWhere('region', 'like', "%$query%")
        ->orWhere('school', 'like', "%$query%")
        ->orWhere('subject', 'like', "%$query%")
        ->orWhere('district', 'like', "%$query%")->get();
        return view('users.index')->with(["users"=>$users,"search"=>true]);
    }

    public function destroy()
    {
        $ids = [];
        $answers = Answer::all();
        if (isset($answers)) {
            foreach ($answers as $answer) {
                array_push($ids, $answer->application_id);
            }
            Application::destroy($ids);
        }
        return redirect()->back();
    }
}
