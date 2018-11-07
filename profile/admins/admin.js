$(function() {
   $('.select2').select2({
        tags: true,
        "ajax": {
            url: "/gamesite/profile/admins/game_page_fetch.php",
            dataType: 'json',
            delay: 250,
            type: "POST",
            data: function (params) {
                return {
                    search: params.term
                };
            },
            processResults: function (data, params) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder: "Select game",
        allowClear: true
        //minimumInputLength: 1
    });


    $('#select2').change( function () {
        var selectedData = $(this).val();
        $('#content-searched').html('');
        $.ajax({
            url: "/gamesite/profile/admins/game_page_settings.php",
            type: 'POST',
            data: {id:selectedData}
        }).done(function(data) {
            $('#content-searched').html('');
            $('#content-searched').html(data);
        })
    })
    /*var $q = $('#select2');

    $q.select2({
        tags: true,
        closeOnSelect: true,
        //selectOnClose: true,
        ajax: {
            url: "/gamesite/profile/admins/game_page_fetch.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) { return markup; },
        //minimumInputLength: 1,
        templateResult: function (result)
        {
            return result.full_name;
        },
        templateSelection: function (result)
        {
            return result.full_name || result.text;
        }
    });

    $q.on('select2:selecting', function(e)
    {
        //window.location.href = '/contacts/show/' + e.params.args.data.html_url ;
        console.log( e.params.args.data.html_url );
        //console.log( $('#select2').val() );
        //$q.select2("close");
        return false;
    });*/



	/*var selectedid = $(".select2").select2().data('id');
	var data = {
	    "selected":"selectedData"
    };
	data["selected"] = selectedData;
	$.post("/gamesite/profile/admins/game_page_controller.php",
        data,
        function (data) {
        },
        "text"
    );*/
    /*var table = $('#homePageData').DataTable({
        "processing": true,
        "serverSide":true,
        "scrollX": true,
        "ajax":{
            url:"/gamesite/profile/admins/home_page_fetch.php",
            type:"POST"
        }
    });*/
    $("#v-pills-profile").load("/gamesite/profile/admins/account_setting.php", {profile_tab: "1"});

    //$("#v-pills-game-settings").load("/gamesite/profile/admins/game_page_settings.php",{game_page_tab: "1"});

    //$("#v-pills-settings-home").load("/gamesite/profile/admins/home_page_settings.php", {home_page_tab: "1"});

    var table = $('#homePageData').DataTable({
        "processing": true,
        "serverSide":true,
        "scrollX": true,
        "sScrollX": "100%",
        "sScrollXInner": "100%",
        "ajax":{
            url:"/gamesite/profile/admins/home_page_fetch.php",
            type:"POST"
        }
    });

/*
    $("#homePageData").css({"width":"100%"});

    $(".table ").css({"width":"100%"});
*/

} );

// Edit datatable
$(document).on('click', '#getEdit', function (e) {
    e.preventDefault();
    var proj_id = $(this).data('id');
    $('#content-data').html('');
    $.ajax({
        url: "/gamesite/profile/admins/home_page_edit.php",
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

// Delete element from datatable
/*$(document).on('click', '#getDelete', function (e) {
    e.preventDefault();
    var proj_id = $(this).data('id');
    $.ajax({
        url: "/gamesite/profile/admins/home_page_delete.php",
        type: 'POST',
        data: {id:proj_id},
        dataType: 'html'
    })).done(function () {
        $('#homePageData tbody tr').find('data-id="'+proj_id+'"').hide()
    });
});*/
$(document).on('click', '#getDelete', function () {
   var id = $(this).attr("data-id");
   if(confirm("Are you sute you wan to delete?")) {
       $.ajax({
           url:"/gamesite/profile/admins/home_page_delete.php",
           type: 'POST',
           data:{id:id}/*,
           success: function (data) {

           }*/
       });
   }
});
// Add element to datatable