<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class ReplyController extends Controller
{
    public function index($id)
    {   
        $comment = Comment::find($id);
        //dd($comment->topic_id);
        $replies = Comment::where('to_id', '=', $id)->get();
        return view('replies.index',compact('replies', 'comment'));
    }

}
