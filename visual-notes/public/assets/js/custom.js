$(document).ready(function() {
    // Get the current URL
    var currentURL = window.location.href;

    // Check if the URL contains 'index'
    if (currentURL.indexOf('index') !== -1) {
      $('#home').addClass('nav-bar-active');
      $(this).removeClass('nav-bar-active');
    }
  });

$(document).ready(function() {
    // Get the current URL
    var currentURL = window.location.href;

    // Check if the URL contains 'index'
    if (currentURL.indexOf('my-notes') !== -1) {
      $('#my-notes').addClass('nav-bar-active');
      $(this).removeClass('nav-bar-active');

    }
  });

$(document).ready(function() {
    // Get the current URL
    var currentURL = window.location.href;

    // Check if the URL contains 'index'
    if (currentURL.indexOf('friend-list') !== -1) {
      $('#friend-list').addClass('nav-bar-active');
      $(this).removeClass('nav-bar-active');

    }
  });

$(document).ready(function() {
    // Get the current URL
    var currentURL = window.location.href;

    // Check if the URL contains 'index'
    if (currentURL.indexOf('settings') !== -1) {
      $('#settings').addClass('nav-bar-active');
      $(this).removeClass('nav-bar-active');

    }
  });

  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});



//form submit ajax

$(document).ready(function () {


	$('body').on('submit', '.visual-notes-ajax-form', function (e) {
		e.preventDefault();
		let _this = $(this);
		let _button = _this.find('[type=submit]');
		let formData = new FormData(_this[0]);
		let url = _this.attr('action');
		$.ajax({
			url: url,
			method: "POST",
			data: formData,
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function () {
				_button.attr('disabled', true);
				_button.find('.indicator-label').hide();
				_button.find('.indicator-progress').show();
			},
			success: function (data) {
				if (data.redirect) {
					Swal.fire({
						text: data.message,
						icon: "success",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						},
						timer:1600
					});
					setTimeout(() => {
						window.location.href = data.redirect;
					}, 1600);
				} else {
					if (data.status == 200) {
						Swal.fire({
							text: data.message,
							icon: "success",
							buttonsStyling: !1,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
						_this[0].reset();
					}
					if (_this.attr('data-redirect-url')) {
						setTimeout(() => {
							window.location.href = _this.attr('data-redirect-url');
						}, 2000);
					}
					if (_this.attr('data-modal-form')) {
						$(_this.attr('data-modal-form')).modal('hide');
						if(table)
						table.table().draw();
					}
				}
			},
			error: function (xhr) {
				$('.error').html(''); // if error occured
				_button.attr('disabled', false);
				if (xhr.responseJSON.errors) {
					var i = 1;
					$.each(xhr.responseJSON.errors, function (key, value) {
						let errorElement = $(`[name="${key}"]`);
						if( errorElement.length <= 0 ){
							errorElement = $(`[name="${key}[]"]`);
						}

						if (i == 1) {
							errorElement.focus();
							i++;
						}
						if (key.includes('.')) {
							let parts = key.split('.');
							let result = parts.reduce((acc, part) => {
								return acc ? acc + `[${part}]` : `${part}`;
							}, '');
							errorElement = $(`[name="${result}"]`);
							if ((errorElement.parents('div.file-error').length > 0)) {
								errorElement.parents('div.file-error').find('.error-file').after(`<small id="postcode-error" class="text-danger error">${value[0]}</small>`);
							} else if (errorElement.parents('div.input-group').length > 0) {
								errorElement.parents('div.input-group').after(`<small id="postcode-error" class="text-danger error">${value[0]}</small>`);
							} else if (errorElement.length > 0) {
								errorElement.after(`<small id="${key}-error" class="text-danger">${value[0]}</small>`);
							} else {
								Swal.fire({
									text: value[0],
									icon: "error",
									buttonsStyling: !1,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								});
								return false;
							}
						} else {
							if ((errorElement.parents('div.file-error').length > 0)) {
								errorElement.parents('div.file-error').find('.error-file').after(`<span id="postcode-error error" class="text-danger">${value[0]}</span>`);
							} else if (errorElement.parents('div.input-group').length > 0) {
								errorElement.parents('div.input-group').after(`<span id="postcode-error" class="text-danger error">${value[0]}</span>`);
							}
							else if (errorElement[0].tagName == 'SELECT' || errorElement.tagName == 'select') {
								if(errorElement.parent('div').find('.select2-container').length){
									errorElement.parent('div').find('.select2-container').after(`<span id="${key}-error" class="text-danger error">${value[0]}</span>`);
								}
								else{
									errorElement.after(`<span id="${key}-error" class="text-danger error">${value[0]}</span>`);
								}
							} else if (errorElement.length > 0) {
								errorElement.after(`<span id="${key}-error" class="text-danger error">${value[0]}</span>`);
							} else {
								Swal.fire({
									text: value[0],
									icon: "error",
									buttonsStyling: !1,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								});
							}
						}
					});
				} else {
					Swal.fire({
						text: xhr.responseJSON.message,
						icon: "error",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					});
				}
			},
			complete: function () {
				_button.attr('disabled', false);
				_button.find('.indicator-label').show();
				_button.find('.indicator-progress').hide();
			},
		});
		return false;
	});



	$('body').on('click', `[data-bs-toggle="modal"]`, function (event) {
        event.preventDefault();
        let button = $(this);
        let recipient = button.attr('data-bs-whatever');
        let dataUrl = button.attr('href');

        let modal = $(button.attr('data-bs-target'));

        modal.find('.modal-title').text(recipient);
        

        $.get(dataUrl, function (response) {
            if (response.success == 200) {
                modal.find('.modal-body').html(response.html);
                modal.modal('show');

            }
        });
    })
});
