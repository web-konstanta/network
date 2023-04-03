let postsLikes = $('.likes')

for (const item of postsLikes) {
	$(item.firstElementChild).click(() => {

    let postId = $(item.firstElementChild).attr('data-id')

    $(item.firstElementChild).css('display', 'none')
    $(item.lastElementChild).css('display', 'block')

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

	})
	$(item.lastElementChild).click(() => {

	let postId = $(item.lastElementChild).attr('data-id')

    $(item.lastElementChild).css('display', 'none')
    $(item.firstElementChild).css('display', 'block')

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

	})
}
