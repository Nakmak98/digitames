$(document).ready(function(){
    $('a[href^="#"]').on('click', function(event) {
        event.preventDefault();
        var sc = $(this).attr("href"),
            dn = $(sc).offset().top-50;
        console.log(dn);
        $('html, body').animate({scrollTop: dn}, 1000);
    });

    $(window).scroll(function() {
        var sc = $('#games'),
            dn = $(sc).offset().top-100;
        if ($(document).scrollTop() > dn) {
            $(".menu_back").css('background','rgba(25, 30, 58, 1.0');
        } else {
            $(".menu_back").css('background','rgba(25, 30, 58, 0.7');
        }
    });
});