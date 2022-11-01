$(document).ready(function () {
  $("form").submit(function (event) {
    $(".form-group").removeClass("has-error");
    $(".help-block").remove();
    var formData = {
      name: $("#name").val(),
      surname: $("#surname").val(),
      gender: $("#gender").val(),
      date: $("#date").val(),
      address: $("#address").val(),
      city: $("#city").val(),
    };

    $.ajax({
      type: "POST",
      url: "back.php",
      data: formData,
      dataType: "json",
      encode: true,
    })
      .done(function (data) {
        console.log(data);

        if (!data.success) {
          if (data.errors.name) {
            $("#name-group").addClass("has-error");
            $("#name-group").append(
              '<div class="help-block">' + data.errors.name + "</div>"
            );
          }

          if (data.errors.surname) {
            $("#surname-group").addClass("has-error");
            $("#surname-group").append(
              '<div class="help-block">' + data.errors.surname + "</div>"
            );
          }

          if (data.errors.gender) {
            $("#gender-group").addClass("has-error");
            $("#gender-group").append(
              '<div class="help-block">' + data.errors.gender + "</div>"
            );
          }

          if (data.errors.date) {
            $("#date-group").addClass("has-error");
            $("#date-group").append(
              '<div class="help-block">' + data.errors.date + "</div>"
            );
          }

          if (data.errors.address) {
            $("#address-group").addClass("has-error");
            $("#address-group").append(
              '<div class="help-block">' + data.errors.address + "</div>"
            );
          }
          if (data.errors.city) {
            $("#city-group").addClass("has-error");
            $("#city-group").append(
              '<div class="help-block">' + data.errors.city + "</div>"
            );
          }
        } else {
          $("form").html(
            '<div class="alert alert-success">' + data.message + "</div>"
          );
        }
      })
      .fail(function (data) {
        $("form").html(
          '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
        );
      });
    event.preventDefault();
  });
});
