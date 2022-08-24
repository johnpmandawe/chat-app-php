$(document).ready(function () {

  $.ajax({

    method: 'GET',

    url: 'php/users.php',

    dataType: 'html',

    success: function (response) {

      $('.details').html(response);

    }

  });

});