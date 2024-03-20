<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::getAllOrderByCreated_at();
        $user =  Auth::user();
        return view('topic.index',compact('topics', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topic.create');
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
            'topic_name' => 'required|max:255',
        ]);

        $topic = new Topic();
        $topic->topic_name = $request->topic_name;
        $topic->user_id =  Auth::id();
        $topic->save();

        return redirect(route('topics.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $topic = Topic::find($id);
        //dd($topic);
        $user =  Auth::user();
        
        //$user = User::find($id);

        $comments = Comment::where('topic_id', '=', $id)->get();
        
        return view('topic.show', compact('topic','comments','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */

    public function edit(Topic $topic)                
    {
        //
    }

    //変更
    public function deleteRequire(Topic $topic)                
    {
        //$topicId = $topic->id;
        //$topicName = $topic->topic_name;
        $topic = $topic;
        $user = Auth::user();
        return view('topic.deleteRequire',compact('topic', 'user'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Topic::find($id)->delete();
        return redirect(route('topics.index'));
    }
}
