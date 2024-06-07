<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class OptionController extends Controller
{
    public function index()
    {
        $options = Option::all();
        return view('admin.options.index', compact('options'));

        // $options = Option::with('Question')->get();
        // return view('admin.options.index', ['options' => $options]);
    }

    public function create()
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.options.create', compact('questions'));
    }

    public function store(OptionRequest $request)
    {
        Option::create($request->validated());

        return redirect('/option')->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Ditambahkan!')
        ]);
    }

    public function edit(Option $option, $id)
    {
        $option = Option::with('question')->findOrFail($id);
        // $question = Question::where('id', '!=', $option->question_id)->get(['id', 'question_text']);
        $questions = Question::all()->pluck('question_text', 'id');
        return view('admin.options.edit', compact('option', 'questions'));
    }


    public function update(OptionRequest $request, Option $option, $id)
    {
        $option = Option::findOrFail($id);
        $option->update($request->validated());
        return redirect('/option')->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Diubah!')
        ]);
    }

    public function destroy($id): RedirectResponse
    {
        $option = Option::findOrFail($id);
        $option->delete();

        return redirect('/option')->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Dihapus!')
        ]);
    }
}
