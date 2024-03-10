<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillController extends Controller
{
       public function index(){
        $skills=Skills::all();
        return view('skills.index',compact('skills'));
    }
}
