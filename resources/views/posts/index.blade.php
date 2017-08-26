@extends('layouts.app')

@section('script')
<script>
(function($){
    $('[name=is_open], [name=is_closed]').click(function(e) {
        if ($('#search').find('input:checked').length) {        
            $('#search').submit();
        } else {
            location.href = '{{ route('posts.index') }}';
        }
    });
})(jQuery);
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <form method="GET" action="{{ route('posts.index') }}" id="search">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="is_open" value="1"{{ $request->has('is_open') ? ' checked' : '' }}>
                    募集中の経験談
                  </label>

                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="is_closed" value="1"{{ $request->has('is_closed') ? ' checked' : '' }}>
                    募集を締め切った経験談
                  </label>
                </div>
            </div>
        </form>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-comments-o" aria-hidden="true"></i> 経験談リスト</div>
            @if ($posts->total())
                @foreach($posts as $post)
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @include('partials._post_header')
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="body">
                                        {!! nl2br(e($post->body)) !!}
                                    </div>
                                    <div class="text-right m-t-xs">
                                        <button class="btn btn-warning pull-left" type="button">
                                          経験談数 <span class="badge">{{ $post->comment_count }}</span>
                                        </button>
                                        <a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-primary pull-right">
                                            経験談ページへ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="panel-body">
                    経験談は見つかりませんでした。
                </div>
            @endif
            </div>
            {{ $posts->appends(Request::all())->links() }}
        </div>

    </div>
</div>
@endsection
