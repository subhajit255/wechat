$(document).on("click", ".my-contacts", function () {
    // $("#contact_lists").load("#contact_lists > *");
    $("#contacts").empty()
    let key = 1;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": document.head.querySelector(
                'meta[name="csrf-token"]'
            ).content,
        },
    });
    $.ajax({
        type: "get",
        url: APP_URL + "/my-contacts/" + key,
        success: function (response) {
            $.each(response.data, function (index, contacts) {
                // if (navigator.onLine) {
                //     console.log("online");
                //   } else {
                //     console.log("offline");
                //   }
                var listItem = $(
                    '<a href="#" class="filterMembers all online contact start-chat" data-toggle="list" data-name="'+contacts.name+'" data-image="'+contacts.image+'" data-gender="'+contacts.gender+'" data-status="'+contacts.status+'"></a>'
                );
                if (contacts.image === null) {
                    if (contacts.gender === "male"){
                        listItem.append(
                            '<img class="avatar" src="' +
                                APP_URL +
                                '/assets/dist/img/avatars/default-male.jpg" data-toggle="tooltip" data-placement="top" title="' +
                                contacts.name +
                                '" alt="avatar">'
                        );
                    }else if(contacts.gender === "female"){
                        listItem.append(
                            '<img class="avatar" src="' +
                                APP_URL +
                                '/assets/dist/img/avatars/default-female.jpg" data-toggle="tooltip" data-placement="top" title="' +
                                contacts.name +
                                '" alt="avatar">'
                        );
                    }
                } else {
                    listItem.append(
                        '<img class="avatar" src="' +
                            APP_URL +
                            "/storage/user_image/" +
                            contacts.image +
                            '" data-toggle="tooltip" data-placement="top" title="' +
                            contacts.name +
                            '" alt="avatar">'
                    );
                }
                // Set the image source

                // Set the online status
                listItem.append(
                    '<div class="status"><i class="material-icons ' +
                        (contacts.status == 1 ? "online" : "offline") +
                        '">fiber_manual_record</i></div>'
                );

                // Set the friends name
                listItem.append(
                    '<div class="data"><h5 class="friends-name" id="friends_name'+index+'" data-value="'+contacts.name+'">' +
                        contacts.name +
                        "</h5></div>"
                );
                // Set the person-add icon
                listItem.append(
                    '<div class="person-add"><i class="material-icons">person</i></div>'
                );

                // Append the created list item to the #contacts div
                $("#contacts").append(listItem);
            });
            
        },
        error: function (response) {
            let responseJSON = response.responseJSON;
            $(".err_message").removeClass("d-block").remove();
            $("form .form-control").removeClass("is-invalid");
            $.each(responseJSON.errors, function (index, valueMessage) {
                showToast("error", "Error", valueMessage);
            });
        },
    });
    
      
});

// status wise user all

$(document).on("click", "#all_user", function () {
    // $("#contact_lists").load("#contact_lists > *");
    $("#contacts").empty()
    let key = 1;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": document.head.querySelector(
                'meta[name="csrf-token"]'
            ).content,
        },
    });
    $.ajax({
        type: "get",
        url: APP_URL + "/my-contacts/" + key,
        success: function (response) {
            $.each(response.data, function (index, contacts) {
                // if (navigator.onLine) {
                //     console.log("online");
                //   } else {
                //     console.log("offline");
                //   }
                var listItem = $(
                    '<a href="#" class="filterMembers all online contact start-chat" data-toggle="list" data-name="'+contacts.name+'" data-image="'+contacts.image+'" data-gender="'+contacts.gender+'" data-status="'+contacts.status+'"></a>'
                );
                if (contacts.image === null) {
                    if (contacts.gender === "male"){
                        listItem.append(
                            '<img class="avatar" src="' +
                                APP_URL +
                                '/assets/dist/img/avatars/default-male.jpg" data-toggle="tooltip" data-placement="top" title="' +
                                contacts.name +
                                '" alt="avatar">'
                        );
                    }else if(contacts.gender === "female"){
                        listItem.append(
                            '<img class="avatar" src="' +
                                APP_URL +
                                '/assets/dist/img/avatars/default-female.jpg" data-toggle="tooltip" data-placement="top" title="' +
                                contacts.name +
                                '" alt="avatar">'
                        );
                    }
                } else {
                    listItem.append(
                        '<img class="avatar" src="' +
                            APP_URL +
                            "/storage/user_image/" +
                            contacts.image +
                            '" data-toggle="tooltip" data-placement="top" title="' +
                            contacts.name +
                            '" alt="avatar">'
                    );
                }
                // Set the image source

                // Set the online status
                listItem.append(
                    '<div class="status"><i class="material-icons ' +
                        (contacts.status == 1 ? "online" : "offline") +
                        '">fiber_manual_record</i></div>'
                );

                // Set the friends name
                listItem.append(
                    '<div class="data"><h5 class="friends-name" id="friends_name'+index+'" data-value="'+contacts.name+'">' +
                        contacts.name +
                        "</h5></div>"
                );
                // Set the person-add icon
                listItem.append(
                    '<div class="person-add"><i class="material-icons">person</i></div>'
                );

                // Append the created list item to the #contacts div
                $("#contacts").append(listItem);
            });
            
        },
        error: function (response) {
            let responseJSON = response.responseJSON;
            $(".err_message").removeClass("d-block").remove();
            $("form .form-control").removeClass("is-invalid");
            $.each(responseJSON.errors, function (index, valueMessage) {
                showToast("error", "Error", valueMessage);
            });
        },
    });
    
      
})

