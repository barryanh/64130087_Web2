<?php

namespace App\Http\Controllers\admin_vemoni;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::latest();

        if (!empty($request->get('keyword'))) {
            $topics = $topics->where('topicName', 'like', '%' . $request->get('keyword') . '%');
        }

        $topics = $topics->paginate(5);

        return view('admin_vemoni.topic_vemoni.list', compact('topics'));
    }

    public function create()
    {
        return view('admin_vemoni.topic_vemoni.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topicName' => 'required',
            'topicDescription' => 'required',
            'topicType' => 'required',
        ]);

        if ($validator->passes()) {
            $topic = new Topic();
            $topic->topicName = $request->topicName;
            $topic->topicDescription = $request->topicDescription;
            $topic->supervisorId = $request->supervisorId;
            $topic->topicType = $request->topicType;
            $topic->save();

            $request->session()->flash('success', 'Topic added successfully!');

            return response()->json([
                'status' => true,
                'message' => 'Topic added successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function view($topicId, Request $request)
    {
        $topic = Topic::find($topicId);

        if (empty($topic)) {
            return redirect()->route('topics.index');
        }

        return view('admin_vemoni.topic_vemoni.view', compact('topic'));
    }

    public function edit($topicId, Request $request)
    {
        $topic = Topic::find($topicId);

        if (empty($topic)) {
            return redirect()->route('topics.index');
        }

        return view('admin_vemoni.topic_vemoni.edit', compact('topic'));
    }

    public function update($topicId, Request $request)
    {
        $topic = Topic::find($topicId);

        if (empty($topic)) {
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Topic not found!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'topicName' => 'required',
            'topicDescription' => 'required',
            'topicType' => 'required',
        ]);

        if ($validator->passes()) {
            $topic->topicName = $request->topicName;
            $topic->topicDescription = $request->topicDescription;
            $topic->supervisorId = $request->supervisorId;
            $topic->topicType = $request->topicType;
            $topic->save();

            $request->session()->flash('success', 'Topic updated successfully!');

            return response()->json([
                'status' => true,
                'message' => 'Topic updated successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($topicId, Request $request)
    {
        $topic = Topic::find($topicId);

        if (empty($topic)) {
            return redirect()->route('topics.index');
        }

        $topic->delete();

        $request->session()->flash('success', 'Topic deleted successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Topic deleted successfully!'
        ]);
    }
}
