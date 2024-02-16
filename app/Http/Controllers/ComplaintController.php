<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Complaint;
use DB;

class ComplaintController extends Controller
{
    public function index() {

        $user = Auth::user();
        $employee_id = $user->id;
        $complaints = Complaint::where('employee_id',$employee_id)->get();
        return view('admin.complaint.create',compact('employee_id','complaints'));
    }

    public function store(Request $request) {

        $complaint = Complaint::create([
            'title' => $request->title,
            'complait' => $request->complaint,
            'employee_id' => $request->employee_id
        ]);

        return redirect()->back();
    }

    public function delete(Request $request){

        $delete = Complaint::where('id',$request->id)->delete();

        return redirect()->back();
    }

    public function show(){

        $complaints = DB::table('complaints as c')->select('c.title','c.complait','u.first_name')->
        leftjoin('users as u','u.id','c.employee_id')->get();

        return view('admin.complaint.index',compact('complaints'));
    }
}
