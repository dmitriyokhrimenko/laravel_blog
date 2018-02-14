$(document).ready(function() {
    $('#delete-photo').click(function(){
      $.ajax({
          type: 'GET',
          url: '/profile/delete_photo',
      }).done(function (data) {
          $('#output').empty();
          $('.account-avatar').empty();
          $('#output').append("<img src='/images/app/no-person.png'>");
          $('.account-avatar').append("<img src='/images/app/no-person.png'>")
          console.log(data);
      }).fail(function (data) {
          console.log(data);
      });
    });
});
