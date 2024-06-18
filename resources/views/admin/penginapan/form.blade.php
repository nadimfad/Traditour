<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method == 'PUT')
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nama_penginapan">Nama Penginapan</label>
        <input type="text" class="form-control" id="nama_penginapan" name="nama_penginapan" value="{{ old('nama_penginapan', $penginapan->nama_penginapan) }}" required>
    </div>

    <div class="form-group">
        <label for="deskripsi_penginapan">Deskripsi Penginapan</label>
        <textarea class="form-control" id="deskripsi_penginapan" name="deskripsi_penginapan" rows="5" required>{{ old('deskripsi_penginapan', $penginapan->deskripsi_penginapan) }}</textarea>
    </div>

    <div class="form-group">
        <label for="alamat_penginapan">Alamat Penginapan</label>
        <input type="text" class="form-control" id="alamat_penginapan" name="alamat_penginapan" value="{{ old('alamat_penginapan', $penginapan->alamat_penginapan) }}" required>
    </div>

    <div class="form-group">
        <label for="gambar_penginapan">Gambar Penginapan</label>
        <input type="file" class="form-control" id="gambar_penginapan" name="gambar_penginapan" {{ $method == 'POST' ? 'required' : '' }}>
        @if ($method == 'PUT' && $penginapan->gambar_penginapan)
            <div>
                <img src="{{ asset('images/' . $penginapan->gambar_penginapan) }}" alt="{{ $penginapan->nama_penginapan }}" style="width: 100px;">
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="harga_penginapan">Harga Penginapan</label>
        <input type="number" class="form-control" id="harga_penginapan" name="harga_penginapan" value="{{ old('harga_penginapan', $penginapan->harga_penginapan) }}" required>
    </div>

    <div style="display: flex; justify-content: space-between;">
        <a href="{{ route('admin.penginapan.index') }}" class="btn btn-secondary">Kembali</a>

        <div class="button-container">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>