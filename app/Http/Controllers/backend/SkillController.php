<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillController extends Controller
{
       public function index(){
        $skills=Skills::all();
        return view('skills.index',compact('skills'));
    }
       public function create(){
        return view('skills.create');
    }
      public function store(StoreSkillRequest $request){
         if($request->hasFile('logo')){
            $image=$request->file('logo')->store('skills'); 
            Skills::create([
                'name'=>$request->name,
                'logo'=>$image,
                'rating'=>$request->rating

            ]);
            return to_route('skill.index');

         }
         return back();
    }
}
