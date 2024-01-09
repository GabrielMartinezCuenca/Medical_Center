<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    public function create(){
        return view('admin.auth.login');
    }

    public function store(Request $request){
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('admin.index');

    }
}
