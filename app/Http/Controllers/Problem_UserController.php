<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Category;
use App\Models\Level;
use App\Models\User;
use App\Models\Problem_User;
use App\Http\Requests\ProblemRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class Problem_UserController extends Controller
{
    public function index(Problem $problem, Category $category, Level $level, Problem_User $problem_user)
    {
        return view('favorites.index')->with(['problems' => $problem_user->getByProblem_User(), 'categories' => $category->get(), 'levels' => $level->get()]);
    }
}
