<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class CustomRegistration extends Controller
{
    public function create(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->role = $request->role;
        $user->save();

            $employer = new Employer();
            $employer->gender = $request->gender;
            $employer->user_id = $user->id;
            $employer->save();

            $company = new Company();
            $company->name = $request->company;
            $company->employer_id = $employer->id;
            $company->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);

    }

    public function googleAuthRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function googleAuth(){
        {
            $user = Socialite::driver('google')->user();

            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                Auth::login($existingUser);
                return redirect(RouteServiceProvider::HOME);
            } else {
                return view('jobhive.complete_account', compact('user'));
            }
        }
    }

}
