<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Category;
use App\Models\Level;
use App\Http\Requests\ProblemRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Problem $problem, Category $category, Level $level)
    {
        return view('categories.index')->with(['problems' => $category->getByCategory(), 'categories' => $category->get(), 'levels' => $level->get()]);
    }
}
