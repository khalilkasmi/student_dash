<?php

namespace App\Http\Controllers;

use App\Level;
use App\Module;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;

class studentController extends Controller
{

    public function getUser($email){
        $user = User::where('email',$email)->firstOrFail();
        if (count($user) === 0){
            return response()->json(['error' => 'nothing found'], 404);
        }else{
            return response()->json($user);
        }
    }

    public function student_modules($id){
        $user = User::find($id);
        $level = Level::find($user->level_id)->id;
        $major = $user->major;
        $match = ['major' => $major, 'level_id' => $level];
        $modules = Module::where($match)->get();
        dd($modules);
        if(count($modules) === 0 ) {
            return response()->json(['error' => 'nothing found'], 404);
        }else{
            return response()->json(['modules'=>$modules]);
        }
    }
    public function getLevel($id){
        $user = User::find($id);
        $level = Level::find($user->level_id);

            return response()->json(['level'=>$level]);
        //}
    }
}
