@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('partials._notice')

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-comment" aria-hidden="true"></i> 経験談を投稿する</div>

                <div class="panel-body">
            @if (!$postable_posts->isEmpty())      
                @foreach($postable_posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="body">
                                        {!! nl2br(e(cutString($post->body, $cut_string_num))) !!}
                                    </div>
                                    <div class="text-right">
                                        <a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-primary">
                                            投稿ページへ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                経験談は見つかりませんでした。
            @endif 
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-comments-o" aria-hidden="true"></i> みんなからの経験談</div>

                <div class="panel-body">
                @if (!$my_posts->isEmpty())
                    @foreach($my_posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-oneline text-ellipsis">{{ $post->body }}</div>
                        <div class="panel-body">
                        <?php $latest_comment = $post->comments()->latest()->first(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                @if ($latest_comment)
                                    <div class="body">
                                        {!! nl2br(e(cutString($latest_comment->body, $cut_string_num))) !!}
                                    </div>
                                @else
                                    まだ経験談は投稿されていません。                      
                                @endif
                                    <div class="text-right m-t-xs">
                                        <button class="btn btn-warning pull-left" type="button">
                                          経験談数 <span class="badge">{{ $post->comment_count }}</span>
                                        </button>
                                        <a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-primary">
                                            経験談ページへ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    まだ経験談を募集していません。経験談を募集しましょう！
                @endif
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2 m-b-sm text-right">
            <a href="{{ route('posts.index') }}" class="btn btn-primary">
                経験談リストへ
            </a>
        </div>


        <form method="POST" action="{{ route('posts.store') }}" id="post-form">
            {{ csrf_field() }}
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-bullhorn" aria-hidden="true"></i> 経験談を募集する</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="5" placeholder="どんな経験談が聞きたいか具体的に書いて、経験談を募集しよう！"></textarea>
                        </div>

                        @include('partials._errors')

                        <button type="submit" class="btn btn-success pull-right">
                            投稿する
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
