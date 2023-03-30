let comment = $('#comment')
let modal = $('.modal')
let modalClose = $('.modal__close')
let postId = $('.modal__button').attr('data-id')
let button = $('.modal__button')
let input = $('.modal__input')

comment.click(() => {
	modal.css('visibility', 'visible')
})
modalClose.click(() => {
	modal.css('visibility', 'collapse')
})
button.click(() => {
	modal.css('visibility', 'collapse')
})

button.click(() => {
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		method: 'POST',
		url: '/home/user/post/comment/' + postId + '/' + input.val(),
		data: {}
	})
	.done((data) => {
		let result = `
			<div class="main__section-block">
				<img src="http://127.0.0.1:8000/storage//${data.userAvatar}" class="main__section-avatar">
				<p>${data.userNickName}</p>
			</div>
			<p style="margin-top: -5px">${data.text}</p>
		`
		$('.comments-list').html(result)
	})
})