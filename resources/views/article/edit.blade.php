@extends('layouts.main')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.article.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("articles.update", [$article->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.article.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $article->title) }}" required>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.title_helper') }}</span>
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
			<div class="form-group">
                <label class="required" class="required" for="published_at">{{ trans('cruds.article.fields.published_at') }}</label>
                <input class="form-control datetime {{ $errors->has('published_at') ? 'is-invalid' : '' }}" type="text" name="published_at" id="published_at" value="{{ old('published_at', $article->published_at) }}" required>
                @if($errors->has(''))
                    <div class="invalid-feedback">
                        {{ $errors->first('') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.published_at_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>

</script>
@endsection