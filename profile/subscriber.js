$(function() {
    $("#v-pills-profile").load(" profile/subscribers/account_settings.php", {profile_tab: "1"});
} );

// Edit datatable
/*
$(document).on('click', '#getEdit', function (e) {
    e.preventDefault();
    var proj_id = $(this).data('id');
    $('#content-data').html('');
    $.ajax({
        url: " profile/admins/home_page_edit.php",
        type: 'POST',
        data: {id:proj_id},
        dataType: 'html'
    }).done(function(data) {
        $('#content-data').html('');
        $('#content-data').html(data);
    }).fial(function () {
        $('#content-data').html('<p>Error</p>');
    });

});
*/

// Delete element from datatable
/*$(document).on('click', '#getDelete', function (e) {
    e.preventDefault();
    var proj_id = $(this).data('id');
    $.ajax({
        url: " profile/admins/home_page_delete.php",
        type: 'POST',
        data: {id:proj_id},
        dataType: 'html'
    })).done(function () {
        $('#homePageData tbody tr').find('data-id="'+proj_id+'"').hide()
    });
});*/
/*$(document).on('click', '#getDelete', function () {
    var id = $(this).attr("data-id");
    if(confirm("Are you sute you wan to delete?")) {
        $.ajax({
            url:" profile/admins/home_page_delete.php",
            type: 'POST',
            data:{id:id}/!*,
           success: function (data) {

           }*!/
        });
    }
});*/
// Add element to datatable
