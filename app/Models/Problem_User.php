<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem_User extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'problem_id',
        'user_id',
    ];
    
    /*
    public function getByProblem_User(int $limit_count = 10)
    {
        return $this->problems()->with('problem_user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    */
}
