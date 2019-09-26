<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Article;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Models\Visualization;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    protected $config;
    protected $sub_title;
    protected $copyright;
    protected $categories;
    protected $last_articles;

    public function __construct()
    {
        $this->config = Config::findOrFail(1);

        $this->last_articles = Article::with('category')
            ->select('id', 'title', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $this->categories = DB::table('categories as c')->select(DB::raw('c.category, count(*) as count'))
            ->join('articles as a', 'c.id', '=', 'a.category_id')
            ->groupBy('c.category')
            ->get();
    }

    public function index(Request $request)
    {
        // Adicionar Visitação
        if (!Visitor::haveAlreadyVisited($request->ip(), date('Y-m-d'))) {
            Visitor::addVisitor($request->ip(), date('Y-m-d'));
        }

        // Adicionar Visualização
        if (!Visualization::haveAlreadyViewed($request->ip(), date('Y-m-d'))) {
            Visualization::addVisualizaton($request->ip(), date('Y-m-d'));
        }

        $articles = Article::with('category', 'user')->orderBy('created_at',
                'desc')->paginate();

        return view('blog.index',
            [
                'config' => $this->config,
                'articles' => $articles,
                'categories' => $this->categories,
                'last_articles' => $this->last_articles
        ]);
    }

    public function article(Request $request, $id)
    {
        // Adicionar visitação
        if (!Visitor::haveAlreadyVisited($request->ip(), date('Y-m-d'))) {
            Visitor::addVisitor($request->ip(), date('Y-m-d'));
        }

        // Adicionar Visualização
        if (!Visualization::haveAlreadyViewed($request->ip(), date('Y-m-d'), $id)) {
            Visualization::addVisualizaton($request->ip(), date('Y-m-d'), $id);
        }

        $article = Article::with(['category', 'user', 'approvedComments', 'tagged'])->findOrFail($id);
        return view('blog.single',
            [
                'config' => $this->config,
                'article' => $article,
                'categories' => $this->categories,
                'last_articles' => $this->last_articles
            ]
        );
    }
}