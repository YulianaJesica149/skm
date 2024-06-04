<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Service;
use App\Models\Question;
use App\Models\Respondent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RespondentRequest;
use App\Http\Requests\StoreKuesionerRequest;


class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Service $services)
    {

        $services = Service::with('serviceQuestion', function ($query) {
            $query->inRandomOrder()
                ->with(['questionOption' => function ($query) {
                    $query->inRandomOrder();
                }]);
        })
            ->whereHas('serviceQuestion');

        return view('datarespondents.kuesioner', compact('services'));
    }



    public function store(StoreKuesionerRequest $request)
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

        return redirect('datarespondents.kuesioner');
        // $request->validate([
        //     'jenis_pelayanan' => 'required',
        //     'kualitas' => 'required',
        //     'saran' => 'required',

        // ]);
    }
}
