@extends('layouts.main')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.article.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('articles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.id') }}
                        </th>
                        <td>
                            {{ $article->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.title') }}
                        </th>
                        <td>
                            {{ $article->title }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('cruds.article.fields.content') }}
                        </th>
                        <td>
                            {{ $article->content }}
                        </td>
                    </tr>
					<tr>
                        <th>
                            {{ trans('cruds.article.fields.published_at') }}
                        </th>
                        <td>
                            {{ $article->published_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('articles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection