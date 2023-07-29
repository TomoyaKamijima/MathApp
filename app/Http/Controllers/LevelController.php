<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Category;
use App\Models\Level;
use App\Http\Requests\ProblemRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function index(Problem $problem, Category $category, Level $level)
    {
        return view('levels.index')->with(['problems' => $level->getByLevel(), 'categories' => $category->get(), 'levels' => $level->get()]);
    }
}
