let email;

$("#check-email").click(function () {
  // console.log('click')

  email = $("#reset").find("#email").get(0).value;

  $.ajax({
    type: "POST",
    url: "php/check-email.php",
    data: { email: email }, // serializes the form's elements.
    success: function (res) {
      console.log(res);

      if (res.trim() == "true") {
        $("#c-email").addClass("d-none");
        // $("#c-pass").removeClass("d-none");
        // $("#c-pass").addClass("d-block");
        $("#otp-container").removeClass("d-none");
        $("#otp-container").addClass("d-block");
      }else {
        $("#wrong-email").addClass("d-inline-block");
        $("#wrong-email").removeClass("d-none");
        $("#wrong-email").html("<pre>   Wrong Email entered </pre>");
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

document.addEventListener("DOMContentLoaded", function (event) {
  function OTPInput() {
    const inputs = document.querySelectorAll("#otp > *[id]");
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].addEventListener("keydown", function (event) {
        if (event.key === "Backspace") {
          inputs[i].value = "";
          if (i !== 0) inputs[i - 1].focus();
        } else {
          if (i === inputs.length - 1 && inputs[i].value !== "") {
            return true;
          } else if (event.keyCode > 47 && event.keyCode < 58) {
            inputs[i].value = event.key;
            if (i !== inputs.length - 1) inputs[i + 1].focus();
            event.preventDefault();
          } else if (event.keyCode > 64 && event.keyCode < 91) {
            inputs[i].value = String.fromCharCode(event.keyCode);
            if (i !== inputs.length - 1) inputs[i + 1].focus();
            event.preventDefault();
          }
        }
      });
    }
  }
  OTPInput();
});

$("#valid").click(function () {
  const inputs = document.querySelectorAll("#otp > *[id]");
  console.log(inputs);
  let otp = "";
  for (let i = 0; i < inputs.length; i++) {
    otp += inputs[i].value;
  }

  console.log(email);

  if (otp.length < 4) {
    var myModal = new bootstrap.Modal(document.getElementById("error"));
    myModal.show();
    return;
  }

  $.ajax({
    type: "POST",
    url: "php/check-otp.php",
    data: { email: email, otp: otp }, // serializes the form's elements.
    success: function (res) {
      if (res.trim() == "true") {
        // $("#c-email").addClass("d-none");
        $("#c-pass").removeClass("d-none");
        $("#c-pass").addClass("d-block");
        $("#otp-container").addClass("d-none");
        $("#otp-container").removeClass("d-block");
        $.ajax({
          type: "POST",
          url: "php/remove-otp.php",
          data: { email: email }, // serializes the form's elements.
          success: function (res) {
            // console.log(res);
          },
          error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
          },
        });
      } else {
        var myModal = new bootstrap.Modal(document.getElementById("error-2"));
        myModal.show();
        return;
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert("Status: " + textStatus);
      alert("Error: " + errorThrown);
    },
  });

  console.log(otp);
});
