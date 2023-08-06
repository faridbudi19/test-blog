<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    // function untuk create data register
    public function store(Request $request)
    {
        // // return $request->all();

        // $request->validate([
        //     'name' => 'required|max:255',
        //     'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required|min:5|max:255'
        // ]);

        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // enkripsi password langsung dengan bcrypt
        // $validatedData['password'] = bcrypt($validatedData['password']); 

        // enkripsi password menggunakan method hash
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // flash message (menampilkan pesan sukses)
        // $request->session()->flash('sukses', 'Pendaftaran berhasil, silahkan login');

        return redirect('/login')->with('success', 'Register success, Please login');
    }
}
