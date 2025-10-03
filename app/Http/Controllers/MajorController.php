<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\major;
use App\Models\university;
use App\Models\college;
use App\Models\college_major;

class MajorController extends Controller
{
    public function create(){
        $unis = university::with('colleges')->get();
        return view('major.create', ['unis'=>$unis]);
    }

    public function store(Request $request){
        $major_id = major::insertGetId([
            'name'=>$request->name
        ]);
        foreach($request->unis as $uni){
            college_major::create([
                'major_id'=>$major_id,
                'college_id'=>$request[$uni]
            ]);
        }
        return to_route('maj.majores');
    }

    public function index(){
        $majors = major::with('colleges')->get();
        return view('major.majores', ['majors'=>$majors]);
    }

    public function edit(major $major){
        $unis = university::with('colleges')->get();
        return view('major.edit', ['major'=>$major, 'unis'=>$unis]);
    }

    public function update(Request $request){
        $major = major::find($request->id);
        $major->name = $request->name;
        college_major::where('major_id', $major->id)->delete();
        foreach($request->unis as $uni){
            college_major::create([
                'major_id'=>$major->id,
                'college_id'=>$request[$uni]
            ]);
        }
        $major->save();
        return to_route('maj.majores');
    }

    public function delete(major $major){
        $major->delete();
        return to_route('maj.majores');
    }

    public function show(major $major){
        return view('major.show', ['major'=>$major]);
    }
}