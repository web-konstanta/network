$(document).ready(() => {

    let complains = $('.complains')

    for (let complain of complains) {

        $(complain.firstElementChild).click(() => {

            $(complain.firstElementChild).css('display', 'none')
            $(complain.lastElementChild).css('display', 'block')

            let postId = $(complain.firstElementChild).attr('data-id')

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: '/home/user/post/complain/' + postId,
                data: {}
            })

        })

    }

})
