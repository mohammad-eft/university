<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lesson;
use App\Models\university;
use App\Models\college;
use App\Models\major;
use App\Models\uni_college;
use App\Models\major_uni_college;
use App\Models\midd_lesson;

class TeacherController extends Controller
{
    public function create(){
        $major_uni_colleges = major_uni_college::all();
        foreach($major_uni_colleges as $major_uni_college){
            $midd_lessons = midd_lesson::where('uni_maj_coll_id', $major_uni_college->id)->get();
            foreach($midd_lessons as $midd_lesson){
                $unis[$major_uni_college->uni_id]['uni_data'] = university::find($major_uni_college->uni_id);
                $unis[$major_uni_college->uni_id]['colleges'][$major_uni_college->college_id]['college_data'] = college::find($major_uni_college->college_id);
                $unis[$major_uni_college->uni_id]['colleges'][$major_uni_college->college_id]['majors'][$major_uni_college->major_id]['major_data'] = major::find($major_uni_college->major_id);
                $lesson = lesson::find($midd_lesson->lesson_id);
                $unis[$major_uni_college->uni_id]['colleges'][$major_uni_college->college_id]['majors'][$major_uni_college->major_id]['lessons'][] = $lesson;
            }
        }
        return view('teacher.create', ['unis'=>$unis]);
    }

    public function store(Request $request){
        // dd($request->all());
        // $lesson_id = lesson::insertGetId([
        //     'name'=>$request->name,
        //     'unit'=>$request->unit
        // ]);
        foreach($request -> unis as $id_uni => $colleges){
            foreach($colleges as $id_college => $majores){
                foreach($majores as $id_major => $lesson){
                    dd($lesson);
                    $row=major_uni_college::select('id')->where(['uni_id'=>$id_uni, 'college_id'=>$id_college, 'major_id'=>$id_major,   ])->get();
                    foreach($row as $id){
                        midd_lesson::create([
                            'uni_maj_coll_id'=>$id->id,
                            'lesson_id'=>$lesson_id
                        ]);
                    }
                }
            }
        }
        return redirect('lessons');
    }

}
