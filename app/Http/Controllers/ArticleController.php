<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
		$articles = Article::latest()->published()->get();
		return view('article.index', compact('articles'));
	}
	
	public function create()
    {
        return view('article.create');
    }

    public function store(StoreArticleRequest $request)
    {
        $input = $request->all();
		$input['introdution'] = mb_substr($request->get('content'),0,64);
		$input['published_at'] = Carbon::now();
		$article = Article::create($input);

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return back();
    }

    public function massDestroy(MassDestroyArticleRequest $request)
    {
        Article::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
