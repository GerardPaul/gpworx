$(function() {
    $('#new_file').bootstrapFileInput();

    $('.profile_upload').click(function() {
        getFiles();
    });
    function getFiles() {
        $.post(base_url + "files/getFiles", function(data) {
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
        },
        complete: function(response) {
            $('#progress i').addClass('hide');
            $('#progress_message').val(response);
            $('#profile_form').resetForm();
            getFiles();
        },
        error: function(){
            $("#progress_percent").append("Error");
        }
    };
    $('#profile_form').ajaxForm(options);
});