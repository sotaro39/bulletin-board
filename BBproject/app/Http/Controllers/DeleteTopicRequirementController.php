<?php

namespace App\Http\Controllers;

use App\Models\DeleteTopicRequirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteTopicRequirementController extends Controller
{
    public function store(Request $request)
    {
        $deleteTopicRequirement = new DeleteTopicRequireMent();
        $deleteTopicRequirement->topic_id = $request->topic_id;
        $deleteTopicRequirement->save();
        
        return redirect(route('topics.index'));
    }
}
