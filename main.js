$(document).ready(function() {
    'use strict';

    var width = $('.post-thumb').width();
    $(".post-thumb img").hover(function () {
        $(this).stop( true, true ).animate({
            width: width+20,

        }, 800);
    },function(){
        $(this).stop( true, true ).animate({
            width: width,

        }, 800);
    });



})