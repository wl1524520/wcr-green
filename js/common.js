$(function(){

    /*
     * 让Bootstrap菜单恢复超链接功能
     */
    $(document).ready(function(){
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

    // 为文章中所有图片增加img-responsive类，并解决图片居中问题
    var obj = $("article img");
    obj.addClass("img-responsive");
    obj.each(function(index){
        if($(this).hasClass('aligncenter')) {
            $(this).addClass("center-block");
        }
    });
    var objDiv = $("article div");
    if(objDiv.hasClass('aligncenter')) {
        objDiv.addClass("center-block");
    }

    /*
    var objInput = $('#commentform p input');
    if(!(typeof(objInput.val()) == "undefined")) {
        if (objInput.val() == "") {
            $(this).find('label').css('display', 'block');
        } else {
            $(this).find('label').css('display', 'none');
        }
    }
    var objText = $('#commentform p #comment');
    if(!(typeof(objText.val()) == "undefined")) {
        if (objText.val() == "") {
            $(this).find('label').css('display', 'block');
        } else {
            $(this).find('label').css('display', 'none');
        }
    }
    */

    /*
     * 评论框
     */
    $("#commentform p").focusin(function(){
        $(this).find('label').css('display', 'none');
    });
    $("#commentform p").focusout(function(){
        var objInput2 = $(this).find('input');
        if(!(typeof(objInput2.val()) == "undefined")) {
            if (objInput2.val() == "") {
                $(this).find('label').css('display', 'block');
            } else {
                $(this).find('label').css('display', 'none');
            }
        }

        var objText2 = $(this).find('#comment');
        if(!(typeof(objText2.val()) == "undefined")) {
            if (objText2.val() == "") {
                $(this).find('label').css('display', 'block');
            } else {
                $(this).find('label').css('display', 'none');
            }
        }
    });
    
});

