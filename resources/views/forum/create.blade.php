@extends('tampilan.index')

@section('konten')
    <div class="full-width-image" style="text-align: center;">
        <img src="{{ asset('image/Travel Blogger LinkedIn Banner .png') }}" alt="Logo"
            style="max-width: 100%; height: auto;">
    </div>

    <div class="container" style="margin-top: 90px; display: flex; justify-content: center;">
        <div class="card" style="width: 100%; max-width: 600px; padding: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <h1>Create New Forum</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('forum.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="caption_forum">Caption</label>
                    <textarea name="caption_forum" class="form-control" required>{{ old('caption_forum') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="kategori_forum">Category</label>
                    <select name="kategori_forum" id="category-select" class="form-control" required>
                        <option value="bahari">Bahari</option>
                        <option value="non bahari">Non Bahari</option>
                        <option value="seni budaya">Seni Budaya</option>
                        <option value="kuliner">Kuliner</option>
                        <option value="kerajinan kreatif">Kerajinan Kreatif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar_forum">Image</label>
                    <input type="file" name="gambar_forum" id="custom-tweet-image" class="form-control" required
                        onchange="previewImage()">
                    <div id="custom-image-preview" style="margin-top: 10px;"></div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top:15px">Create</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript for image preview
        function previewImage() {
            const file = document.getElementById('custom-tweet-image').files[0];
            const reader = new FileReader();
            reader.onloadend = function() {
                const preview = document.getElementById('custom-image-preview');
                preview.innerHTML = '<img src="' + reader.result + '" style="max-width: 100%; height: auto;">';
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                document.getElementById('custom-image-preview').innerHTML = '';
            }
        }

        document.getElementById('caption_forum').addEventListener('input', function() {
            const charCount = 140 - this.value.length;
            document.querySelector('.custom-char-count').textContent = charCount;
        });

        document.getElementById('category-select').addEventListener('change', function() {
            const selectedCategory = this.value;
            // Implement the filter logic here based on selectedCategory
        });
    </script>
@endsection