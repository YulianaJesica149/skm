<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Service;
use App\Models\Question;
use App\Models\Respondent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use App\Http\Requests\RespondentRequest;

class HomeController extends Controller
{
    public function home()
    {
        return view("layouts.home");
    }
    public function index()
    {
        Respondent::all();
        $services = Service::all();
        return view("kuesioner.index", compact("services"));
    }

    public function store(Request $request, RespondentRequest $respondentRequest)
    {

        $umur = $request->input('umur');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $pendidikan = $request->input('pendidikan');
        $pekerjaan = $request->input('pekerjaan');

        Respondent::create($respondentRequest->validated());


        $request->service;
        // $result->service_id = $request->input('service_id');
        $questions = Question::where('service_id', $request->service)->get();


        return view('kuesioner.create', compact('questions'));
    }
    public function result(ResultRequest $result)
    {
        Result::create($result->validated());
        return redirect('/');
    }
}
