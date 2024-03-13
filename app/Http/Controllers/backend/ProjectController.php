<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Projects;
use App\Models\Skills;
use Illuminate\Http\Request;
use Storage;

class ProjectController extends Controller
{
    public function index(){
        $projects=Projects::all();
        return view('projects.index',compact('projects'));
    }
    public function create(){
        $skills=Skills::cursor();
        return view('projects.create',compact('skills'));
    }
    public function store(StoreProjectRequest $request){
         if($request->hasFile('image')){
            $image=$request->file('image')->store('projects'); 
               Projects::create([
               'name' => $request->name,
                'image'=>$image,
                'project_url'=>$request->project_url,
                'project_description'=>$request->project_description,
                'skill_id'=>$request->skill_id,

            ]);
            return to_route('project.index');
         }
           return back();
    }
    public function edit(Projects $project){
           $skills=Skills::cursor();
        return view('projects.edit',compact('project','skills'));
    }
    public function update(Request $request, Projects $project){
        $request->validate([
            'name' =>['required','min:3'],
            'image'=>['nullable','image'],
            'project_url'=>['nullable'],
            'project_description'=>['nullable'],
            'skill_id'=>['nullable'],
        ]);
        $image=$project->image;
        if($request->hasFile('image')){
            Storage::delete($project->logo);
            $image=$request->file('image')->store('project');
        }
        $project->update([
            'name' => $request->name,
            'image'=>$image,
            'project_url'=>$request->project_url,
            'project_description'=>$request->project_description,
            'skill_id'=>$request->skill_id,
        ]);
        return to_route('project.index');
    }
    public function destroy(Request $request, Projects $project){
       
        Storage::delete($project->image);
        $project->delete();
        return back();
    } 
}
