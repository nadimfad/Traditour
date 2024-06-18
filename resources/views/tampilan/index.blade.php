<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TradiTour</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('image/TRADITOUR.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('image/TRADITOUR.png') }}" type="image/x-icon">

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Library Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>

<body>
    {{-- Header --}}
    @include('tampilan.header')

    {{-- Body --}}
    @yield('konten')

    {{-- Footer --}}
    @include('tampilan.footer')

    {{-- JavaScript --}}
    {{-- Bootstrap and Popper.js --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    {{-- Other Scripts --}}
    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.navbar');
            header.classList.toggle('scrolled', window.scrollY > 0);
        });

        const searchButton = document.getElementById('searchButton');
        const searchInput = document.querySelector('.search-input');

        searchButton.addEventListener('click', function() {
            searchInput.classList.toggle('show');
            if (searchInput.classList.contains('show')) {
                searchInput.focus();
            }
        });

        const showHiddenPass = (loginPass, loginEye) => {
            const input = document.getElementById(loginPass),
                iconEye = document.getElementById(loginEye);

            iconEye.addEventListener('click', () => {
                if (input.type === 'password') {
                    input.type = 'text';
                    iconEye.classList.add('ri-eye-line');
                    iconEye.classList.remove('ri-eye-off-line');
                } else {
                    input.type = 'password';
                    iconEye.classList.remove('ri-eye-line');
                    iconEye.classList.add('ri-eye-off-line');
                }
            });
        };

        showHiddenPass('login-pass', 'login-eye');

        // Galeri
        let next = document.querySelector('.next');
        let prev = document.querySelector('.prev');

        next.addEventListener('click', function() {
            let items = document.querySelectorAll('.item');
            document.querySelector('.slide').appendChild(items[0]);
        });

        prev.addEventListener('click', function() {
            let items = document.querySelectorAll('.item');
            document.querySelector('.slide').prepend(items[items.length - 1]);
        });

        // Question
        document.addEventListener('DOMContentLoaded', function() {
            var askQuestionBtn = document.querySelector('#askQuestionBtn');
            var askQuestionForm = document.querySelector('#askQuestionForm');

            askQuestionBtn.addEventListener('click', function() {
                askQuestionForm.style.display = 'block';
            });
        });

        // Wow.js
        new WOW().init();

        // Toggle Like
        function toggleLike(forumId) {
            document.getElementById('likeForm' + forumId).submit();
        }

        function toggleComments(button) {
            var commentsSection = button.parentElement.parentElement.querySelector('.post-comments');
            commentsSection.classList.toggle('show-comments');
        }

        // Zoomable Images
        document.addEventListener('DOMContentLoaded', function() {
            var images = document.querySelectorAll('.zoomable-img');
            images.forEach(function(image, index) {
                image.classList.add('zoomable-img-' + index);
            });
        });

        function toggleCommentsModal(button) {
            var forumId = button.getAttribute('data-forum-id');
            var modal = document.getElementById('commentsModal' + forumId);
            modal.style.display = "block";
        }

        function closeCommentsModal(forumId) {
            var modal = document.getElementById('commentsModal' + forumId);
            modal.style.display = "none";
        }

        // Close the modal when clicking outside of it
        window.onclick = function(event) {
            var modals = document.getElementsByClassName('modal');
            for (var i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = "none";
                }
            }
        }

        function sortForums(select) {
            var selectedOption = select.value;
            fetch('/sort-forums/' + selectedOption)
                .then(response => {
                    if (response.ok) {
                        window.location.reload(); // Reload the page to reflect the new sorting
                    }
                });
        }

        // Populate comments in modal
        var modalComments = [
            "Komentar Modal 1",
            "Komentar Modal 2",
            "Komentar Modal 3",
            "Komentar Modal 4",
            "Komentar Modal 5"
        ];

        function populateComments() {
            var commentList = document.getElementById("commentList");
            // Clear previous comments
            commentList.innerHTML = "";

            // Add comments from modal
            modalComments.forEach(function(comment) {
                var commentItem = document.createElement("div");
                commentItem.textContent = comment;
                commentList.appendChild(commentItem);
            });

            // Assuming you have another array of comments
            // Add comments from outside modal
            // Replace 'comments' with your actual array variable name
            comments.forEach(function(comment) {
                var commentItem = document.createElement("div");
                commentItem.textContent = comment;
                commentList.appendChild(commentItem);
            });
        }
    </script>
    <!-- Library Wow.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <script>
        // Tambahkan class 'card' ke masing-masing elemen setelah halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            var cards = document.querySelectorAll(".card");
            cards.forEach(function(card, index) {
                setTimeout(function() {
                    card.style.opacity = 1;
                }, index * 200); // Delay tiap card bertambah 200ms
            });
        });
    </script>

</body>

</html>
