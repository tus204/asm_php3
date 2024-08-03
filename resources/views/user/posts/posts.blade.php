@extends('layouts.app')

@section('css')
    <style>
        header {
            background-color: #3b5998;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        /* Định dạng nội dung */
        .post-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .post {
            background-color: #fff;
            border: 1px solid #e6e6e6;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 600px;
            margin: 10px;
        }

        .post:hover {
            cursor: pointer;
        }

        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .post-header h3 {
            margin: 0;
            font-size: 16px;
        }

        .post-content img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .post-content p {
            margin-top: 0;
            font-size: 14px;
            color: #333;
        }

        .post-info {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #888;
        }

        .post-image {
            width: 300px;
            margin-bottom: 20px;
        }

        .post-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 4px
        }
    </style>
@endsection

@section('content')
    <div class="post-container">
        @foreach ($baiViets as $post)
            <a href="{{ route('post.detail', $post->slug) }}" class="post">
                <div class="post-header">
                    <h3>{{ $post->user->name }}</h3>
                </div>
                <div class="post-content">
                    <h2>{{ $post->ten }}</h2>
                    <div class="">{!! $post->noi_dung !!}</div>
                </div>
                <div class="post-image">
                    <img src=" {{ Storage::url($post->anh_bia) }}" alt="{{ $post->ten }}">
                </div>
                <div class="post-info">
                    <span>Đã đăng: {{ $post->created_at->diffForHumans() }}</span>
                    <span>Ngày tạo: {{ $post->created_at->format('d/m/Y') }}</span>
                    <span>Lượt xem: {{ $post->luot_xem }}</span>
                    <span>Lượt thích: {{ $post->luot_thich }}</span>
                </div>
            </a>
        @endforeach
    </div>
@endsection
