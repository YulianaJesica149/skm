<?php

namespace App\Http\Controllers;

use App\Models\Respondent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ManUserController extends Controller
{
    public function index()
    {
        $respondents = Respondent::all();
        return view("admin.manajemenuser.index", compact('respondent'));
    }

    public function store(Request $request, Respondent $respondent)
    {
        // $request->validate([
        //     'umur' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'pendidikan' => 'required',
        //     'pekerjaan' => 'required',
        // ]); 
        $respondent = Respondent::create($request->all());

        return redirect("/respondent")->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Ditambahkan!')
        ]);
    }
}
