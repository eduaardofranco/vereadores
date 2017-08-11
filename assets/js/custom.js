$(document).ready(function() {
    /* Sections Scroll */
    var anchor = $('.js-scroll');

    $(anchor).click(function() {
        var section = $(this).attr('data-scroll');
        console.log(section);
        $('html,body').animate({
            scrollTop: $(section).offset().top - 25},
        'slow');
    });

    //normalize  left and right heights
    // var vereador = $('.vereador');
    // $(vereador).each(function() {
    //     var leftH = $(this).find('.vereador__left').height();
    //     var leftW = $(this).find('.vereador__left').width();
    //     var right = $(this).find('.vereador__right').height();
    //     if( leftH > right ) {
    //         $(this).find('.vereador__right').css('height', leftH);
    //     }
    // });

});//ready


//header cover effect when scroll
var cover = $('.cover-container__item');
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if( scroll > 99) {
        $(cover).addClass('opacity-cover');
    } else {
        $(cover).removeClass('opacity-cover');
    }
});