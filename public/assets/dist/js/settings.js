$(document).on("click", ".settings", function () {
    let data = JSON.parse($(this).attr("data-user"));
    $(".user-name").html(data.name);
    if (data.image != null) {
        $(".avatar-xl").attr(
            "src",
            APP_URL + "/storage/user_image/" + data.image
        );
    } else {
        if (data.gender === "male") {
            $(".avatar-xl").attr(
                "src",
                APP_URL + "/assets/dist/img/avatars/default-male.jpg"
            );
        } else {
            $(".avatar-xl").attr(
                "src",
                APP_URL + "/assets/dist/img/avatars/default-female.jpg"
            );
        }
    }
    $("#id").val(data.id);
    $("#name").val(data.name);
    $("#email").val(data.email);
    console.log(data);
});
$("form.formSubmit").on("submit", function (e) {
    e.preventDefault();
    var $this = $(this);
    console.log($this);
    var formActionUrl = $this.prop("action");
    console.log($($this).attr("id"));
    if ($($this).hasClass("fileUpload")) {
        var fd = new FormData(document.getElementById($($this).attr("id")));
    } else {
        var fd = $(document.getElementById($($this).attr("id"))).serialize();
    }
    let commonOption = {
        type: "post",
        url: formActionUrl,
        data: fd,
        dataType: "json",
    };
    if ($($this).hasClass("fileUpload")) {
        commonOption["cache"] = false;
        commonOption["processData"] = false;
        commonOption["contentType"] = false;
    }
    console.log(commonOption);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": document.head.querySelector(
                'meta[name="csrf-token"]'
            ).content,
        },
    });
    $.ajax({
        ...commonOption,
        beforeSend: function () {},
        success: function (response) {
            if (response.status) {
                showToast("success", "We Chat", response.message);
                location.reload();
            } else {
                showToast("error", "We Chat", "Something went Wrong");
            }
        },
        error: function (response) {
            let responseJSON = response.responseJSON;
            $(".err_message").removeClass("d-block").remove();
            $("form .form-control").removeClass("is-invalid");
            $.each(responseJSON.errors, function (index, valueMessage) {
                showToast("error", "Error", valueMessage);
            });
        },
        /* ,
        complete: function(response){
            location.reload();
        } */
    });
});
