jQuery(document).ready(function () {

    /* Back To Top */
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.crunchify-top').fadeIn(duration);
        } else {
            jQuery('.crunchify-top').fadeOut(duration);
        }
    });
     
    jQuery('.crunchify-top').on('click', function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })

    /*
     * 让Bootstrap菜单恢复超链接功能
     */
    /*
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
    */

});

