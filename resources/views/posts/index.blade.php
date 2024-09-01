@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div class="posts-container">
    <h1 class="page-title">All Posts</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="search-bar">
        <form action="{{ route('posts.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search posts..." value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="posts-grid">
        @forelse ($posts as $post)
            <div class="post-card">
                <h2 class="post-title">{{ $post->title }}</h2>
                <p class="post-excerpt">{{ Str::limit($post->content, 100) }}</p>
                @if($post->media->isNotEmpty())
                    <div class="post-media">
                        @foreach($post->media as $media)
                            @if(Str::startsWith($media->file_type, 'image'))
                                <img src="{{ asset('storage/' . $media->file_path) }}" alt="Post media" class="post-image">
                            @elseif(Str::startsWith($media->file_type, 'video'))
                                <video src="{{ asset('storage/' . $media->file_path) }}" controls class="post-video"></video>
                            @endif
                        @endforeach
                    </div>
                @endif
                <div class="post-meta">
                    <span class="post-date">{{ $post->created_at->format('M d, Y') }}</span>
                    <a href="{{ route('posts.show', $post) }}" class="read-more">Read More</a>
                </div>
            </div>
        @empty
            <p class="no-posts">No posts found.</p>
        @endforelse
    </div>

    <div class="pagination">
        {{ $posts->links() }}
    </div>
</div>

<style>
    .posts-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .page-title {
        font-size: 2.5rem;
        color: #2c3e50;
        text-align: center;
        margin-bottom: 2rem;
    }

    .alert {
        background-color: #d4edda;
        color: #155724;
        padding: 1rem;
        border-radius: 5px;
        margin-bottom: 1rem;
    }

    .search-bar {
        margin-bottom: 2rem;
    }

    .search-form {
        display: flex;
        max-width: 500px;
        margin: 0 auto;
    }

    .search-form input {
        flex-grow: 1;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 5px 0 0 5px;
    }

    .search-form button {
        padding: 0.5rem 1rem;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
    }

    .posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
    }

    .post-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .post-card:hover {
        transform: translateY(-5px);
    }

    .post-title {
        font-size: 1.5rem;
        color: #2c3e50;
        margin: 1rem;
    }

    .post-excerpt {
        color: #34495e;
        margin: 0 1rem 1rem;
    }

    .post-media {
        height: 200px;
        overflow: hidden;
    }

    .post-image, .post-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .post-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        background-color: #f8f9fa;
    }

    .post-date {
        color: #6c757d;
    }

    .read-more {
        color: #3498db;
        text-decoration: none;
        font-weight: bold;
    }

    .no-posts {
        text-align: center;
        color: #6c757d;
        font-size: 1.2rem;
    }

    .pagination {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }
</style>
@endsection
