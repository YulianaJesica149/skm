<?php

namespace App\Http\Controllers;


use App\Models\Service;
use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view("admin.questions.index", compact("questions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all()->pluck('service_text', 'id');
        return view('admin.questions.create', compact('services'));
    }


    public function store(QuestionRequest $request): RedirectResponse
    {
        $question = Question::create($request->validated());

        return redirect('/question')->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Ditambahkan!')
        ]);
    }


    public function edit(Question $question, $id)
    {

        $question = Question::with('Service')->findOrFail($id);
        $services = Service::all()->pluck('service_text', 'id_service');
        // $services = Service::where('id', '!=', $question->service_id)->get(['id', 'service_text']);
        return view('admin.questions.edit', compact('question', 'services'));
    }

    public function update(QuestionRequest $request, Question $question, $id): RedirectResponse
    {
        $question = Question::findOrFail($id);
        $question->update($request->validated());

        return redirect('/question')->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Diubah!')
        ]);
    }

    public function destroy($id)
    {
        $question = Question::with('Service')->findOrFail($id);
        $question->delete();


        return redirect('/question')->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Dihapus!')
        ]);
    }
}
