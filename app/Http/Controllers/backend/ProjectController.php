<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects=Projects::all();
        return view('projects.index',compact('projects'));
    }
    public function create(){
        return view('projects.create');
    }
    public function store(StoreProjectRequest $request){
         if($request->hasFile('image')){
            $image=$request->file('image')->store('projects'); 
         }
    }
}
