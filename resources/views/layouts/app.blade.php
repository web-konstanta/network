<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body>
<div class="wrapper">
    @yield('content')
</div>
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js') }}"></script>
<script src="{{ asset('js/likes.js') }}"></script>
<script>
    $(document).ready(() => {

<<<<<<< HEAD
        function clickLike(element) {
=======
        function clickLike() {
>>>>>>> b608c780afce6191652c99ec67632ced0f9ce2fa
            let postId = $('#like').attr('data-id')

            $('#like').css('visibility', 'collapse')
            $('#unlike').css('visibility', 'visible')

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/home/user/post/like/' + postId,
                data: {},
                contentType: 'json',
            })
            .done((data) => {
                $('#countLikes').html(data.countLikes)
            })
            
            return false
        }

        function clickUnlike() {
            let postId = $('#unlike').attr('data-id')

            $('#like').css('visibility', 'visible')
            $('#unlike').css('visibility', 'collapse')

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/home/user/post/unlike/' + postId,
                data: {},
                contentType: 'json',
            })
            .done((data) => {
                $('#countLikes').html(data.countLikes)
            })
            
            return false
        }

        $('#like').click(clickLike)

        $('#unlike').click(clickUnlike)

    })
</script>
</body>
</html>
