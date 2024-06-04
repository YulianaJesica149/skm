<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
{
    public function index()
    {
        return view('updatepassword.index');
    }

    public function edit(Request $request)
    {
        return view('updatepassword.edit');
    }

    public function update(Request $request)
    {
        return view('updatepassword.index');
    }
}
