if($.cookie('accept') == "yes")
{
    //alert($.cookie('accept'));
    document.getElementById('cookie-message').style.display = 'none';
}
closing.onclick = function() {
    $('#cookie-message').fadeOut( "slow" );
};
accept.onclick = function() {
    //alert( 'Спасибо' );
    $.cookie('accept', 'yes', {
        expires: 30
    });
    $('#cookie-message').fadeOut( "slow" );
};