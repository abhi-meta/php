import validation from "./common js/validation.js";
import clearFields from "./common js/common.js";

const validate = new validation();

function addClass(cls, mssg) {
  $(cls).addClass("d-inline-block");
  $(cls).removeClass("d-none");
  $(cls).html(`<pre>   ${mssg}</pre>`);
}

function removeClass(cls) {
  $(cls).addClass("d-none");
  $(cls).removeClass("d-inline-block");
}

$("#sign_up_btn").click(function () {
  $("#sign-up").toggleClass("d-none");
  $("#sign-in").addClass("d-none");
});

$("#login_btn").click(function () {
  $("#sign-in").toggleClass("d-none");
  $("#sign-up").addClass("d-none");
  clearFields("sign-up-2");
});

$("#sign-up-2").submit(function (e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var actionUrl = form.attr("action");

  if (
    $(form).find("#passwd").get(0).value !=
    $(form).find("#c-passwd").get(0).value
  ) {
    addClass("#wrong-pass-2", "Password Doesnt Match");
    return;
  } else {
    removeClass("#wrong-pass-2");
  }

  if (!validate.validateEmail($(form).find("#email-2").get(0).value)) {
    console.log("enter valid email");

    addClass("#wrong-email-2", "Enter a valid Email");
    return;
  } else {
    removeClass("#wrong-email-2");
  }

  if (!validate.validateUsername($(form).find("#username").get(0).value)) {
    addClass("#wrong-username-2", "Enter a valid Username");
    return;
  } else {
    removeClass("#wrong-username-2");
  }

  if (!validate.validateAddress($(form).find("#address").get(0).value)) {
    addClass("#wrong-address-2", "Enter a valid address");
    return;
  } else {
    removeClass("#wrong-address-2");
  }

  if (!validate.validateFullname($(form).find("#fname").get(0).value)) {
    addClass("#wrong-fname-2", "Enter a Valid name");
    return;
  } else {
    removeClass("#wrong-fname-2");
  }

  if (!validate.validatePhone(parseInt($("#phone").get(0).value))) {
    addClass("#wrong-phone-2", "Enter a valid Phone no.");
    return;
  } else {
    removeClass("#wrong-phone-2");
  }

  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (res) {
      // alert(res);

      if(res == 'Enter a valid address' || res == 'Enter a valid phone no.' || res == 'Enter a valid Name' || res == 'Enter a valid Email' || res == 'Enter a valid username') {
        let serverModal = new bootstrap.Modal(
          document.getElementById("serverError")
        );
        serverModal.show();
      }

      if (
        res ==
        `Duplicate entry '${
          $(form).find("#email-2").get(0).value
        }' for key 'users.email'`
      ) {
        addClass("#wrong-email-2", "Email Already Taken");
        return;
      } else if (
        res ==
        `Duplicate entry '${
          $(form).find("#username").get(0).value
        }' for key 'users.Name'`
      ) {
        console.log("wrong username");
        addClass("#wrong-username-2", "Username already taken");
        return;
      } else if (
        res ==
        `Duplicate entry '${
          $(form).find("#phone").get(0).value
        }' for key 'users.phone'`
      ) {
        addClass("#wrong-phone-2", "Phone no. already in use");
        return;
      } else if(res == 1){
        var myModal = new bootstrap.Modal(
          document.getElementById("exampleModal")
        );
        myModal.show();
        $("#modalbutton").click(function () {
          $("#sign-in").toggleClass("d-none");
          $("#sign-up").addClass("d-none");
          clearFields("sign-up-2");
        });
        clearFields("sign-up-2");
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert("Status: " + textStatus);
      alert("Error: " + errorThrown);
    },
  });
});

$("#sign-in-2").submit(function (e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var actionUrl = form.attr("action");

  //   console.log();

  if (!validate.validateEmail($(form).find("#email").get(0).value)) {
    console.log("enter valid email");
    $("#wrong-email").addClass("d-inline-block");
    $("#wrong-email").removeClass("d-none");
    $("#wrong-email").html("<pre>   Enter a valid email</pre>");
    return;
  }

  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (res) {
      // console.log(res);
      // alert(res);
      if (res.length === 0 || res === "Wrong Credential pass") {
        let elements = $("#sign-in");
        let input_ele = elements.find("input");

        let label_ele = elements.find("label");
        console.log("ele", input_ele);

        $("#wrong-email").addClass("d-inline-block");
        $("#wrong-email").removeClass("d-none");
        $("#wrong-email").html("<pre>   Wrong Email entered </pre>");

        $("#wrong-pass").addClass("d-inline-block");
        $("#wrong-pass").removeClass("d-none");

        $(input_ele).each(function () {
          $(this).addClass("wrong-entry");
        });

        $(label_ele).each(function () {
          $(this).addClass("wrong-label");
        });
      } else if (res === "Get validated") {
        // alert("You are not authorised");
        var myModal = new bootstrap.Modal(
          document.getElementById("notAuth")
        );
        myModal.show();
      } else {
        sessionStorage.setItem("email", $(form).find("#email").get(0).value);
        window.location.href = res;
      }
      // setTimeout(function(){}, 3000)

      // console.log(res)
      //
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert("Status: " + textStatus);
      alert("Error: " + errorThrown);
    },
  });
});
