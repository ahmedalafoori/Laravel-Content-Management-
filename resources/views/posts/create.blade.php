@extends('layouts.app')

@section('title', 'Create New Post')

@section('content')
<div class="create-post-container">
    <h1 class="page-title">Create a New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="post-form">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-input" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-input" required>
                <option value="">Select Category</option>
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="media" class="form-label">Media Files</label>
            <div class="file-input-wrapper">
                <input type="file" name="media[]" id="media" multiple class="file-input" accept="image/*,video/*,audio/*">
                <span class="file-input-text">Choose files</span>
            </div>
        </div>

        <button type="submit" class="submit-btn">Create Post</button>
    </form>

    <style>
        .create-post-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            font-size: 2.5rem;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .post-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            font-size: 1rem;
            color: #34495e;
            margin-bottom: 0.5rem;
        }

        .form-input {
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.5);
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .file-input-text {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .file-input-text:hover {
            background-color: #2980b9;
        }

        .submit-btn {
            padding: 1rem 2rem;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            align-self: flex-start;
        }

        .submit-btn:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div id="media-preview"></div>

    <script>
        document.querySelector('.file-input').addEventListener('change', function(e) {
            var fileName = e.target.files.length > 1 ? e.target.files.length + ' files selected' : e.target.files[0].name;
            document.querySelector('.file-input-text').textContent = fileName;
        });

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
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
