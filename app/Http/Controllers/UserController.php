<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Category;
use App\Models\Level;
use App\Models\User;
use App\Http\Requests\ProblemRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Problem $problem, Category $category, Level $level, User $user)
    {
        return view('statuses.index')->with(['problems' => $user->getByUser(), 'categories' => $category->get(), 'levels' => $level->get(), 'users' => $user->get()]);
    }
}
