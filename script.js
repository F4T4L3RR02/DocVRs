$(document).ready(function () {

    $("#submitButton").hide();
    $("#fName").keypress(function () {
        $("#submitButton").slideDown(500);
    });
    $("#lName").keypress(function () {
        $("#submitButton").slideDown(500);
    });
    $("#email").keypress(function () {
        $("#submitButton").slideDown(500);
    });
    $("#password").keypress(function () {
        $("#submitButton").slideDown(500);
    });
    $("#fName").on("change", function () {
        $("#submitButton").slideDown(500);
    })
    $("#lName").on("change", function () {
        $("#submitButton").slideDown(500);
    })
    $("#email").on("change", function () {
        $("#submitButton").slideDown(500);
    })
    $("#password").on("change", function () {
        $("#submitButton").slideDown(500);
    })
});
