@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ url('/post/'.$post->id) }}">
        {{ csrf_field() }}
        <div class="panel panel-default">
            <input type="hidden" name="_method" value="PUT">
            <div class="panel-heading">
                <input
                        name="title"
                        class="form-control"
                        value="{{ $post->title }}"
                        title="{{ trans('post.title') }}"
                        placeholder="{{ trans('post.input_title') }}"
                >
            </div>
            <div class="panel-body">
                @if(Session::get('updated'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ trans('post.updated') }}
                </div>
                @endif
                @if(Session::get('posted'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ trans('post.posted') }}
                </div>
                @endif
                <textarea
                        name="body"
                        class="form-control"
                        cols="30"
                        rows="30"
                        placeholder="{{ trans('post.input_body') }}"
                >{{ $post->body }}</textarea>
            </div>
            <div class="panel-footer clearfix">
                <div class="pull-left">
                    {{ trans('post.created_at') }}&nbsp;<strong>{{ $post->created_at }}</strong>&nbsp;&nbsp;
                    {{ trans('post.updated_at') }}&nbsp;<strong>{{ $post->updated_at }}</strong>&nbsp;&nbsp;
                    {{ trans('post.posted_by') }}&nbsp;<strong>{{ $post->user->name }}</strong>&nbsp;&nbsp;
                </div>
                <div class="pull-right">
                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal">{{ trans('post.delete') }}</button>
                    <button class="btn btn-success">{{ trans('post.update') }}</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Delete confirm modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" style="padding-top: 40%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="deleteModalLabel">{{ trans('post.confirm_delete') }}</h4>
                </div>
                <div class="modal-body">
                    {{ trans('post.delete_message', ['id' => $post->id]) }}
                </div>
                <div class="modal-footer">
                    <form action="{{ url('/post/'.$post->id) }}" method="POST">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger">{{ trans('post.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection