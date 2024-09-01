@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="edit-post-container">
    <h1 class="page-title">Edit Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="edit-post-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="10" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="new_media">Add New Media</label>
            <input type="file" name="new_media[]" id="new_media" multiple accept="image/*,video/*,audio/*">
        </div>

        @if($post->media->isNotEmpty())
            <div class="current-media">
                <h2>Current Media</h2>
                <div class="media-grid">
                    @foreach($post->media as $media)
                        <div class="media-item">
                            @if(Str::startsWith($media->file_type, 'image'))
                                <img src="{{ asset('storage/' . $media->file_path) }}" alt="Post media">
                            @elseif(Str::startsWith($media->file_type, 'video'))
                                <video src="{{ asset('storage/' . $media->file_path) }}" controls></video>
                            @elseif(Str::startsWith($media->file_type, 'audio'))
                                <audio src="{{ asset('storage/' . $media->file_path) }}" controls></audio>
                            @endif
                            <div class="media-actions">
                                <label>
                                    <input type="checkbox" name="delete_media[]" value="{{ $media->id }}">
                                    Delete
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Post</button>
            <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<style>
    .edit-post-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .page-title {
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        padding: 1rem;
        border-radius: 4px;
        margin-bottom: 1rem;
    }

    .edit-post-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: #34495e;
    }

    .form-group input[type="text"],
    .form-group textarea {
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
    }

    .form-group textarea {
        resize: vertical;
    }

    .current-media {
        margin-top: 1.5rem;
    }

    .current-media h2 {
        font-size: 1.5rem;
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .media-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 1rem;
    }

    .media-item {
        position: relative;
    }

    .media-item img,
    .media-item video {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 4px;
    }

    .media-item audio {
        width: 100%;
    }

    .media-actions {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 0.5rem;
        display: flex;
        justify-content: center;
    }

    .media-actions label {
        color: white;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        border-radius: 4px;
        font-weight: bold;
        text-decoration: none;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }

    .btn-secondary {
        background-color: #95a5a6;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #7f8c8d;
    }

    @media (max-width: 768px) {
        .edit-post-container {
            padding: 1rem;
        }

        .page-title {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

<div id="media-preview"></div>

<script>
document.getElementById('media').addEventListener('change', function(event) {
    var preview = document.getElementById('media-preview');
    preview.innerHTML = '';

    for (var i = 0; i < event.target.files.length; i++) {
        var file = event.target.files[i];
        var reader = new FileReader();

        reader.onload = (function(file) {
            return function(e) {
                var div = document.createElement('div');
                if (file.type.startsWith('image/')) {
                    div.innerHTML = '<img src="' + e.target.result + '" style="max-width:200px; max-height:200px;">';
                } else if (file.type.startsWith('video/')) {
                    div.innerHTML = '<video src="' + e.target.result + '" style="max-width:200px; max-height:200px;" controls></video>';
                } else if (file.type.startsWith('audio/')) {
                    div.innerHTML = '<audio src="' + e.target.result + '" controls></audio>';
                }
                preview.appendChild(div);
            };
        })(file);

        reader.readAsDataURL(file);
    }
});
</script>
