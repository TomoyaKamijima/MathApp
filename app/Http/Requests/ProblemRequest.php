<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProblemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
    public function authorize()
    {
        return false;
    }
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'problem.user_id' => 'required|integer|max:11',
            'problem.category_id' => 'required|integer|max:11',
            'problem.level_id' => 'required|integer|max:11',
            'problem.title' => 'required|string|max:50',
            'problem.problem' => 'required|string|max:1000',
            'problem.answer' => 'required|string|max:10000',
        ];
    }
}
