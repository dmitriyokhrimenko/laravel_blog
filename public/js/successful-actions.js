$(document).ready(function () {

    if($('div').is('#successful-save'))
    {
        $('#successful-save').delay(1500).slideUp(1500, function () {

        });
    }
    if($('div').is('#successful-delete'))
    {
        $('#successful-delete').delay(1500).slideUp(1500, function () {

        });
    }
    if($('div').is('#successful-update'))
    {
        $('#successful-update').delay(1500).slideUp(1500, function () {

        });
    }
    if($('div').is('#successful-change-status'))
    {
        $('#successful-change-status').fadeIn(500, function () {
            $(this).delay(1500).fadeOut(1500);
        });
    }
    if($('div').is('#successful-truncate'))
    {
        $('#successful-truncate').delay(1500).slideUp(1500, function () {

        });
    }

    if($('div').is('#successful-load'))
    {
        $('#successful-load').delay(1500).slideUp(1500, function () {

        });
    }

});
