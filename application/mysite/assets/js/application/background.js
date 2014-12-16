$(function () {
    $('#new_file').bootstrapFileInput();

    $('.bg_upload').click(function () {
        getFiles();
    });
    var type = 'bg';
    function getFiles() {
        $.post(base_url + "files/getFiles", {type: type}, function (data) {
            if (data.status === 'ok') {
                $('.image_container').html(data.content);
            } else {
                $('.image_container').html(data.content);
            }
        }, "json");
    }

    $('#upload_new').click(function () {
        $('.upload_container').toggle('slow');
    });

    var options = {
        beforeSend: function () {
            $("#progress").show();
            $('#progress i').removeClass('hide');
            $("#progress_percent").html("0% Complete");
        },
        uploadProgress: function (event, position, total, percentComplete) {
            $("#progress_percent").html(percentComplete + '% Complete');
        },
        success: function () {
            $("#progress_percent").html('100% Complete');

            setTimeout(function () {
                $("#progress_percent").html('');
                $('#new_file').val('');
                $('.file-input-name').html('');
                $('.upload_container').toggle('slow');
            }, 2000);
        },
        complete: function (responseText) {
            $('#progress i').addClass('hide');
            $('#progress_message').html(responseText);
            getFiles();
        },
        error: function () {
            $("#progress_percent").append("Error");
        },
        clearForm: true,
        resetForm: true
    };
    $('#background_form').ajaxForm(options);

    $('#bg_home_upload').click(function () {
        $('#for_background').val('home');
    });
    $('#bg_portfolio_upload').click(function () {
        $('#for_background').val('portfolio');
    });
    $('#bg_about_upload').click(function () {
        $('#for_background').val('about');
    });
    $('#bg_contact_upload').click(function () {
        $('#for_background').val('contact');
    });

    $('#select_background').click(function () {
        var for_background = $('#for_background').val();
        if ($("input:radio[name=bg_image]:checked").length !== 0) {
            var value = $('input:radio[name=bg_image]:checked').val();
            var arr = value.split('+');
            
            $.post(base_url + "gerard/background/ajaxSetBGImage", {image_id: arr[0], for_bg: for_background}, function(data){
                if (data.status === 'ok') {
                    //reload page
                    location.reload(true);
                }else{
                    //display modal for error
                    alert('Error Saving Background!');
                }
            }, "json");

            $('#images_modal').modal('hide');
        }
    });
});