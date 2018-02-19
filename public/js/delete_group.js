$(document).ready(function ()
{
    var url = window.location.pathname.split('/');
    var count_select = 0;
    var select_one = 0;
    var no_selected = true;
    $('#delete').click(function (e) {

        //Check is that at least one record selected
        $('.delete-group').each(function () {
            if($(this).prop("checked"))
            {
                no_selected = false;
            }
        });

        //If none record selected
        if(no_selected == true)
        {
            if(url[1] == 'en')
            {
                var please_select_records = 'Please select one or more records';
            }
            else var please_select_records = 'Выберите пожалуйста одну или более записей';
            alert(please_select_records);
            e.preventDefault();
        }
        else
        {
            if(url[1] == 'en')
            {
                var delete_select_records = 'Delete selected records?';
            }
            else var delete_select_records = 'Удалить выбранные записи?';

            if(!confirm(delete_select_records))
            {
                e.preventDefault();
                $('.delete-group').prop('checked', false);
                no_selected = true;
                count_select = 0;
            }
        }
    });

    $('#select-all').click(function () {
        if(count_select == 0)
        {
            $('.delete-group').prop('checked', true);
            count_select = 1;
        }
        else if (count_select == 1)
        {
            $('.delete-group').prop('checked', false);
            count_select = 0;
        }
    });
});
