<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class college extends Model
{
    protected $fillable = ['name', 'uni_id'];

    public function university(){
        return $this->belongsTo(university::class, 'uni_id');
    }

    public function majors(){
        return $this->belongsToMany(major::class, 'college_majors');
    }
}
