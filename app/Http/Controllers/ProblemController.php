<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Category;
use App\Models\Level;
use App\Models\Message;
use App\Models\User;
use App\Models\Problem_User;
use App\Http\Requests\ProblemRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class ProblemController extends Controller
{
    public function index(Problem $problem, Category $category, Level $level)
    {
        return view('problems.index')->with(['problems' => $problem->getPaginateByLimit(), 'categories' => $category->get(), 'levels' => $level->get()]);
    }
    
    public function show(Problem $problem)
    {
        return view('problems.problem')->with(['problem' => $problem]);
    }
    
    public function showAnswer(Problem $problem, Message $message, User $user)
    {
        return view('problems.answer')->with(['problem' => $problem, 'messages' => $message->get(), 'users' => $user->get()]);
    }
    
    public function create(Category $category, Level $level, User $user)
    {
        return view('problems.create')->with(['categories' => $category->get(), 'levels' => $level->get(), 'users' => $user->get()]);
    }
    
    public function store(Problem $problem, ProblemRequest $request)
    {
        $input = $request['problem'];
        if ($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_path' => $image_url];
        }
        if ($request->file('imageAns')){
            $image_url = Cloudinary::upload($request->file('imageAns')->getRealPath())->getSecurePath();
            $input += ['image_pathAns' => $image_url];
        }
        $input += ['user_id' => Auth::id()];
        $problem->fill($input)->save();
        return redirect('/problems/' . $problem->id);
    }
    
    public function edit(Problem $problem, Category $category, Level $level)
    {
        return view('problems.edit')->with(['problem' => $problem, 'categories' => $category->get(), 'levels' => $level->get()]);
    }
    
    public function update(ProblemRequest $request, Problem $problem)
    {
        $input_problem = $request['problem'];
        $problem->fill($input_problem)->save();
        
        return redirect('/problems/' . $problem->id);
    }
    
    public function delete(Problem $problem)
    {
        $problem->delete();
        return redirect('/');
    }
    
    public function favorite(Problem $problem, Problem_User $problemUser)
    {
        $input = ['user_id' => Auth::id(), 'problem_id' => $problem->id];
        $problemUser->fill($input)->save();
        return redirect('/answers/' . $problem->id);
    }
}
