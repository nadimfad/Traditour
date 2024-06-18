@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">List Comment</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Forum</th>
                            <th>Forum Poster</th>
                            <th>Comment</th>
                            <th>Commenter</th>
                            <th>Gambar Profil Commenter</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $key => $comment)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $comment->forum->caption_forum }}</td>
                                <td>{{ $comment->forum->user->username }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->user->username }}</td>
                                <td>
                                    @if ($comment->user->profile && $comment->user->profile->profile_image)
                                        <img style="width: 100px;" src="{{ asset('images/' . $comment->user->profile->profile_image) }}" alt="Profile Image">
                                    @else
                                        <img src="{{ asset('image/TRADITOUR.png') }}" alt="Gambar Profil" style="width: 100px;">
                                    @endif
                                </td>                                
                                <td>{{ $comment->created_at->setTimezone('Asia/Jakarta')->format('j F Y, H:i T') }}</td>
                                <td>
                                    <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="POST" style="display:inline;">
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
