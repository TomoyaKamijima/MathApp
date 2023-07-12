<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;
use App\Http\Requests\ProblemRequest;

class ProblemController extends Controller
{
    public function index(Problem $problem)
    {
        return view('problems.index')->with(['problems' => $problem->getPaginateByLimit()]);
    }
    
    public function show(Problem $problem)
    {
        return view('problems.problem')->with(['problem' => $problem]);
    }
    
    public function create()
    {
        return view('problems.create');
    }
    
    public function store(Problem $problem, ProblemRequest $request)
    {
        $input = $request['problem'];
        $problem->fill($input)->save();
        return redirect('/problems/' . $problem->id);
    }
}
