<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\college;

class university extends Model
{
    protected $fillable = ['name', 'city'];

    public function colleges(){
        return $this->hasMany(college::class, 'uni_id')->chaperone();
    }
}
