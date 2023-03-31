$(document).ready(() => {

	let saveButtons = $('.save-buttons')

	for (let button of saveButtons) {

		let postId = $(button.firstElementChild).attr('data-id')

		$(button.firstElementChild).click(() => {

			$(button.firstElementChild).css('visibility', 'collapse')
			$(button.lastElementChild).css('visibility', 'visible')

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				method: 'POST',
				url: '/home/user/post/save/' + postId,
				data: {}
			})
			alert('Post successfully saved')

		})

		$(button.lastElementChild).click(() => {

			$(button.firstElementChild).css('visibility', 'visible')
			$(button.lastElementChild).css('visibility', 'collapse')

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				method: 'POST',
				url: '/home/user/post/unsave/' + postId,
				data: {}
			})
			alert('Post unsaved')

		})

	}

})