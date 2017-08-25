@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{ asset('img/big.png') }}" alt="{{ config('app.name', 'Blog') }}" style="width: 100%">

    <div class="text-center" style="min-height: 20px">
        {!! $posts->links() !!}
    </div>

    @if(Session::get('deleted'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ trans('post.deleted') }}
        </div>
    @endif

    @foreach($posts as $post)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>{{ $post->title }}</h3>
            @if(Auth::check() && Auth::user()->id == $post->user->id)
            <p><a href="{{ url('/post/'.$post->id.'/edit') }}">edit</a></p>
            @endif
        </div>
        <div class="panel-body">
            {{ str_limit(strip_tags(Markdown::convertToHtml($post->body)), 300) }}
            <p class="text-right"><a href="{{ url('/'.$post->id) }}">{{ trans('post.more') }}</a></p>
        </div>
        <div class="panel-footer">
            {{ trans('post.created_at') }}&nbsp;<strong>{{ $post->created_at }}</strong>&nbsp;&nbsp;
            {{ trans('post.updated_at') }}&nbsp;<strong>{{ $post->updated_at }}</strong>&nbsp;&nbsp;
            {{ trans('post.posted_by') }}&nbsp;<strong>{{ $post->user->name }}</strong>&nbsp;&nbsp;
        </div>
    </div>
    @endforeach

    <div class="text-center">
        {!! $posts->links() !!}
    </div>
</div>
@endsection