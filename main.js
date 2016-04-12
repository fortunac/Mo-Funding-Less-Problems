jQuery(document).ready(function ($) {
    $("#signup2").submit(function () {
        $.ajax({
            type: "POST",
            url: "signup.php",
            data: $('form.noteform').serialize(),
            success: function (msg) {
                $("#thanks").html(msg)
                $("form.noteform").modal('hide');
            },
            error: function () {
                alert("failure");
            }
        });
        return false;
    });
});