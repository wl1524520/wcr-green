$(function(){

    /* Back To Top */
    var offset = 220;
    var duration = 500;
    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.crunchify-top').fadeIn(duration);
        } else {
            $('.crunchify-top').fadeOut(duration);
        }
    });
     
    $('.crunchify-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, duration);
        return false;
    })

    /*
     * 让Bootstrap菜单恢复超链接功能
     */
    if( ! (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ) {
        $(document).off('click.bs.dropdown.data-api');
        $('.navbar .dropdown').hover(function() {
            $('ul.dropdown-menu', this).stop(true, true).slideDown('fast');
            $(this).addClass('open');
        }, function() {
            $('ul.dropdown-menu', this).stop(true, true).slideUp('fast');
            $(this).removeClass('open');
        });
    }

});

