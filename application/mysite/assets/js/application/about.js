$(function() {
    
});

function getInfoToEdit(id){
    $('#info_edit_modal .modal-content form').remove();
    
    $.post(base_url + "gerard/about/getInfo", {id: id}, function (data) {
        if (data.status === 'ok') {
           $('#info_edit_modal .modal-content').append(data.content);
        }
    }, "json");
}

function getContactToEdit(id){
    $('#contact_edit_modal .modal-content form').remove();
    
    $.post(base_url + "gerard/about/getContact", {id: id}, function (data) {
        if (data.status === 'ok') {
           $('#contact_edit_modal .modal-content').append(data.content);
        }
    }, "json");
}