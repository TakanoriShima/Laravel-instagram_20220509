@extends('layouts.app')
@section('title', '投稿一覧')
@section('content')
    <div class="text-center">
        <h1 class="text-primary">投稿一覧</h1>
    </div>
    <div class="row mt-4">
        <table class="table table-bordered table-striped text-center">
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>タイトル</th>
                <th>内容</th>
                <th>投稿日時</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{!! link_to_route('posts.show', $post->id , ['id' => $post->id ],[]) !!}</td>
                <td>
                    <!--その投稿のユーザーのプロフィールがあるならばアバターアイコンを表示させる-->
                    @if($post->user->profile)
                    <img src="{{ asset('uploads') }}/{{ $post->user->profile->image }}" alt="{{ $post->user->profile->image }}" class="avatar">
                    <!-- そうでなければno_image画像を表示させる。 -->
                    @else
                    <img src="{{ asset('images/no_image.jpg') }}" alt="アバター画像は未設定です。"　class="no_avatar">
                    @endif
                    {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id], []) !!}
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection