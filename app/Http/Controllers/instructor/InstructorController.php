<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{

    public function login(){

        return view('backend.instructor.login');

    }


    public function dashboard(){
        return view('backend.instructor.index');
    }

    public function register(){
        return view('backend.instructor.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name ?? 'NULL',
            'last_name' => $request->last_name ?? 'NULL',
            'address' => $request->address ?? 'NULL' ,
            'phone' => $request->phone ?? 'NULL' ,
            'day' => $request->day ?? 'NULL' ,
            'month' => $request->month ?? 'NULL' ,
            'year' => $request->year ?? 'NULL' ,
            'city' => $request->city ?? 'NULL',
            'gender' => $request->gender ?? 'NULL',
            'country' => $request->country ?? 'NULL',
            'role' => 'instructor',

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('user.dashboard', absolute: false));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/instructor/login');
    }


}
