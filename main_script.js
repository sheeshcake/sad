
$(window).scroll(function() {
    if ($(window).scrollTop() < 300) {
        $('.main_nav').addClass('sticky');
    } else {
        $('.main_nav').removeClass('sticky');
    }
});