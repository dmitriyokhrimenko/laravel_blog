$(document).ready(function(){
    var flag = true;
    $('#toggle').click(function (e) {
        e.preventDefault();
        if(flag){
            flag = false;
            $('#mobile-menu').animate({left: 0}, 1000);
        }
        else {
          flag = true;
          $('#mobile-menu').animate({left: '-195px'}, 1000);
        }
        return false;
    });
});
