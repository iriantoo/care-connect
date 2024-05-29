<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forums = Forum::all();
        return view('forums.index', compact('forums'));
    }

    public function adminIndex()
    {
        $this->middleware('auth');
        $this->middleware(AdminMiddleware::class);
        $forums = Forum::paginate(10);
        return view('admin.forums.index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->middleware('auth');
        return view('forums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        try{
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'date_of_incident' => 'required|date',
                'time_of_incident' => 'required|date_format:H:i',
            ]);
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $path = 'img/forum';
        
        $forum = new Forum();
        if($request->hasFile('picture')) {
            $file = $request->file('picture');
            $forum->picture = $file->getClientOriginalName();
        }
        $forum->user_id = auth()->id();
        $forum->title = $request->title;
        $forum->description = $request->description;
        $forum->date_of_incident = $request->date_of_incident;
        $forum->time_of_incident = $request->time_of_incident;
        if($request->has('is_anonymous')) {
            $forum->is_anonymous = true;
        }
        $forum->save();

        if($request->hasFile('picture')) {
            $file->move($path, $file->getClientOriginalName());
        }

        return redirect()->route('forums.index')->with('success', 'Forum created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $forum = Forum::find($id);
        $comments = Comment::where('forum_id', $id)->get();
        return view('forums.show', compact('forum', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $forum = Forum::find($id);
        $forum->delete();

        return redirect()->back()->with('success', 'Forum berhasil dihapus');
    }

    public function list()
    {
        $this->middleware('auth');
        $forums = Forum::where('user_id', auth()->id())->paginate(10);
        return view('forums.list', compact('forums'));
    }

    public function adminConfirm(Request $request)
    {
        $this->middleware('auth');
        $this->middleware(AdminMiddleware::class);

        $forum = Forum::find($request->forum_id);
        $forum->is_confirmed = true;
        $forum->save();

        return redirect()->route('forums.adminIndex')->with('success', 'Forum berhasil di konfirmasi');
    }
}
