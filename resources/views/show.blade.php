@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>{{ $post->title }}</h3>
            @if(Auth::check() && Auth::user()->id == $post->user->id)
            <p><a href="{{ url('/post/'.$post->id.'/edit') }}">edit</a></p>
            @endif
        </div>
        <div class="panel-body">
            {!! Markdown::convertToHtml($post->body) !!}
        </div>
        <div class="panel-footer">
            {{ trans('post.created_at') }}&nbsp;<strong>{{ $post->created_at }}</strong>&nbsp;&nbsp;
            {{ trans('post.updated_at') }}&nbsp;<strong>{{ $post->updated_at }}</strong>&nbsp;&nbsp;
            {{ trans('post.posted_by') }}&nbsp;<strong>{{ $post->user->name }}</strong>&nbsp;&nbsp;
        </div>
    </div>
</div>
@endsection