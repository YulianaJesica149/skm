<?php

namespace App\Http\Controllers;

use App\Models\Respondent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RespondentRequest;

class RespondentController extends Controller
{

    public function index(Request $request)
    {
        $respondents = Respondent::all();
        return view("admin.respondents.index", compact("respondents"));
    }

    public function create(Respondent $respondent)
    {
        $respondent = Respondent::all();
        return view("admin.respondents.create", compact("respondent"));
    }


    public function store(RespondentRequest $request)
    {

        Respondent::create($request->validated());

        return redirect("/respondent")->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Ditambahkan!')
        ]);
    }
    public function edit(Respondent $respondent, $id)
    {
        $respondent = Respondent::findOrFail($id);
        return view('admin.respondents.edit', compact('respondent'));
    }

    public function update(RespondentRequest $request, Respondent $respondent, $id)
    {
        $respondent = Respondent::findOrFail($id);
        $respondent->update($request->validated());

        return redirect('/respondent')->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Diubah!')
        ]);
    }

    public function destroy(Respondent $respondent, $id)
    {
        $respondent = Respondent::findOrFail($id);
        $respondent->delete();

        return redirect('/respondent')->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Dihapus!')
        ]);
    }
}
