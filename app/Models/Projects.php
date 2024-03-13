<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $guarded=[];
       protected $casts = [

    'skill_id' => 'json',

];
    public function skills(){
        return $this->belongsTo(Skills::class);
    }
}
