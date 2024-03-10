<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects=Projects::all();
        return view('projects.index',compact('projects'));
    }
}
