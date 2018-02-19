$(document).ready(function () {

    if($('div').is('#successful-save'))
    {
        var paddingLeft = parseInt($('#successful-save').css("padding-left"), 10);
        var halfWidth = $(window).width()/2;
        var halfMessageBoxWidth = $('#successful-save').width()/2;

        var left = halfWidth - halfMessageBoxWidth - paddingLeft;

        $('#successful-save').css("left", left).fadeIn(500, function () {
            $(this).delay(1500).fadeOut(1500);
        });
    }
    if($('div').is('#successful-delete'))
    {
        var paddingLeft = parseInt($('#successful-delete').css("padding-left"), 10);
        var halfWidth = $(window).width()/2;
        var halfMessageBoxWidth = $('#successful-delete').width()/2;

        var left = halfWidth - halfMessageBoxWidth - paddingLeft;

        $('#successful-delete').css("left", left).fadeIn(500, function () {
            $(this).delay(1500).fadeOut(1500);
        });
    }
    if($('div').is('#successful-update'))
    {
        var paddingLeft = parseInt($('#successful-update').css("padding-left"), 10);
        var halfWidth = $(window).width()/2;
        var halfMessageBoxWidth = $('#successful-update').width()/2;

        var left = halfWidth - halfMessageBoxWidth - paddingLeft;

        $('#successful-update').css("left", left).fadeIn(500, function () {
            $(this).delay(1500).fadeOut(1500);
        });
    }
    if($('div').is('#successful-change-status'))
    {
        var paddingLeft = parseInt($('#successful-change-status').css("padding-left"), 10);
        var halfWidth = $(window).width()/2;
        var halfMessageBoxWidth = $('#successful-change-status').width()/2;

        var left = halfWidth - halfMessageBoxWidth - paddingLeft;

        $('#successful-change-status').css("left", left).fadeIn(500, function () {
            $(this).delay(1500).fadeOut(1500);
        });
    }

    if($('div').is('#successful-profile-update'))
    {
        var paddingLeft = parseInt($('#successful-profile-update').css("padding-left"), 10);
        var halfWidth = $(window).width()/2;
        var halfMessageBoxWidth = $('#successful-profile-update').width()/2;

        var left = halfWidth - halfMessageBoxWidth - paddingLeft;

        $('#successful-profile-update').css("left", left).fadeIn(500, function () {
            $(this).delay(1500).fadeOut(1500);
        });
    }

    if($('div').is('#successful-profile-delete'))
    {
        var paddingLeft = parseInt($('#successful-profile-delete').css("padding-left"), 10);
        var halfWidth = $(window).width()/2;
        var halfMessageBoxWidth = $('#successful-profile-delete').width()/2;

        var left = halfWidth - halfMessageBoxWidth - paddingLeft;

        $('#successful-profile-delete').css("left", left).fadeIn(500, function () {
            $(this).delay(1500).fadeOut(1500);
        });
    }
});
