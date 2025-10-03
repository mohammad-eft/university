<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\responsibilities;

class ResponsibilitiesController extends Controller
{
    public function create(){
        return view('responsibility.create');
    }

    public function store(Request $request){
        responsibilities::create($request->all());
        return to_route('resp.responsibilities');
    }

    public function index(){
        $responsibilities = responsibilities::all();
        return view('responsibility.responsibilities', ['responsibilities'=>$responsibilities]);
    }

    public function show(string $id){
        $resp = responsibilities::find($id);
        return view('responsibility.show', ['resp'=>$resp]);
    }

    public function edit(string $id){
        $resp = responsibilities::find($id);
        return view('responsibility.edit', ['resp'=>$resp]);
    }

    public function update(Request $request){
        $resp = responsibilities::find($request->id);
        $resp->name = $request->name;
        $resp->save();
        return to_route('resp.responsibilities');
    }

    public function delete(string $id){
        $resp = responsibilities::find($id)->delete();
        return to_route('resp.responsibilities');
    }
}
