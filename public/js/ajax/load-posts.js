$(document).ready(function() {

    var scroll_height = 0;
    //console.log($('.card').height());

    //$(window).scroll(function(){
      var pos = 0;
        //if (($(this).scrollTop() + $(this).height()) >= ($(document).height() - 200) ) {
        $('#get-data').click(function(){
          $.ajax({
              type: 'GET',
              url: '/load_data',
          }).done(function (data) {
              //$('body').css('opacity', 1);
              //$('#preload').css('display', 'none');
              console.log(data);
              //$('#ajax-data').html(data);
          }).fail(function (data) {
              //$('body').css('opacity', '1');
              //$('#preload').css('display', 'none');
              //alert('error');
              console.log(data);
          });
        //}
});
    //});
});
