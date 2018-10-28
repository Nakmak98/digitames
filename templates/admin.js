$(document).ready(function() {
  /*  var t = $('#homePage').DataTable( {
        "ajax": ""
    });
    var counter = 1;

    $('#addToTable').on( 'click', function () {
        t.row.add( [
            counter +'.1',
            counter +'.2',
            counter +'.3',
            counter +'.4',
            counter +'.5'
        ] ).draw( false );

        counter++;
    } );

    // Automatically add a first row of data
    $('#addToTable').click();

    var table = $('#example').DataTable();

    table.columns().flatten().each( function ( colIdx ) {
        // Create the select list and search operation
        var select = $('<select />')
            .appendTo(
                table.column(colIdx).footer()
            )
            .on( 'change', function () {
                table
                    .column( colIdx )
                    .search( $(this).val() )
                    .draw();
            } );

        // Get the search data for the first column and add to the select list
        table
            .column( colIdx )
            .cache( 'search' )
            .sort()
            .unique()
            .each( function ( d ) {
                select.append( $('<option value="'+d+'">'+d+'</option>') );
            } );
    } );*/

        $("#v-pills-profile").load("profile/admin/account_settings.php", {profile_tab: "1"});

        $("#v-pills-game-settings").load("profile/admin/admin.php",{game_page_tab: "1"});

        $("#v-pills-settings-home").load("profile/admin/home_page_settings.php", {home_page_tab: "1"});

} );