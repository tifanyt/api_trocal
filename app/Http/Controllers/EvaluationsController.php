<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Evaluations;

class EvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id)
    {
        $evaluations = Evaluations::where('evaluated_id',$id)->get();
        if(isset($evaluations)){
          $evaluations->toJson();
        }

        return $evaluations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data=$request->json()->all();

        $new_evaluation                    = new Evaluations;
        $new_evaluation->assessor_id       = $data["assessor_id"];
        $new_evaluation->evaluated_id      = $data["evaluated_id"];
        $new_evaluation->transaction_id    = $data["transaction_id"];
        $new_evaluation->message           = $data["message"];
        $new_evaluation->note              = $data["note"];
        $new_evaluation->save();

        $evaluation = Evaluations::findOrFail($new_evaluation->id)->toJson();
        return $evaluation;
    }
}
