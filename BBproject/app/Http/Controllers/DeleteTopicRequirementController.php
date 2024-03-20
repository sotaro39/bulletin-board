<?php

namespace App\Http\Controllers;

use App\Models\DeleteTopicRequirement;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteTopicRequirementController extends Controller
{
    public function index()
    {   
        $deleteTopicRequirements = DeleteTopicRequirement::get();
        //$deleteTopicIds = [];
        //dd($deleteTopicRequirements);

        /*foreach ($deleteTopicRequirements as $deleteTopicRequirement) {
            dd($deleteTopicRequirement);
        }*/

        //①	削除依頼が出ているトピックのidを配列$deleteTopicIdsに入れる
        $deleteTopics = [];
        $deleteTopicIds = [];
        foreach ($deleteTopicRequirements as $deleteTopicRequirement) {
            $deleteTopicId = $deleteTopicRequirement ['topic_id'];
            //dd($deleteTopicId);
            // Check if the ID is already in the list
            if (!in_array($deleteTopicId, $deleteTopicIds)) {
                //$deleteTopics[] = $deleteTopicRequirement;
                $deleteTopicIds[] = $deleteTopicId;
            }
        }
        //dd($deleteTopicIds);


        foreach ($deleteTopicIds as $deleteTopicId) {
            $deleteTopicInformation = Topic::find($deleteTopicId);
            $deleteTopicName = $deleteTopicInformation['topic_name'];
            //②	削除依頼が出ている各トピックについき、何件の削除依頼が出ているか数える
            $deleteTopicCount = DeleteTopicRequirement::where('topic_id', '=', $deleteTopicId)->count();
            //③	削除依頼トピックidと削除依頼件数の連想配列を値に持つ配列を作成する
            $deleteTopic = [
                'topic_id' => $deleteTopicId,
                'require_count' => $deleteTopicCount,
                'topic_name' => $deleteTopicName
            ];
            array_push($deleteTopics, $deleteTopic);
        }
        //dd($deleteTopics);

        //④	連想配列を削除件数が大きい順に配列を並べ替える
        $collection = collect($deleteTopics);
        $sortedDeleteTopics = $collection->sortBy([
        ['require_count', 'desc'],
        ['topic_id', 'asc'],
        ]);
        //dd($sortedDeleteTopics);
        //ここまでOK
        

        
        return view('deleteTopicRequirements.index',compact('sortedDeleteTopics'));

    }


    public function store(Request $request)
    {
        $deleteTopicRequirement = new DeleteTopicRequireMent();
        $deleteTopicRequirement->topic_id = $request->topic_id;
        $deleteTopicRequirement->save();
        
        return redirect(route('topics.index'));
    }

    public function destroy($id)
    {
        $result = Topic::find($id)->delete();
        $result = DeleteTopicRequirement::where('topic_id', '=', $id)->delete();
        return redirect(route('deleteTopicRequirements.index'));
    }


}
