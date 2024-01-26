$(document).on("click", "#sign_up", function (e) {
    e.preventDefault();
    var formData = $("#form_submit").serialize();
    let url = $("#form_submit").attr("data-action");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": document.head.querySelector(
                'meta[name="csrf-token"]'
            ).content,
        },
    });
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (response) {
            if (response.status) {
                location.href = response.data;
                showToast("success", "We Chat", response.message);
            }else{
                showToast("error", "We Chat", response.message);
            }
        },
        error: function (error) {
            console.log(error);
            // Handle error response
            showToast("error", "We Chat", error.responseJSON.message);
        },
    });
});
