<?php

namespace App\Http\Controllers;


use App\Models\Result;
use App\Models\Service;
use App\Models\Question;
use App\Models\Respondent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return view("questionnaire.index", compact("services"));
    }

    public function store(Request $request, RespondentRequest $respondentRequest)
    {

        $umur = $request->input('umur');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $pendidikan = $request->input('pendidikan');
        $pekerjaan = $request->input('pekerjaan');

        $respondent = Respondent::create($respondentRequest->validated());

        $service_id = $request->service;
        $questions = Question::where('service_id', $service_id)->with('options')->get();
        return view('questionnaire.create',  compact('respondent', 'service_id', 'questions'));
    }


    public function saveAnswers(Request $request)
    {
        // Validasi data yang dikirim
        $validatedData = $request->validate([
            'respondent_id' => 'required|exists:respondents,id',
            'service_id' => 'required|exists:services,id',
            'answers' => 'required|array',
            'answers.*' => 'required|exists:options,id',
            'saran' => 'required',
        ]);

        // Simpan jawaban ke tabel results
        foreach ($validatedData['answers'] as $question_id => $option_id) {
            Result::create([
                'respondent_id' => $validatedData['respondent_id'],
                'service_id' => $validatedData['service_id'],
                'question_id' => $question_id,
                'option_id' => $option_id,
                'saran' => $validatedData['saran'],
            ]);
        }

        return redirect('/');
    }
}
