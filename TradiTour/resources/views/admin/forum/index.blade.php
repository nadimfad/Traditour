@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">List Forum</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Post Made by</th>
                            <th>Kategori</th>
                            <th>Caption</th>
                            <th>Gambar</th>
                            <th>Likes</th>
                            <th>Comments</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($forums as $key => $forum)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $forum->user->username }}</td>
                                <td>{{ $forum->kategori_forum }}</td>
                                <td>{{ Str::limit($forum->caption_forum, 50) }}</td>
                                <td><img style="width: 100px;" src="{{ asset($forum->gambar_forum) }}" alt="Forum Image"></td>
                                <td>{{ $forum->likes->count() }}</td>
                                <td>{{ $forum->comments->count() }}</td>
                                <td>{{ $forum->created_at->setTimezone('Asia/Jakarta')->format('j F Y, H:i T') }}</td>
                                <td>
                                    <form action="{{ route('admin.forum.destroy', $forum->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('This action will delete the data. Proceed?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
