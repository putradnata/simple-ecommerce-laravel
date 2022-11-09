<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'name.required' => 'Kolom nama masih kosong!',
            'name.string' => 'Kolom nama harus bertipe huruf/angka!',
            'name.max' => 'Kolom nama maksimal 255 karakter!',
            'email.required' => 'Kolom e-mail masih kosong!',
            'email.string' => 'Kolom e-mail harus bertipe huruf/angka!',
            'email.email' => 'Kolom e-mail harus berformat e-mail!',
            'email.max' => 'Kolom e-mail maksimal 255 karakter!',
            'email.unique' => 'E-mail sudah digunakan!',
            'password.required' => 'Kolom password masih kosong!',
            'password.confirmation' => 'Password tidak sama!',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'B',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect(route('after-register'));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}
