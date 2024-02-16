<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use Log;

class VacancyController extends Controller
{
    public function index() {

        $vacancies = Vacancy::all();

        return view('admin.vacancy.index',compact('vacancies'));
    }

    public function store(Request $request) {

        $vacancy = Vacancy::create([
            'vacancy' => $request->vacancy,
            'qty' => $request->qty
        ]);

        return redirect()->back();
    }

    public function create() {

        return view('admin.vacancy.create');
    }

    public function delete(Request $request){
        Log::error($request);
        $delete = Vacancy::where('id',$request->id)->delete();

        return redirect()->back();
    }
}
