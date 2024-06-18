@extends('tampilan.index')
<style>
    .like-button svg {
        transition: fill 0.3s ease;
        /* Efek transisi animasi ketika berubah warna */
        fill: currentColor;
        /* Menggunakan warna yang saat ini digunakan oleh elemen induk */
    }

    .like-button.liked svg {
        fill: red;
        /* Warna merah saat tombol disukai (liked) */
    }
</style>
@section('konten')
    <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('image/gunung.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4 fst-italic">Forum</h1>
                    <p class="lead my-3">Silahkan Berkomentar untuk setiap destinasi</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 mb-3">
                <div class="row text-left mb-2">
                    <div class="col-lg-6 mb-3 mb-sm-0">
                        <form method="GET" action="{{ route('forum.index') }}" class="d-flex gap-2">
                            <div class="form-group" style="width: 100%;">
                                <select class="form-control form-control-lg" name="category">
                                    <option value="">Categories</option>
                                    <option value="Bahari" {{ $category === 'Bahari' ? 'selected' : '' }}>Bahari</option>
                                    <option value="Non Bahari" {{ $category === 'Non Bahari' ? 'selected' : '' }}>Non Bahari
                                    </option>
                                    <option value="Seni Budaya" {{ $category === 'Seni Budaya' ? 'selected' : '' }}>Seni
                                        Budaya</option>
                                    <option value="Kuliner" {{ $category === 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                                    <option value="Kerajinan Kreatif"
                                        {{ $category === 'Kerajinan Kreatif' ? 'selected' : '' }}>Kerajinan Kreatif</option>
                                    <option value="My Posts" {{ $category === 'My Posts' ? 'selected' : '' }}>My Posts
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary ml-2">Apply</button>
                        </form>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <form method="GET" action="{{ route('forum.index') }}" class="d-flex gap-2">
                            <div class="form-group" style="width: 100%;">
                                <select class="form-control form-control-lg" name="sort_by">
                                    <option value="latest" {{ $sortBy === 'latest' ? 'selected' : '' }}>Latest</option>
                                    <option value="likes" {{ $sortBy === 'likes' ? 'selected' : '' }}>Likes</option>
                                    <option value="comments" {{ $sortBy === 'comments' ? 'selected' : '' }}>Comments
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary ml-2">Sort</button>
                        </form>
                    </div>
                    <div class="col-lg-6 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
                        <div class="sticky" style="top: 85px;">
                            <div class="sticky-inner">
                                <a class="btn btn-lg btn-block btn-primary rounded-0 py-4 mb-3"
                                    href="{{ route('forum.create') }}">Buat Post Forum Baru</a>
                            </div>
                        </div>
                    </div>
                </div>


                @foreach ($forums as $forum)
                    <div class="post">
                        <div class="post-header">
                            @if ($forum->user->profile && $forum->user->profile->profile_image)
                                <img src="{{ asset('images/' . $forum->user->profile->profile_image) }}"
                                    alt="Profile Image" style="flex-shrink: 0; width: 60px; height: 60px;">
                            @else
                                <img src="{{ asset('image/TRADITOUR.png') }}" alt="Gambar Profil"
                                    style="flex-shrink: 0; width: 60px; height: 60px;">
                            @endif
                            <div>
                                <div class="username">{{ $forum->user->username }}</div>
                                <div class="publish-time">
                                    {{ $forum->created_at->setTimezone('Asia/Jakarta')->format('j F Y, H:i T') }}</div>
                            </div>
                            @auth
                                @if ($forum->user_id === auth()->id())
                                    <div class="custom-dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                            class="bi bi-sliders" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z" />
                                        </svg>
                                        <div class="custom-dropdown-content">
                                            <a href="{{ route('forum.edit', $forum->id) }}">Edit</a>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        <h5 class="post-caption"><strong>Category : {{ $forum->kategori_forum }}</strong></h5>
                        <div class="post-caption">{{ $forum->caption_forum }}</div>
                        <img class="mx-auto" src="{{ asset($forum->gambar_forum) }}" alt="Forum Image">
                        <div class="actions">
                            <form action="{{ route('forum.like', $forum) }}" method="post"
                                id="likeForm{{ $forum->id }}" style="display: inline;">
                                @csrf
                                <button type="submit" style="display: none;"></button>
                            </form>

                            <button onclick="document.getElementById('likeForm{{ $forum->id }}').submit()"
                                class="like-button {{ auth()->check() && $forum->likes->contains('user_id', auth()->id()) ? 'liked' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                </svg>
                            </button>
                            <span class="like-comment-count">{{ $forum->likes->count() }}</span>
                            <button onclick="toggleCommentsModal(this)" data-forum-id="{{ $forum->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                                    <path
                                        d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                                </svg>
                            </button>

                            <span class="like-comment-count">{{ $forum->comments->count() }}</span>

                            <div id="commentsModal{{ $forum->id }}" class="modal">
                                <div class="modal-content" style="color: black; border-radius: 10px;">
                                    <span class="close" onclick="closeCommentsModal({{ $forum->id }})">&times;</span>
                                    <h2 style="color: black;">Komentar</h2>
                                    <div id="commentList{{ $forum->id }}">
                                        @if ($forum->comments->isEmpty())
                                            <p class="no-comments" style="color: black">Belum ada komentar. Silahkan
                                                berkomentar pada postingan ini.</p>
                                        @else
                                            @foreach ($forum->comments as $comment)
                                                <div class="comment-item"
                                                    style="display: flex; align-items: flex-start; margin-bottom: 10px;">
                                                    @if ($comment->user->profile && $comment->user->profile->profile_image)
                                                        <img class="comment-avatar"
                                                            src="{{ asset('images/' . $comment->user->profile->profile_image) }}"
                                                            alt="Profile Picture"
                                                            style="flex-shrink: 0; width: 40px; height: 40px; margin-right: 10px;">
                                                    @else
                                                        <img class="comment-avatar"
                                                            src="{{ asset('image/TRADITOUR.png') }}"
                                                            alt="Profile Picture"
                                                            style="flex-shrink: 0; width: 40px; height: 40px; margin-right: 10px;">
                                                    @endif
                                                    <div class="comment-content" style="flex-grow: 1;">
                                                        <div class="comment-header"
                                                            style="display: flex; justify-content: space-between; align-items: center;">
                                                            <div class="comment-author"
                                                                style="color: black; font-weight: bold;">
                                                                {{ $comment->user->username }}</div>
                                                            <div class="comment-date"
                                                                style="color: black; font-size: 0.8em;">
                                                                {{ $comment->created_at->setTimezone('Asia/Jakarta')->format('d/m/Y H:i') }}
                                                            </div>
                                                        </div>
                                                        <div class="comment-text" style="color: black;">
                                                            {{ $comment->comment }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <form method="POST" action="{{ route('comments.store', $forum->id) }}"
                                                class="form-group" style="flex: 1;">
                                                @csrf
                                                <label for="content"
                                                    style="color: rgb(0, 0, 0); border-radius:8px; padding-bottom:15px">Tambahkan
                                                    komentar:</label>
                                                <div style="position: relative;">
                                                    <textarea class="form-control" id="content" name="comment" rows="1"
                                                        style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding-right: 40px; height: 50px;"
                                                        placeholder="Tambahkan komentar"></textarea>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: rgb(0, 0, 0); border-color:rgb(255, 254, 254); position: absolute; right: 0; top: 0; bottom: 0; margin: auto; width: 100px; height: 50px;">Submit</button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div>
                            <h4 style="color: black;">Komentar</h4>
                            @if ($forum->comments->isEmpty())
                                <p class="no-comments" style="color: black">Silahkan berkomentar pada postingan ini.</p>
                            @else
                                @foreach ($forum->comments->sortByDesc('created_at')->take(5) as $comment)
                                    <div class="comment-item"
                                        style="display: flex; align-items: flex-start; margin-bottom: 10px;">
                                        @if ($comment->user->profile && $comment->user->profile->profile_image)
                                            <img class="comment-avatar"
                                                src="{{ asset('images/' . $comment->user->profile->profile_image) }}"
                                                alt="Profile Picture"
                                                style="flex-shrink: 0; width: 40px; height: 40px; margin-right: 10px;">
                                        @else
                                            <img class="comment-avatar" src="{{ asset('image/TRADITOUR.png') }}"
                                                alt="Profile Picture"
                                                style="flex-shrink: 0; width: 40px; height: 40px; margin-right: 10px;">
                                        @endif
                                        <div class="comment-content" style="flex-grow: 1;">
                                            <div class="comment-header"
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <div class="comment-author" style="color: black; font-weight: bold;">
                                                    {{ $comment->user->username }}</div>
                                                <div class="comment-date" style="color: black; font-size: 0.8em;">
                                                    {{ $comment->created_at->setTimezone('Asia/Jakarta')->format('d/m/Y H:i') }}
                                                </div>
                                            </div>
                                            <div class="comment-text" style="color: black;">{{ $comment->comment }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <hr>

                        <form method="POST" action="{{ route('comments.store', $forum->id) }}" class="form-group"
                            style="flex: 1;">
                            @csrf
                            <label for="content" style="color: rgb(0, 0, 0); border-radius:8px; padding-bottom:15px">Your
                                Comment:</label>
                            <div style="position: relative;">
                                <textarea class="form-control" id="content" name="comment" rows="1"
                                    style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding-right: 40px;"
                                    placeholder="Tambahkan Komentar"></textarea>
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: rgb(0, 0, 0); border-color:rgb(255, 254, 254); position: absolute; right: 0; top: 0; bottom: 0; margin: auto;">Kirim</button>
                            </div>
                        </form>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center mt-4">
                    {{ $forums->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
