<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Leave};
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $user = Auth::user();
        $total_leaves = Leave::where('employee_id',$user->id)->where('is_approved',1)->count();
        return view('admin.dashboard.index',compact('users','total_leaves'));
    }
}
