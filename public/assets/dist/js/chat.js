$(document).on("click", ".start-chat", function () {
    let userName = $(this).attr("data-name");
    let userImage = $(this).attr("data-image");
    let userGender = $(this).attr("data-gender");
    let userStatus = $(this).attr("data-status");
    let image = "";
    console.log(userImage);
    if (userImage === "null") {
        console.log("hii");
        if (userGender == "male") {
            image = APP_URL + "/assets/dist/img/avatars/default-male.jpg";
        } else {
            image = APP_URL + "/assets/dist/img/avatars/default-female.jpg";
        }
    } else {
        console.log("hello");
        image = APP_URL + "/storage/user_image/" + userImage;
    }
    console.log(image);
    $(".user-name").html(userName);
    $(".avatar-md").attr("src", image);
    if(userStatus == 1){
        $(".user-status").html("Active Now")
        $("#active_status").removeClass("offline")
        $("#active_status").addClass("online")
    }else{
        $(".user-status").html("offline")
        $("#active_status").removeClass("online")
        $("#active_status").addClass("offline")
    }
});
