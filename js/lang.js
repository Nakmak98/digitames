$(document).ready(function(){
    $("#lang_ru").click(function(){
        $.cookie('locale', 'ru_RU');
        location.reload();
    });
    $("#lang_en").click(function(){
        $.cookie('locale', 'en');
        location.reload();
    });
});
