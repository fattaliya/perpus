<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        // $roles=DB::table('users')->get('role');

        return view('auth.index');
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'jabatan' => 'required',
       ]);

       $validatedData['password'] = bcrypt($validatedData['password']);

       User::create($validatedData);

    //    $request->session()->flash('success', 'Registration successfull! Please login');

       return redirect('/login')->with('success', 'Registrasi Berhasil! Silakan Login');
    }
}
