<!-- 投稿を表示するページ -->

@extends('default')

@section('title')
    BBS -投稿詳細-
@endsection

@section('content')

    @section('headline')
        投稿詳細
    @endsection

    <div class=" form-group">
        {{ link_to('/post', '投稿する', ['class' => 'btn btn-primary']) }}
    </div>

    <div class="post-list">

        <div class="post-part">
            <div class="post-head">
                <span class="post-head-left">{{ $post->title }}</span>
                <span class="post-head-right">{{ $post->created_at }}</span>
            </div>
            <div class="post-body">
                <span>{{ $post->content }}</span>
            </div>
            <div class="post-footer form-inline">

                @can('edit', $post)
                    {{ link_to_action('PostController@edit',   ' -編集-',['id' => $post->id]) }}

                    {{ Form::open(['url' => '/post/'.$post->id, 'method' => 'delete']) }}
                    <input type="submit" value="-削除-" class="delete-btn">
                    {{Form::close()}}
                @endcan

            </div>
        </div>

        <div class="form-group">
            {{ link_to('/index', '投稿一覧', ['class' => 'btn btn-primary']) }}
        </div>

    </div>

@endsection