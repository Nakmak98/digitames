var editor; // use a global for the submit and return data rendering in the examples

$(function () {

/*    $('#addRow').click(function () {
        $('.modal-title').text('Add game project');
    });*/

    var table = $('#homePageData').DataTable({
        "processing": true,
        "serverSide":true,
        "scrollX": true,
        "ajax":{
            url:"/gamesite/profile/admins/home_page_fetch.php",
            type:"POST"
        }/*,
        columns: [
            { data: "id" },
            { data: "proj_name" },
            { data: "proj_url" },
            {
                data: "proj_img",
                render: function ( file_id ) {
                    return file_id ?
                        '<img src="'+editor.file( 'files', file_id ).web_path+'"/>' :
                        null;
                },
                defaultContent: "No image",
                title: "Image"
            },
            { data: "is_featured" }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]*/
    });
    /*$(document).on('click','#getEdit',function(e){
        e.preventDefault();
        var per_id=$(this).data('id');
        //alert(per_id);
        $('#content-data').html('');
        $.ajax({
            url:'editdata.php',
            type:'POST',
            data:'id='+per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data').html('');
            $('#content-data').html(data);
        }).fial(function(){
            $('#content-data').html('<p>Error</p>');
        });
    });*/
} );