<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $title = "Registrasi";
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'nama' => 'required|string|max:255',
            'role' => 'required|in:admin,design,nesting,program,checker',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'role' => $request->role,
        ]);

        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Registrasi Berhasil',
            'message' => 'Silakan login dengan akun baru Anda',
        ]);

        return redirect()->route('register');
    }
}
