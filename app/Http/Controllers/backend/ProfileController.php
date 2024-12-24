<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\admin\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }


    public function index(){
        return view('backend.admin.profile.index');
    }

    public function store(ProfileRequest $request){

         // Pass data and files to the service
         $this->profileService->saveProfile($request->validated(), $request->file('photo'));
         return redirect()->back()->with('success', 'Profile Updated successfully');

    }
}
