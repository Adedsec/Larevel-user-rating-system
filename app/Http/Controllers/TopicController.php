<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $topics = Topic::all();
        return view('topics.index', compact('topics'));
    }

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    public function new()
    {
        return view('topics.new');
    }

    public function store(Request $request)
    {
        $this->validateTopic($request);
        $topic = Auth::user()->topics()->create($request->all());
        return redirect()->route('topic.show', $topic->id);
    }

    private function validateTopic(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);
    }
}
