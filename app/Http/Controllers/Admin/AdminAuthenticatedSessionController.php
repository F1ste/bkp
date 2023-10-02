<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        Auth::guard('web')->logout();
        return view('auth.admin');
    }





    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Admin\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {



         $user = User::where('name', $request->email)->first();


        if(!isset($user)){
            return redirect(route('authorization'));
        }

        $formFields = $request->only(['email', 'password']);
        $formFields['email'] = $user->email;



        if(Auth::attempt($formFields)){
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect(route('authorization'));
    }


}
