<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructorController extends Controller
{

    public function login(){

        return view('backend.instructor.login');

    }


    public function dashboard(){
        return view('backend.instructor.index');
    }
}
