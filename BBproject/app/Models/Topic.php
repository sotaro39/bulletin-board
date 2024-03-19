<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
class Topic extends Model
{
    use HasFactory;


    public static function getAllOrderByCreated_at()
{
    return self::orderBy('created_at')->get();
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

}
