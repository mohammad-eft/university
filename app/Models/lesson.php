<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    protected $fillable = ['name', 'unit'];
    public function majors(){
        return $this->belongsToMany(major::class, 'major_lessons');
    }
}
