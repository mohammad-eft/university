<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class major extends Model
{
    protected $fillable=['name'];

    public function colleges(){
        return $this->belongsToMany(college::class, 'college_majors');
    }
    public function lessons(){
        return $this->belongsToMany(lesson::class, 'major_lessons');
    }
}
