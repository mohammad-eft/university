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

class LessonController extends Controller
{
    public function create(){
        $major_uni_colleges = major_uni_college::all();
        foreach($major_uni_colleges as $major_uni_college){
            $unis[$major_uni_college->uni_id]['uni_data']=university::find($major_uni_college->uni_id);
            $unis[$major_uni_college->uni_id]['colleges'][$major_uni_college->college_id]['college_data']=college::find($major_uni_college->college_id);
            $unis[$major_uni_college->uni_id]['colleges'][$major_uni_college->college_id]['majors'][]=major::find($major_uni_college->major_id);
        }
        return view('lesson.create',  ['unis'=>$unis]);
    }

    public function store(Request $request){
        $lesson_id = lesson::insertGetId([
            'name'=>$request->name,
            'unit'=>$request->unit
        ]);
        foreach($request -> unis as $id_uni => $colleges){
            foreach($colleges as $id_college => $majores){
                foreach($majores as $id_major => $field){
                    $row=major_uni_college::select('id')->where(['uni_id'=>$id_uni, 'college_id'=>$id_college, 'major_id'=>$id_major])->get();
                    foreach($row as $id){
                        midd_lesson::create([
                            'uni_maj_coll_id'=>$id->id,
                            'lesson_id'=>$lesson_id
                        ]);
                    }
                }
            }
        }
        return to_route('lesson.lessons');
    }

    public function index(){
        $lessons = lesson::all();
        return view('lesson.lessons', ['lessons'=>$lessons]);
    }
    
    public function edit(string $id){
        $lesson = lesson::find($id);
        $midd_lessons = midd_lesson::where('lesson_id', $id)->get();
        foreach($midd_lessons as $midd_lesson){
            $major_uni_coll = major_uni_college::find($midd_lesson->uni_maj_coll_id);
            $unis[]=$major_uni_coll->uni_id;
            $colleges[]=$major_uni_coll->college_id;
            $majors[]=$major_uni_coll->major_id;
        }
        $lesson['unis']=$unis;
        $lesson['colleges']=$colleges;
        $lesson['majors']=$majors;

        $major_uni_colleges = major_uni_college::all();
        foreach($major_uni_colleges as $major_uni_college){
            $universities[$major_uni_college->uni_id]['uni_data']=university::find($major_uni_college->uni_id);
            $universities[$major_uni_college->uni_id]['colleges'][$major_uni_college->college_id]['college_data']=college::find($major_uni_college->college_id);
            $universities[$major_uni_college->uni_id]['colleges'][$major_uni_college->college_id]['majors'][]=major::find($major_uni_college->major_id);
        }


        return view('lesson.edit', ['universities'=>$universities, 'lesson'=>$lesson]);
    }

    public function update(Request $request){
        $lesson = lesson::find($request->id);
        $lesson->name = $request->name;
        $lesson->unit = $request->unit;
        midd_lesson::where('lesson_id', $request->id)->delete();
        foreach($request->unis as $id_uni => $colleges){
            foreach($colleges as $id_college => $majores){
                foreach($majores as $id_major => $field){
                    $row=major_uni_college::select('id')->where(['uni_id'=>$id_uni, 'college_id'=>$id_college, 'major_id'=>$id_major])->get();
                    foreach($row as $id){
                        midd_lesson::create([
                            'uni_maj_coll_id'=>$id->id,
                            'lesson_id'=>$lesson->id
                        ]);
                    }
                }
            }
        }
        $lesson->save();
        return to_route('lesson.lessons');
    }

    public function delete(string $id){
        lesson::find($id)->delete();
        midd_lesson::where('lesson_id', $id)->delete();
        return to_route('lesson.lessons');
    }

    public function show(string $id){
        $lesson = lesson::find($id);
        $midds_id = midd_lesson::where('lesson_id', $id)->get();
        foreach($midds_id as $midd_id){
            $major_uni_colleges = major_uni_college::find($midd_id->uni_maj_coll_id);
            $unis[]=university::find($major_uni_colleges->uni_id);
            $colleges[]=college::find($major_uni_colleges->college_id);
            $majors[]=major::find($major_uni_colleges->major_id);
        }
        $lesson['unis']=$unis;
        $lesson['colleges']=$colleges;
        $lesson['majors']=$majors;
        return view('lesson.show', ['lesson'=>$lesson]);
    }
}
