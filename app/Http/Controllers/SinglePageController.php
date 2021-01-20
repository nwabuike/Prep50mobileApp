<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\University;
use App\State;
use App\Polytechnic;

class SinglePageController extends Controller
{
    //
   
    public function getAllUni(){

        $subjects = University::all();
       return $subjects->toJson();
        // return view('subjects.Subject')->with('subjects',$subjects);
    }
    public function getAllPoly(){

        $subjects = Polytechnic::all();
       return $subjects->toJson();
        // return view('subjects.Subject')->with('subjects',$subjects);
    }
    public function getAllDept(){

        $subjects = Department::all();
       return $subjects->toJson();
        // return view('subjects.Subject')->with('subjects',$subjects);
    }
    public function getAllState(){

        $subjects = State::all();
       return $subjects->toJson();
        // return view('subjects.Subject')->with('subjects',$subjects);
    }
}
