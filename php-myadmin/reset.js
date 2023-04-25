let email = sessionStorage.getItem("email-2");
sessionStorage.removeItem("email-2");
if(!email) {
    window.location.href = './myprofile.php';
}


$("#confirm-pass").click(function () {
  let pass = $("#p-passwd").get(0).value;
  console.log(pass);
  $.ajax({
    type: "POST",
    url: "php/check-pass.php",
    data: { email: email, pass: pass },
    success: function (res) {

      if (res.trim() == 'true') {
        // console.log(res);
        $("#c-pass").removeClass("d-none");
        $("#c-pass").addClass("d-block");
        $("#p-pass").addClass("d-none");
        $("#p-pass").removeClass("d-block");
      }else{
        var myModal = new bootstrap.Modal(
            document.getElementById("error")
          );
          myModal.show();
      }
      
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert("Status: " + textStatus);
      alert("Error: " + errorThrown);
    },
  });
});


$("#reset-pass").click(function () {
    if (
      $("#c-pass").find("#passwd").get(0).value !=
      $("#c-pass").find("#c-passwd").get(0).value
    ) {
      console.log(
        $("#c-pass").find("#passwd").get(0).value,
        $("#c-pass").find("#c-passwd").get(0).value
      );
      $("#wrong-pass-2").addClass("d-inline-block");
      $("#wrong-pass-2").removeClass("d-none");
      return;
    }
  
    let password = $("#c-pass").find("#passwd").get(0).value;
  
    $.ajax({
      type: "POST",
      url: "php/change-password.php",
      data: { email: email, password: password }, // serializes the form's elements.
      success: function (res) {
        // console.log();
        var myModal = new bootstrap.Modal(
          document.getElementById("exampleModal")
        );
        myModal.show();
  
        timeLeft = 5;
  
        function countdown() {
          timeLeft--;
          document.getElementById("timer").innerHTML = String(timeLeft);
          if (timeLeft > 0) {
            setTimeout(countdown, 1000);
          } else {
            window.location.href = "/myprofile.php";
          }
        }
  
        setTimeout(countdown, 1000);
  
        //   setTimeout(function () {
        //     window.location.href = "/myprofile.php";
        //   }, 3000);
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("Status: " + textStatus);
        alert("Error: " + errorThrown);
      },
    });
  });
