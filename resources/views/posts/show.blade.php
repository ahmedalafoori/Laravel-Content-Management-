@extends('layouts.app')

@section('title', $post->title)

@section('content')
<article class="post-container">
    <header class="post-header">
        <h1 class="post-title">{{ $post->title }}</h1>
        <div class="post-meta">
            <span class="post-date">{{ $post->created_at->format('F j, Y') }}</span>
            <span class="post-author">by {{ $post->user->name }}</span>
        </div>
    </header>

    @if($post->media->isNotEmpty())
        <div class="post-media">
            @foreach($post->media as $media)
                @if(Str::startsWith($media->file_type, 'image'))
                    <img src="{{ asset('storage/' . $media->file_path) }}" alt="Post image" class="post-image">
                @elseif(Str::startsWith($media->file_type, 'video'))
                    <video src="{{ asset('storage/' . $media->file_path) }}" controls class="post-video"></video>
                @elseif(Str::startsWith($media->file_type, 'audio'))
                    <audio src="{{ asset('storage/' . $media->file_path) }}" controls class="post-audio"></audio>
                @endif
            @endforeach
        </div>
    @endif

    <div class="post-content">
        {!! nl2br(e($post->content)) !!}
    </div>

    <footer class="post-footer">
        @can('update', $post)
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-edit">Edit Post</a>
        @endcan
        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
            </form>
        @endcan
    </footer>
</article>

<style>
    .post-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .post-header {
        margin-bottom: 2rem;
        text-align: center;
    }

    .post-title {
        font-size: 2.5rem;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .post-meta {
        font-size: 0.9rem;
        color: #7f8c8d;
    }

    .post-date, .post-author {
        margin-right: 1rem;
    }

    .post-media {
        margin-bottom: 2rem;
    }

    .post-image, .post-video {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        border-radius: 8px;
    }

    .post-audio {
        width: 100%;
    }

    .post-content {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #34495e;
        margin-bottom: 2rem;
    }

    .post-footer {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-edit {
        background-color: #3498db;
        color: white;
    }

    .btn-edit:hover {
        background-color: #2980b9;
    }

    .btn-delete {
        background-color: #e74c3c;
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn-delete:hover {
        background-color: #c0392b;
    }

    .delete-form {
        display: inline;
    }

    @media (max-width: 768px) {
        .post-container {
            padding: 1rem;
        }

        .post-title {
            font-size: 2rem;
        }

        .post-content {
            font-size: 1rem;
        }
    }
</style>
@endsection
