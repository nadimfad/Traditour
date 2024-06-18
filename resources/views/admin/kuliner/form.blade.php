<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method == 'PUT')
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $kuliner->judul) }}" required>
    </div>

    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar" {{ $method == 'POST' ? 'required' : '' }}>
        @if ($method == 'PUT' && $kuliner->gambar)
            <div>
                <img src="{{ asset('images/' . $kuliner->gambar) }}" alt="{{ $kuliner->judul }}" style="width: 100px;">
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="artikel">Artikel</label>
        <textarea class="form-control" id="artikel" name="artikel" rows="5" required>{{ old('artikel', $kuliner->artikel) }}</textarea>
    </div>

    <div style="display: flex; justify-content: space-between;">

        <a href="{{ route('admin.kuliner.index') }}" class="btn btn-secondary">Kembali</a>
    

        <div class="button-container">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
