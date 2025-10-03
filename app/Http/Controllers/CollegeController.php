<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\college;
use App\Models\university;
use App\Models\uni_college;

class CollegeController extends Controller
{
    public function create(){
        $unis = university::all();
        return view('college.create', ['unis'=>$unis]);
    }

    public function store(Request $request){
        college::create($request->all());
        return to_route('college.colleges');
    }

    public function index(){
        $colleges = college::all();
        return view('college.colleges', ['colleges'=>$colleges]);
    }

    public function edit(college $college){
        $unis = university::all();
        return view('college.edit', ['college'=>$college, 'unis'=>$unis]);
    }

    public function update(Request $request){
        $college = college::find($request->id);
        $college->name = $request->name;
        uni_college::where('college_id', $request->id)->delete();
        uni_college::create([
            'uni_id'=>$request->uni,
            'college_id'=>$request->id
        ]);
        $college->save();
        return to_route('college.colleges');
    }

    public function delete(college $college){
        $college->delete();
        return to_route('college.colleges');
    }

    public function show(college $college){
        return view('college.show',['college'=>$college]);
    }

    public function show_majores(college $college){
        return view('college.majores', ['college'=>$college]);
    }
}
