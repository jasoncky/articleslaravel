<?php

namespace App\Http\Controllers\Api\V1;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticlesApiController extends Controller
{
    public function index()
    {
        return (new ArticleResource(Article::all()))
			->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->all());

        return (new ArticleResource($article))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Article $article)
    {
        return (new ArticleResource($article))
			->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function update(UpdateClientRequest $request, Article $article)
    {
        $article->update($request->all());

        return (new ArticleResource($article))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
