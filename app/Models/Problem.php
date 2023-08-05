<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Problem extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function getPaginateByLimit(int $limit_count =10)
    {
        return $this::with('category','level','user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'user_id',
        'category_id',
        'level_id',
        'title',
        'problem',
        'answer',
        'image_path',
        'image_pathAns',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
