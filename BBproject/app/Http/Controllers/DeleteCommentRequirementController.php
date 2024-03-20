<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeleteCommentRequirement;
use App\Models\Comment;

class DeleteCommentRequirementController extends Controller
{
     public function store(Request $request)
    {
        $deleteCommentRequirement = new DeleteCommentRequirement();
        $deleteCommentRequirement->comment_id = $request->comment_id;
        $deleteCommentRequirement->save();

        $commentId = $request->comment_id;
        $comment = Comment::find($commentId);
        $topicId = $comment->topic_id;
        //dd($topicId);

        
        return redirect(route('topics.show', $topicId));
    }
}
