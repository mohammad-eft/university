<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\responsibilities;
use App\Models\teacher;
use App\Models\user_resp;
use App\Models\boss;
use App\Models\student;
use App\Models\university;
use App\Models\boss_uni;
use App\Models\major_uni_college;
use App\Models\midd_lesson;
use App\Models\college;
use App\Models\major;
use App\Models\lesson;
use App\Models\teacher_midd_lesson;
use App\Models\boss_uni_id;

class UserController extends Controller
{
    public function create(){
        $resps = responsibilities::all();
        return view('users.create', ['resps'=>$resps]);
    }

    public function store(Request $request){
        $user_id = User::insertGetId([
            'name'=>$request->name,
            'family'=>$request->family
        ]);
        $person_id = user_resp::insertGetId([
            'user_id'=>$user_id,
            'resp_id'=>$request->resp
        ]);
        if($request->resp == 1){
            $boss_id = boss::insertGetId([
                'name'=>$request->name,
                'family'=>$request->family
            ]);
            boss_uni_id::create([
                'all_user_boss_id'=>$user_id,
                'boss_id'=>$boss_id
            ]);
        }
        if($request->resp == 2){
            $teacher_id = teacher::insertGetId([
                'name'=>$request->name,
                'family'=>$request->family
            ]);
        }
        if($request->resp == 3){
            $student_id = student::insertGetId([
                'name'=>$request->name,
                'family'=>$request->family
            ]);
        }
        return redirect('users');
    }
    
    public function index(){
        $users = User::all();
        foreach($users as $key => $user){
            $resps = user_resp::where('user_id', $user->id)->get();
            foreach($resps as $resp){
                $respons = responsibilities::find($resp->resp_id);
            }
            $users[$key]['resps'] = $respons;
        }
        return view('users.users', ['users'=>$users]);
    }

    public function edit(string $id){
        $user = User::find($id);
        $resps = user_resp::where('user_id', $id)->get();
        foreach($resps as $resp){
            $respons = $resp->resp_id;
        }
        $user['resp'] = $respons;
        $user['resps'] = responsibilities::all();
        return view('users.edit', ['user'=>$user]);
    }

    public function update(Request $request){
        $user = User::find($request->id);
        dd($user);
        $user->name = $request->name;
        $user->family = $request->family;
        $all_user_boss_ids = boss_uni_id::where('all_user_boss_id', $request->id)->get();
        foreach($all_user_boss_ids as $data){
            $boss = boss::find($data->boss_id);
            $boss->name = $request->name;
            $boss->family = $request->family;
            $boss->save();
            // dd($boss);
        }
        // باید در هر دو تیبل آپدیت بشه اگر رییس بود فعلا
        user_resp::where('user_id', $user->id)->delete();
        user_resp::create([
            'user_id'=>$user->id,
            'resp_id'=>$request->resp
        ]);
        $user->save();
        return redirect('users');
    }

    public function delete(string $id){
        User::find($id)->delete();
        // اگر رییس باشه باید از همه جاهایی که آیدی رییس ثبت شده حذف بشه
        user_resp::where('user_id', $id)->delete();
        return redirect('users');
    }

    public function details(string $id){
        $user_resps = user_resp::where('user_id', $id)->get();
        $user = User::find($id);
        foreach($user_resps as $user_resp){
            if($user_resp->resp_id == 1){
                $user['unis'] = university::all();
                return view('users.boss', ['user'=>$user]);
            }
            if($user_resp->resp_id == 2){
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
                return view('users.teacher', ['unis'=>$unis, 'user'=>$user]);
            }
            if($user_resp->resp_id == 3){
                dd('student');
            }
        }
    }

    public function save_detail(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->family = $request->family;
        $user->save();
        $user_resps = user_resp::where('user_id', $request->id)->get();
        foreach($user_resps as $user_resp){
            if($user_resp->resp_id == 1){
                boss_uni::create([
                    'boss_id'=>$request->id,
                    'uni_id'=>$request->uni
                ]);
            }
            if($user_resp->resp_id == 2){
                foreach($request -> unis as $id_uni => $colleges){
                    foreach($colleges as $id_college => $majores){
                        foreach($majores as $id_major => $lessons){
                            foreach($lessons as $id_lesson => $lesson){
                                $row=midd_lesson::select('id')->where('lesson_id', $id_lesson)->get();
                                foreach($row as $id){
                                    teacher_midd_lesson::create([
                                        'teacher_id'=>$request->id,
                                        'midd_lesson_id'=>$id->id
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
        }
        return redirect('users');
    }
}
