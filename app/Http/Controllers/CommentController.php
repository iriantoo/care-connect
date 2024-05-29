<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create($id_forum)
    {
        $this->middleware('auth');
        return view('comments.create', ['id_forum' => $id_forum]);
    }

    public function store(Request $request)
    {
        $this->middleware('auth');
        try{
            $validated = $request->validate([
                'content' => 'required|string',
            ]);
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->forum_id = $request->forum_id;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('forums.show', ['forum' => $request->forum_id]);
    }
}
