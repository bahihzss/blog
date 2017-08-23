@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ url('/post') }}">
        {{ csrf_field() }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <input
                        name="title"
                        class="form-control"
                        title="{{ trans('post.title') }}"
                        placeholder="{{ trans('post.input_title') }}"
                >
            </div>
            <div class="panel-body">
                <textarea
                        name="body"
                        class="form-control"
                        cols="30"
                        rows="30"
                        placeholder="{{ trans('post.input_body') }}"
                ></textarea>
            </div>
            <div class="panel-footer clearfix">
                <div class="pull-left">
                    {{ trans('post.posted_by') }}&nbsp;<strong>{{ Auth::user()->name }}</strong>&nbsp;&nbsp;
                </div>
                <div class="pull-right">
                    <button class="btn btn-success">{{ trans('post.post') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection