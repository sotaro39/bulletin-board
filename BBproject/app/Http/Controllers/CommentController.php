<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($value)
    {

        $comment = new Comment();
        $data = ['comment' => $comment,'value' => $value];
        return view('comments.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|max:255'
        ]);

        $comment = new Comment();
        $comment->comment_text = $request->comment;
        $comment->topic_id = $request->topic_id;
        $comment->user_id = Auth::id();
        $comments = Comment::where('topic_id', '=', $request->topic_id)->get();
        $commentsNumber = count($comments);
        $comment->comment_id = $commentsNumber + 1;
        $comment->to_id = $request->to_id;
        $comment->save();

        return redirect(route('topics.show', $request->topic_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    public function deleteRequire(Comment $comment)                
    {
        //$topicId = $topic->id;
        //$topicName = $topic->topic_name;
        $comment = $comment;
        $user = Auth::user();
        $value = $comment->topic_id;
        return view('comments.deleteRequire',compact('comment', 'user', 'value'));  
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */

    public function destroy(Comment $comment)
    {
        //dd($comment);
        $id = $comment->id;
        //dd($id);
        $topicId = $comment->topic_id;
        //dd($topicId);

        $result = Comment::find($id)->delete();
        return redirect(route('topics.show', $topicId));
    }
}
