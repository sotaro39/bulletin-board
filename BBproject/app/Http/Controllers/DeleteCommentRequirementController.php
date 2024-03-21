<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeleteCommentRequirement;
use App\Models\Comment;
use App\Models\Topic;

class DeleteCommentRequirementController extends Controller
{
    public function index()
    {   
        $deleteCommentRequirements = DeleteCommentRequirement::get();
        //$deleteTopicIds = [];
        //dd($deleteTopicRequirements);

        /*foreach ($deleteTopicRequirements as $deleteTopicRequirement) {
            dd($deleteTopicRequirement);
        }*/

        //①	削除依頼が出ているコメントのidを配列$deleteCommentIdsに入れる
        $deleteComments = [];
        $deleteCommentIds = [];
        foreach ($deleteCommentRequirements as $deleteCommentRequirement) {
            $deleteCommentId = $deleteCommentRequirement ['comment_id'];
            //dd($deleteTopicId);
            // Check if the ID is already in the list
            if (!in_array($deleteCommentId, $deleteCommentIds)) {
                //$deleteTopics[] = $deleteTopicRequirement;
                $deleteCommentIds[] = $deleteCommentId;
            }
        }
        //dd($deleteCommentIds);


        foreach ($deleteCommentIds as $deleteCommentId) {
            $deleteCommentInformation = Comment::find($deleteCommentId);
            $deleteCommentText = $deleteCommentInformation['comment_text'];
            $deleteCommentTopicId = $deleteCommentInformation['topic_id'];
            $deleteCommentTopicCommentId = $deleteCommentInformation['comment_id'];
            $deleteCommentTopicInformation = Topic::find($deleteCommentTopicId);
            $deleteCommentTopicName = $deleteCommentTopicInformation['topic_name'];

            //②	削除依頼が出ている各トピックについき、何件の削除依頼が出ているか数える
            $deleteCommentCount = DeleteCommentRequirement::where('comment_id', '=', $deleteCommentId)->count();
            //③	削除依頼トピックidと削除依頼件数の連想配列を値に持つ配列を作成する
            $deleteComment = [
                'comment_id' => $deleteCommentId,
                'require_count' => $deleteCommentCount,
                'comment_text' => $deleteCommentText,
                'comment_topic_id' => $deleteCommentTopicId,
                'comment_topic_name' => $deleteCommentTopicName,
                'comment_topic_comment_id' => $deleteCommentTopicCommentId
            ];
            array_push($deleteComments, $deleteComment);
        }
        //dd($deleteTopics);

        //④	連想配列を削除件数が大きい順に配列を並べ替える
        $collection = collect($deleteComments);
        $sortedDeleteComments = $collection->sortBy([
        ['require_count', 'desc'],
        ['comment_id', 'asc'],
        ]);
        //dd($sortedDeleteTopics);
        //ここまでOK
        

        
        return view('deleteCommentRequirements.index',compact('sortedDeleteComments'));
    }

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

    public function destroy($id)
    {
        $result = Comment::find($id)->delete();
        $result = DeleteCommentRequirement::where('comment_id', '=', $id)->delete();
        return redirect(route('deleteCommentRequirements.index'));
    }



}
