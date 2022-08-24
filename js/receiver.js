$(document).ready(function () {

    const id = $('#receiver_id').val();

    $.ajax({
  
      method: 'POST',
  
      url: 'php/receiver.php',

      data: {

        'id': id

      },
  
      dataType: 'html',
  
      success: function (response) {
  
        $('.user_details').html(response);
  
      }
  
    });
  
  });