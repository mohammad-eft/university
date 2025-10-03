<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Models\university;

class UniversityController extends Controller
{
    public function create(){
        return view('university.create');
    }

    public function store(Request $request){
        university::create($request->all());
        return to_route('uni.universities');
    }

    public function index(){
        $unis = university::with('colleges')->get();
        return view('university.universities', ['unis'=>$unis]);
    }

    public function edit(university $university){
        return view('university.edit', ['uni'=>$university]);
    }

    public function update(Request $request){
        $uni = university::find($request->id);
        $uni->name = $request->name;
        $uni->city = $request->city;
        $uni->save();
        return to_route('uni.universities');
    }

    public function delete(university $university){
        $university->delete();
        return to_route('uni.universities');
    }

    public function show(university $university){
        return view('university.show',['uni'=>$university]);
    }

    public function show_colleges(university $university){
        return view('university.colleges', ['uni'=>$university]);
    }
}
