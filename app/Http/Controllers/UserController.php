<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::where('role', $request->role)->get();

        if ($request->role == 'A') {
            return view('admin/pages/users/admin.index', [
                'data' => $user,
            ]);
        } else if ($request->role == 'S') {
            return view('admin/pages/users/seller.index', [
                'data' => $user,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $new_user = new User();

        $user = (object) $new_user->getDefaultValues();

        if ($request->role == 'A') {
            return view('admin/pages/users/admin.form', [
                'user' => $user,
            ]);
        } else if ($request->role == 'S') {
            return view('admin/pages/users/seller.form', [
                'user' => $user,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
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
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        if ($request->role <> 'A') {
            event(new Registered($user));
        }

        if ($request->role == 'A') {
            return redirect('admin/user?role=A')->with('success', 'Data Admin Berhasil Ditambahkan!');
        } else if ($request->role == 'S') {
            return redirect('admin/user?role=S')->with('success', 'Data Penjual Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = User::find($id);

        if ($request->role == 'A') {
            return view('admin/pages/users/admin.form', ['user' => $data, 'id' => $id]);
        } else {
            return view('admin/pages/users/seller.form', ['user' => $data, 'id' => $id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['confirmed'],
        ], [
            'name.required' => 'Kolom nama masih kosong!',
            'name.string' => 'Kolom nama harus bertipe huruf/angka!',
            'name.max' => 'Kolom nama maksimal 255 karakter!',
            'email.required' => 'Kolom e-mail masih kosong!',
            'email.string' => 'Kolom e-mail harus bertipe huruf/angka!',
            'email.email' => 'Kolom e-mail harus berformat e-mail!',
            'email.max' => 'Kolom e-mail maksimal 255 karakter!',
            'email.unique' => 'E-mail sudah digunakan!',
            'password.confirmation' => 'Password tidak sama!',
        ]);

        if ($data['password'] === null) {
            unset($data['password']);
        }

        $user = User::where('id', $id)->update($data);


        if ($request->role == 'A') {
            return redirect('admin/user?role=A')->with('success', 'Data Admin Berhasil Diperbaharui!');
        } else if (Auth::user()->role === 'S') {
            return redirect('/seller');
        } else if ($request->role == 'S') {
            return redirect('admin/user?role=S')->with('success', 'Data Penjual Berhasil Diperbaharui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = User::where('id', $id)->value('role');
        $user = User::where('id', $id)->delete();

        if ($role == 'A') {
            return redirect('admin/user?role=A')->with('success', 'Data Admin Berhasil Dihapus!');
        } else if ($role == 'S') {
            return redirect('admin/user?role=S')->with('success', 'Data Penjual Berhasil Dihapus!');
        }
    }
}
