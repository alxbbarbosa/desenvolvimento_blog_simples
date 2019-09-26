<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class ApiCommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('user', 'replies')
            ->orderByDesc('id')
            ->whereNull('parent_id')
            ->get();

        return response($comments, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response($request->name, 200);

        /*
    $data = $request->validate([
    'body' => 'required|string'
    ]);

    $data = $request->only('article_id', 'name', 'picture',
    'homepage', 'email', 'body');
    $data['ip_address'] = $request->ip();
    $data['article_id'] = $data['article_id'] ?? 1;

    $comment = auth()->user()
    ->comments()
    ->create($data);

    $comment->load('user');

    return response($comment, 200);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'body' => 'required|string',
        ]);

        $comment->body = $data['body'];

        $comment->save();

        $comment->load('user');

        return response($comment, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment->delete();

        return response(null, 204);
    }
}