@extends('layouts.main')
@section('content')

<div class="card">
    <div class="card-header">
         {{ trans('global.create') }} {{ trans('cruds.article.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("articles.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label class="required" for="title">{{ trans('cruds.article.fields.title') }}</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($article) ? $article->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.article.fields.title_helper') }}
                </p>
            </div>
			<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label class="required" for="content">{{ trans('cruds.article.fields.content') }}</label>
                <textarea id="content" name="content" class="form-control" required>{{ old('content', isset($article) ? $article->content : '') }}</textarea>
                @if($errors->has('content'))
                    <em class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.article.fields.content_helper') }}
                </p>
            </div>
			<div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                <label class="required" for="published_at">{{ trans('cruds.article.fields.published_at') }}</label>
                <input type="text" id="published_at" name="published_at" class="form-control datetime" value="{{ old('published_at', isset($article) ? $article->published_at : '') }}" required>
                @if($errors->has('published_at'))
                    <em class="invalid-feedback">
                        {{ $errors->first('published_at') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.article.fields.published_at_helper') }}
                </p>
            </div>
			 <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection