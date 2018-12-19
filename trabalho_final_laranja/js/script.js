
$(function(){
  //LOGIN
  $("#loginForm").submit(function(){
    var userlogin = $("#user").val();
    var senhalogin = $("#senha").val();

    $.ajax({
      type: "POST",
      url: "./system/User.php",
      data: {userp:userlogin, senhap:senhalogin},
      success: function (data, textStatus, jqXHR){
        if(parseInt(data) === 1) {
          window.location.href = "feedpage.php";
        }
        console.log(data);
      },
    });

    return false;
  })

});



