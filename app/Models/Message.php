<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
    
    protected $fillable = [
        'user_id',
        'problem_id',
        'message',
    ];
}
