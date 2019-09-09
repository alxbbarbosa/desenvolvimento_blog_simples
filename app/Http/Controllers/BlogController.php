<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    public function index()
    {
        $title = "Mantenha Simplicidade";
        $sub_title  = "Por Alexandre Bezerra Barbosa";

        $categories = DB::table('categories as c')->select(DB::raw('c.category, count(*) as count'))
            ->join('articles as a', 'c.id', '=', 'a.category_id')
            ->groupBy('c.category')
            ->get();

        $articles = Article::with('category', 'user')->orderBy('created_at', 'desc')->paginate();
        return view('blog.index', compact('title', 'sub_title', 'articles', 'categories'));
    }

    public function article($id)
    {
        $title      = "Mantenha Simplicidade";
        $sub_title  = "Por Alexandre Bezerra Barbosa";
        $categories = DB::table('categories as c')->select(DB::raw('c.category, count(*) as count'))
            ->join('articles as a', 'c.id', '=', 'a.category_id')
            ->groupBy('c.category')
            ->where('a.user_id', auth()->user()->id)
            ->get();

        $article = Article::with('category', 'user')->findOrFail($id);
        return view('blog.single', compact('title', 'sub_title','article', 'categories'));
    }
}