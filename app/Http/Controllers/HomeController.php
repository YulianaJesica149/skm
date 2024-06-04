<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Service;
use App\Models\Question;
use App\Models\Respondent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RespondentRequest;
use App\Http\Requests\StoreKuesionerRequest;

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

        // return view("kuesioner.index");
    }

    public function store(RespondentRequest $request)
    {
        Respondent::create($request->validated());
        return redirect('/kuesioner-add');
        // return view('kuesioner.create');
        // $services = Service::findOrFail($id);
        // $services = Service::all()->pluck('service_text', 'id');
        // return redirect('/kuesioner/{id}')->with(compact("services"));
    }
    // public function layanan(Service $service)
    // {
    //     // $services = Service::all();
    //     return view('kuesioner');
    // }

    public function create(Service $service)
    {
        // $questions = Service::findOrFail(1)->questions;


        // $questions = Question::with('options', function ($query) {
        //     $query->inRandomOrder();
        // })
        //     ->whereHas('questions');

        // $services = Service::with('questions', function ($query) {
        //     $query->inRandomOrder()
        //         ->with(['options' => function ($query) {
        //             $query->inRandomOrder();
        //         }]);
        // })
        //     ->whereHas('questions');


        // $services = Service::get();
        // return view('kuesioner', compact('services'));

        $questions = Question::get();

        return view('kuesioner.create', compact('questions'));
        // return redirect()->route('kuesioner', $service->id);

        ///coba arahkan ke id

    }

    public function kuesioner_act(StoreKuesionerRequest $request)
    {
        $options = Option::find(array_values($request->input('question')));

        // $result = auth()->user()->userResults()->create([
        //     'total_points' => $options->sum('points')
        // ]);

        $questions = $options->mapWithKeys(function ($option) {
            return [
                $option->question_id => [
                    'option_id' => $option->id,
                    'points' => $option->points
                ]
            ];
        })->toArray();

        // $result->questions()->sync($questions);

        return redirect('/kuesioner');
    }

    public function services(Request $request)
    {
        $data['services'] = Service::get(["service_text", "id"]);
        return view('kuesioner', $data);
        // $options = Option::all();
        // $results = Result::all();
        // $services = Service::all()->pluck(["service_text", "id"]);
        // $questions = Question::all()->pluck(['question_text', 'id']);
        // $questions = Question::where("question_text", $request->question_text)
        //     ->get(["question_text", "id"]);
        // $options = Option::where("question_id", $request->question_id)
        //     ->get(["option_text", "id"]);
        // return view('kuesioner', compact('questions', 'options'));

        // $questions = Question::where("question_text", $request->question_text)
        //     ->get();
        // $options = Option::where("question_id", $request->question_id)
        //     ->get(["option_text", "id"]);
        // $options = $options->toArray();
        // $data = array();
        // foreach ($questions as $key => $question) {
        //     $newarr = array();
        //     $newarr['question_text'] = $question->question_text;
        //     $newarr['option_text'] = $options[$key]->option_text;
        //     $data[] = $newarr;
        // }
        // return view('kuesioner')->with('data', $data);
    }

    // public function kuesioner_act(Request $request)
    // {
    //     // $option = Option::create($request->validated());
    //     // Result::create($request->validated());
    //     // return view('layouts.home');
    // }

    // public function tampil(Request $request)
    // {
    //     // $question = Question::get(["question_text", "id"]);
    //     // // $data['questions'] = Question::get(["question_text", "id"]);
    //     // // $data['options'] = Option::get(["option_text", "id"]);
    //     // return response()->json($question);

    //     $data['questions'] = Question::where("service_id", $request->service_id)
    //         ->get(["question_text", "id"]);
    //     $data['options'] = Option::where("question_id", $request->question_id)
    //         ->get(["option_text", "id"]);

    //     return response()->json($data);
    // }
    public function questions(Request $request)
    {
        $data['questions'] = Question::where("service_id", $request->service_id)
            ->get(["question_text", "id"]);
        // $data['options'] = Option::where("question_id", $request->question_id)
        //     ->get(["option_text", "id"]);

        return response()->json($data);
    }
    public function options(Request $request)
    {
        $data['options'] = Option::where("question_id", $request->question_id)
            ->get(["option_text", "id"]);

        return response()->json($data);
    }
}

////INI DI BAWAH DAH BAGUS JENIS PELAYANAN DAH MUNCUL

// public function services()
// {
//     $data['services'] = Service::get(["service_text", "id"]);
//     return view('kuesioner', $data);
// }
// // /**
// //  * Write code on Method
// //  *
// //  * @return response()
// //  */
// public function questions(Request $request)
// {
//     $data['questions'] = Question::where("service_id", $request->service_id)
//         ->get(["question_text", "id"]);

//     return response()->json($data);
// }
        
            // public function services()
            // {
            //     // $service = Service::get(["service_text", "id"]);
            //     $services = Service::all();
            //     return view("kuesioner", compact('services'));
            // }
        
            // public function question(Request $request)
            // {
            //     $service_id = $request->service_id;
            //     $question = Question::where('service_id', $service_id)->get();
        
            //     return response()->json($question);
        
            //     // // foreach ($questions as $question) {
            //     // //     echo "<option value= '$question->id'> $question->question_text</option>";
            //     // // }
            //     // // $question = Question::where('service_id', $service_id)->get(["question_text", "id"]);
            //     // return Service::findOrFail($request->id, ['question'])->question->pluck("question_text", "id");
            // }