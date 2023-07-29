<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Message;
use App\Models\User;
use App\Http\Requests\ProblemRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request, Problem $problem, Message $message)
    {
        $input = $request['message'];
        $input += ['user_id' => Auth::id()];
        $input += ['problem_id' => $problem->id];
        $message->fill($input)->save();
        return redirect('/answers/' . $problem->id);
    }
}
