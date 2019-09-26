<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Config;
use App\Models\Comment;
use App\Models\Article;
use App\Models\Visitor;
use App\Models\Visualization;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Config $model)
    {
        $this->middleware('permission:config-edit',
            ['only' => ['edit', 'update']]);
        $this->middleware('auth');
        $this->model = $model;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $visitors = Visitor::whereBetween('date',
                [date('Y-m-01'), date('Y-m-t')])->get()->toArray();
        if ($visitors) {
            $visitorsCoordinates = array_map(function($e) {
                //"{ latLng: [41.9, 12.45], name: "Vatican City" }";
                $data = new \stdClass;
                $data->latLng = [round((float) $e['lat'], 2), round((float)$e['long'], 2)];
                $data->name   = $e['city'];
                return $data;
            }, $visitors);
        } else {
            $visitorsCoordinates = [];
        }
        $num_visitantes    = Visitor::all()->count();
        $num_visualizacoes = Visualization::all()->count();
        $num_comentarios   = Comment::all()->count();
        $num_articles      = Article::all()->count();
        $comentarios       = Comment::all();
        $articles          = Article::with('category')
            ->limit(10)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.dashboard.home',
            compact('num_comentarios', 'num_articles', 'articles',
                'num_visitantes', 'num_visualizacoes', 'visitorsCoordinates'));
    }

    public function showConfig()
    {

    }

    public function editConfig()
    {
        $recordSet = Config::findOrFail(1);
        return view('admin.config.edit', compact('recordSet'));
    }

    public function updateConfig(Request $request, $id)
    {
        $recordSet = Config::findOrFail($id);
        $ativo     = $request->has('allows_registration') ? true : false;
        if ($recordSet) {
            $recordSet->update($request->only(
                    'title', 'sub_title', 'copyright', 'link_facebook',
                    'link_twitter', 'link_google_plus', 'link_instagram',
                    'link_github', 'link_flickr', 'link_skype',
                    'paragraph_title_footer', 'paragraph_footer') + [
                'allows_registration' => $ativo]);
        }
        return redirect()->back()->withSuccess('Configurações atualizadas com êxito');
    }

    public function editProfile()
    {
        $recordSet = auth()->user();
        return view('admin.profile.edit', compact('recordSet'));
    }

    public function updateProfile(Request $request, $id)
    {
        $recordSet = User::findOrFail($id);
        if ($recordSet) {
            $recordSet->update($request->only('name', 'email'));
        }
        return redirect()->back()->withSuccess('Configurações atualizadas com êxito');
    }

    public function editPassword()
    {
        $recordSet = auth()->user();
        return view('admin.password.edit', compact('recordSet'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|confirmed|confirmed|min:8'
        ]);

        $password = bcrypt($request->get('password'));

        $recordSet = User::findOrFail($id);
        if ($recordSet) {
            $recordSet->update(['password' => $password]);
        }
        return redirect()->back()->withSuccess('Configurações atualizadas com êxito');
    }
}