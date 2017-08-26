@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @include('partials._post_header')
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="body">
                                        {!! nl2br(e($post->body)) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($post->comments as $comment)
                    <div class="row">
                        <div class="col-xs-1">
                            <span class="avatar"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-xs-11">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="body">
                                        {!! nl2br(e($comment->body)) !!}
                                    </div>
                                    <div class="user-info text-right"><b>{{ $comment->user->name }}</b> <span class="text-muted small">{{ $comment->created_at }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <form method="POST" action="{{ route('comments.store', $post->id) }}" id="comment-form">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-comment" aria-hidden="true"></i> 経験談を投稿する</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="5" placeholder="あなたの経験談を投稿しよう！"></textarea>
                        </div>

                        @include('partials._errors')

                        <button type="submit" class="btn btn-success pull-right">
                            投稿する
                        </button>
                    </div>
                </div>
            </form>

            <a href="{{ route('posts.index') }}" class="btn btn-primary">
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i> 経験談リスト
            </a>
        </div>
    </div>
</div>
@endsection
