$('#nav-search-input').focus(function () {
   $('#nav-search-icon').hide();
});

$('#nav-search-input').blur(function () {
    $('#nav-search-icon').show();
});

$('#desktop-search-input').focus(function () {
    $('#desktop-search-icon').hide();
});

$('#desktop-search-input').blur(function () {
    $('#desktop-search-icon').show();
    $('.search').val('');
});

$('.lang-preferences').click(function(){
    $('.lang-preferences-submenu').fadeToggle(10);
});

$(".lang_ru").click(function(){
    $.cookie('locale', 'ru_RU');
    location.reload();
});

$(".lang_en").click(function(){
    $.cookie('locale', 'en');
    location.reload();
});

$('.menu-btn').on('click', function(e) {
    e.preventDefault();
    $(this).toggleClass('menu-btn_active');
    $('nav').toggleClass('nav-active');
});

