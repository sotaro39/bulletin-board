<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;


    public static function getAllOrderByCreated_at()
{
    return self::orderBy('created_at','desc')->get(); //変更
}

}
