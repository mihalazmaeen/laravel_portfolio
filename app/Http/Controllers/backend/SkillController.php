<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Models\Skills;
use Illuminate\Http\Request;
use Storage;

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
    public function edit(Skills $skill){
        return view('skills.edit',compact('skill'));
    }
    public function update(Request $request, Skills $skill){
        $request->validate([
            'name' =>['required','min:3'],
            'logo'=>['nullable','image']
        ]);
        $logo=$skill->logo;
        if($request->hasFile('logo')){
            Storage::delete($skill->logo);
            $logo=$request->file('logo')->store('skill');
        }
        $skill->update([
            'name' => $request->name,
            'logo'=>$logo,
            'rating'=>$request->rating,
        ]);
        return to_route('skill.index');
    }
    public function destroy(Request $request, Skills $skill){
       
        Storage::delete($skill->logo);
        $skill->delete();
        return back();
    } 
}
