<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;//Paa
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.registro');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate(
            $request,[
                'name'=> ['required','max:100'],
                'username'=> ['required','unique:users','min:5','max:20'],
                'email'=> ['required','unique:users','email'],
                'password'=>['required','confirmed','min:8'],
            ]
        );
        $usuario=user::create([
            'name'=>$request->name,
            'username'=> Str::lower($request->username),
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);

        auth()->attempt([
            'username'=> $request->username,
            'password'=> $request->password,
        ]);

        return redirect()->route('MuroIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
