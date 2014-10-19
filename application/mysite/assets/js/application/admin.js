$(function() {
    $('#new_file').bootstrapFileInput();

    $('.profile_upload').click(function() {
        getFiles();
    });
    
    var type = 'profile';
    function getFiles() {
        $.post(base_url + "files/getFiles", {type: type}, function(data) {
            if (data.status === 'ok') {
                $('.image_container').html(data.content);
            } else {
                $('.image_container').html(data.content);
            }
        }, "json");
    }

    $('#upload_new').click(function() {
        $('.upload_container').toggle('slow');
    });

    var options = {
        beforeSend: function() {
            $("#progress").show();
            $('#progress i').removeClass('hide');
            $("#progress_percent").html("0% Complete");
        },
        uploadProgress: function(event, position, total, percentComplete) {
            $("#progress_percent").html(percentComplete + '% Complete');
        },
        success: function() {
            $("#progress_percent").html('100% Complete');

            setTimeout(function() {
                $("#progress_percent").html('');
                $('#new_file').val('');
                $('.file-input-name').html('');
                $('.upload_container').toggle('slow');
            }, 2000);
        },
        complete: function(responseText) {
            $('#progress i').addClass('hide');
            $('#progress_message').html(responseText);
            getFiles();
        },
        error: function() {
            $("#progress_percent").append("Error");
        },
        clearForm: true,
        resetForm: true
    };
    $('#profile_form').ajaxForm(options);

    $('#select_profile').click(function() {
        var for_profile = $('#for_profile').val();
        if ($("input:radio[name=profile_image]:checked").length !== 0) {
            if (for_profile === '1') {
                var value = $('input:radio[name=profile_image]:checked').val();
                var arr = value.split('+');
                $('#profile1').val(arr[0]);
                $('#profile1_upload i').remove();
                $('#profile1_upload').html('<img class="img-responsive" src="' + arr[1] + '" alt="GP Worx">');
            }
            else if (for_profile === '2') {
                var value = $('input:radio[name=profile_image]:checked').val();
                var arr = value.split('+');
                $('#profile2').val(arr[0]);
                $('#profile2_upload i').remove();
                $('#profile2_upload').html('<img class="img-responsive" src="' + arr[1] + '" alt="GP Worx">');
            }
            $('#images_modal').modal('hide');
        }
    });

    $('#profile1_upload').click(function() {
        $('#for_profile').val('1');
    });
    $('#profile2_upload').click(function() {
        $('#for_profile').val('2');
    });

    $('#adminForm').bootstrapValidator({
        container: 'tooltip',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fullname: {
                validators: {
                    notEmpty: {
                        message: 'Full name is required!'
                    }
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username is required!'
                    }
                }
            },
            password: {
                validators: {
                    identical: {
                        field: 'cpassword',
                        message: 'The passwords don\'t match!'
                    },
                    notEmpty: {
                        message: 'The password is required!'
                    },
                    stringLength: {
                        max: 50,
                        message: 'The password must be less than 50 characters!'
                    },
                    stringLength: {
                        min: 6,
                        message: 'The password must be greater than 6 characters!'
                    }
                }
            },
            cpassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The passwords don\'t match!'
                    },
                    notEmpty: {
                        message: 'The password is required!'
                    },
                    stringLength: {
                        max: 50,
                        message: 'The password must be less than 50 characters!'
                    },
                    stringLength: {
                        min: 6,
                        message: 'The password must be greater than 6 characters!'
                    }
                }
            }
        }
    });
});