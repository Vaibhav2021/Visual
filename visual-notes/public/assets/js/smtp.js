function isFormValid() {

    errorMessage = "";
    $(".error").html("");
    var isValid = true;

    if ($("#driver").val() == "") {
        $("#driver").siblings(".error").html("Please Select driver")
        isValid = false;
    }

    return isValid;

}

$(".smtpUpdate").click(function () {
    if (isFormValid()) {


    var formData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        username: $("#username").val(),
        smtp_host: $("#smtp_host").val(),
        smtp_port: $("#smtp_port").val(),
        smtp_from_email: $("#smtp_from_email").val(),
        smtp_from_name: $("#smtp_from_name").val(),
        smtp_pass: $("#smtp_pass").val(),
        driver: $("#driver").val(),
        encryption: $("#encryption").val(),
    };

    $.ajax({
        type: "POST",
        url: BASE_URL + "/settings/smtp",
        data: formData,
        success: function (response) {
            Swal.fire({
                text: "SMTP settings updated successfully!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Okay!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        },
        error: function(xhr){
            $('.error').html(''); // if error occured
            if (xhr.responseJSON.errors) {
                var i = 1;
                $.each(xhr.responseJSON.errors, function (key, value) {
                    let errorElement = $(`[name="${key}"]`);

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
                        }else if(errorElement.tagName == 'select') {
                            console.log(errorElement.parent('div').find('.select2-container'));
                            errorElement.parent('div').find('.select2-container').after(`<span id="${key}-error" class="text-danger error">${value[0]}</span>`);
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
        }
    });
    }

});


$(".smtpAWSUpdate").click(function () {
    var formData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        awsAccessKey: $("#awsAccessKey").val(),
        awsSecretKey: $("#awsSecretKey").val(),
        awsDefaultRegion: $("#awsDefaultRegion").val(),
        awsBucket: $("#awsBucket").val(),
        awsPathStyle: $("#awsPathStyle:checked").val() ? '1' : '0',
        from_email: $("#from_email").val(),
        from_name: $("#from_name").val(),
        awsdriver: $("#awsdriver").val(),
    };

    $.ajax({
        type: "POST",
        url: BASE_URL + "/settings/aws",
        data: formData,
        success: function (response) {
            Swal.fire({
                text: "AWS Settings updated successfully!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Okay!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        },
        error: function(xhr){
            $('.error').html(''); // if error occured
            if (xhr.responseJSON.errors) {
                var i = 1;
                $.each(xhr.responseJSON.errors, function (key, value) {
                    let errorElement = $(`[name="${key}"]`);

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
                        }else if(errorElement.tagName == 'select') {
                            console.log(errorElement.parent('div').find('.select2-container'));
                            errorElement.parent('div').find('.select2-container').after(`<span id="${key}-error" class="text-danger error">${value[0]}</span>`);
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
        }
    });


});


function chooseSettings(value) {
    var smtp = document.querySelector('.hideSMTP');
    var aws = document.querySelector('.hideAWS');
    console.log(value);
    if (value == 'aws') {
        document.querySelector('#awsdriver').value = 'ses';
        aws.classList.remove('d-none');
        smtp.classList.add('d-none');
        localStorage.setItem('settings', 'aws');
    } else {
        document.querySelector('#driver').value = 'smtp';
        aws.classList.add('d-none');
        smtp.classList.remove('d-none');
        localStorage.setItem('settings', 'smtp');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var smtp = document.querySelector('.hideSMTP');
    var aws = document.querySelector('.hideAWS');
    var setSelectedSetting = document.querySelector('.setSelectedSetting');
    if (localStorage.getItem('settings') == 'smtp') {
        aws.classList.add('d-none');
        smtp.classList.remove('d-none');
        setSelectedSetting.value = 'smtp';
    } else {
        aws.classList.remove('d-none');
        smtp.classList.add('d-none');
        setSelectedSetting.value = 'aws';
    }
});

var submitBTN = document.querySelector('.testEmail');
var mail = document.querySelector('#mail');
submitBTN.addEventListener('click', function () {
    $('.testEmail').text('Sending...');
    $.ajax({
        type: "POST",
        url: BASE_URL + "/settings/test-email",
        data: {'mail':mail.value,_token: $('meta[name="csrf-token"]').attr('content'),},
        success: function (response) {
            $('.testEmail').text('Test');
            Swal.fire({
                text: "Mail sent successfully!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Okay!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        },
        error:function(){
            $('.testEmail').text('Test');
            Swal.fire({
                text: "Failed to send email!",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Okay!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        }
    });
});