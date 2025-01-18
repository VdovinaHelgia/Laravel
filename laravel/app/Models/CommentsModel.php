<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    use HasFactory;

    protected $table = 'comments_models';

    protected $fillable = ['user_id', 'post_id', 'body'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(PostsModel::class, 'post_id');
    }
}