// online users

$(document).on("click", "#online_user", function () {
    // $("#contact_lists").load("#contact_lists > *");
    $("#contacts").empty()
    let key = 2;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": document.head.querySelector(
                'meta[name="csrf-token"]'
            ).content,
        },
    });
    $.ajax({
        type: "get",
        url: APP_URL + "/my-contacts/" + key,
        success: function (response) {
            $.each(response.data, function (index, contacts) {
                // if (navigator.onLine) {
                //     console.log("online");
                //   } else {
                //     console.log("offline");
                //   }
                var listItem = $(
                    '<a href="#" class="filterMembers all online contact start-chat" data-toggle="list" data-name="'+contacts.name+'" data-image="'+contacts.image+'" data-gender="'+contacts.gender+'" data-status="'+contacts.status+'"></a>'
                );
                if (contacts.image === null) {
                    if (contacts.gender === "male"){
                        listItem.append(
                            '<img class="avatar" src="' +
                                APP_URL +
                                '/assets/dist/img/avatars/default-male.jpg" data-toggle="tooltip" data-placement="top" title="' +
                                contacts.name +
                                '" alt="avatar">'
                        );
                    }else if(contacts.gender === "female"){
                        listItem.append(
                            '<img class="avatar" src="' +
                                APP_URL +
                                '/assets/dist/img/avatars/default-female.jpg" data-toggle="tooltip" data-placement="top" title="' +
                                contacts.name +
                                '" alt="avatar">'
                        );
                    }
                } else {
                    listItem.append(
                        '<img class="avatar" src="' +
                            APP_URL +
                            "/storage/user_image/" +
                            contacts.image +
                            '" data-toggle="tooltip" data-placement="top" title="' +
                            contacts.name +
                            '" alt="avatar">'
                    );
                }
                // Set the image source

                // Set the online status
                listItem.append(
                    '<div class="status"><i class="material-icons ' +
                        (contacts.status == 1 ? "online" : "offline") +
                        '">fiber_manual_record</i></div>'
                );

                // Set the friends name
                listItem.append(
                    '<div class="data"><h5 class="friends-name" id="friends_name'+index+'" data-value="'+contacts.name+'">' +
                        contacts.name +
                        "</h5></div>"
                );
                // Set the person-add icon
                listItem.append(
                    '<div class="person-add"><i class="material-icons">person</i></div>'
                );

                // Append the created list item to the #contacts div
                $("#contacts").append(listItem);
            });
            
        },
        error: function (response) {
            let responseJSON = response.responseJSON;
            $(".err_message").removeClass("d-block").remove();
            $("form .form-control").removeClass("is-invalid");
            $.each(responseJSON.errors, function (index, valueMessage) {
                showToast("error", "Error", valueMessage);
            });
        },
    });
    
      
})

// offline users

$(document).on("click", "#offline_user", function () {
    // $("#contact_lists").load("#contact_lists > *");
    $("#contacts").empty()
    let key = 3;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": document.head.querySelector(
                'meta[name="csrf-token"]'
            ).content,
        },
    });
    $.ajax({
        type: "get",
        url: APP_URL + "/my-contacts/" + key,
        success: function (response) {
            $.each(response.data, function (index, contacts) {
                // if (navigator.onLine) {
                //     console.log("online");
                //   } else {
                //     console.log("offline");
                //   }
                var listItem = $(
                    '<a href="#" class="filterMembers all online contact start-chat" data-toggle="list" data-name="'+contacts.name+'" data-image="'+contacts.image+'" data-gender="'+contacts.gender+'" data-status="'+contacts.status+'"></a>'
                );
                if (contacts.image === null) {
                    if (contacts.gender === "male"){
                        listItem.append(
                            '<img class="avatar" src="' +
                                APP_URL +
                                '/assets/dist/img/avatars/default-male.jpg" data-toggle="tooltip" data-placement="top" title="' +
                                contacts.name +
                                '" alt="avatar">'
                        );
                    }else if(contacts.gender === "female"){
                        listItem.append(
                            '<img class="avatar" src="' +
                                APP_URL +
                                '/assets/dist/img/avatars/default-female.jpg" data-toggle="tooltip" data-placement="top" title="' +
                                contacts.name +
                                '" alt="avatar">'
                        );
                    }
                } else {
                    listItem.append(
                        '<img class="avatar" src="' +
                            APP_URL +
                            "/storage/user_image/" +
                            contacts.image +
                            '" data-toggle="tooltip" data-placement="top" title="' +
                            contacts.name +
                            '" alt="avatar">'
                    );
                }
                // Set the image source

                // Set the online status
                listItem.append(
                    '<div class="status"><i class="material-icons ' +
                        (contacts.status == 1 ? "online" : "offline") +
                        '">fiber_manual_record</i></div>'
                );

                // Set the friends name
                listItem.append(
                    '<div class="data"><h5 class="friends-name" id="friends_name'+index+'" data-value="'+contacts.name+'">' +
                        contacts.name +
                        "</h5></div>"
                );
                // Set the person-add icon
                listItem.append(
                    '<div class="person-add"><i class="material-icons">person</i></div>'
                );

                // Append the created list item to the #contacts div
                $("#contacts").append(listItem);
            });
            
        },
        error: function (response) {
            let responseJSON = response.responseJSON;
            $(".err_message").removeClass("d-block").remove();
            $("form .form-control").removeClass("is-invalid");
            $.each(responseJSON.errors, function (index, valueMessage) {
                showToast("error", "Error", valueMessage);
            });
        },
    });
    
      
})
