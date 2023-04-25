import validation from '../common js/validation.js';
import clearFields from "../common js/common.js";

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


$("#sign-in-2").submit(function (e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var actionUrl = form.attr("action");

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
        window.location.href = '../myadmin.php';
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert("Status: " + textStatus);
      alert("Error: " + errorThrown);
    },
  });
});
