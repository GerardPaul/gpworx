$(function() {
    $('#new_file').bootstrapFileInput();

    $('.bg_upload').click(function() {
        getFiles();
    });
    var type = 'bg';
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
});