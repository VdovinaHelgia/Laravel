<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'user_id', 'status', 'image'];
    public function user()
    {
        return $this->belongsTo(Users::class); 
    }
}
