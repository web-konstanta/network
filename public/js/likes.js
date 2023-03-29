let postsLikes = $('.likes')

for (const item of postsLikes) {
	$(item.firstElementChild).click(() => {

		let postId = $(item.firstElementChild).attr('data-id')

    $(item.firstElementChild).css('visibility', 'collapse')
    $(item.lastElementChild).css('visibility', 'visible')

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

    $(item.lastElementChild).css('visibility', 'collapse')
    $(item.firstElementChild).css('visibility', 'visible')

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