$(function() {
    indexCheckLogin();

    function indexCheckLogin() {
        var userToken = $.cookie("userToken");
        if (userToken) {
            $(".profile-box").fadeIn(500);
            $(".login-box").fadeOut(500);
            $(".topbar-login").fadeIn(500);
            $(".topbar-unlogin").fadeOut(500);
            $.ajax({
                url: App.url_prefix + "/api/users/me/profile",
                headers: {
                    "Authorization": App.token
                },
                success: function(data) {
                    var profile = data.data,
                        name = profile.name;
                    $(".profile-box .profile-avatar").attr("src", profile.avatar);
                    $(".profile-box .profile-user-name").text(name);
                    $(".profile-box .profile-user-name").text(name);
                    $(".topbar-login .user-login-name").text(name);
                    $(".profile-box .profile-user-id span").text(profile.code);
                    $(".profile-box .profile-user-level span").text(profile.level);
                    $.cookie("userName", name, {
                        path: "/"
                    });

                },
                error: function(xhr) {
                    var errorMsg = xhr.responseJSON || JSON.parse(xhr.responseText ? xhr.responseText : "{}");
                    if (errorMsg.error) {
                        if (errorMsg.error.trim() === "token_expired" || errorMsg.error.trim() === "token_not_provided") {
                            logout();
                        }
                    }
                }
            });
        } else {
            $(".profile-box").fadeOut(500);
            $(".login-box").fadeIn(500);
            $(".topbar-login").fadeOut(500);
            $(".topbar-unlogin").fadeIn(500);
        }
    }

    $(".user_searchicon").click(function() {
        var value = $(".toolbar-input").val();
        if (value.trim() === "") return;
        window.location.replace("/tools?domain=" + value)
    });
    checkActive();
});

function checkActive() {
    var href = window.location.href,
        activeLi = 'nav-index',
        domiansReg = 'domains',
        agentReg = 'agent',
        consignmentReg = 'consignment',
        allianceReg = 'alliance',
        toolReg = "tools",
        indexReg = "index",
        aboutReg = "page/about";
    if (href.indexOf(domiansReg) !== -1) {
        activeLi = ".nav-domains";
    } else if (href.indexOf(toolReg) !== -1) {
        activeLi = ".nav-tools";
    } else if (href.indexOf(aboutReg) !== -1) {
        activeLi = ".nav-about"
    } else if (href.indexOf(agentReg) !== -1) {
        activeLi = ".nav-agent"
    } else if (href.indexOf(consignmentReg) !== -1) {
        activeLi = ".nav-consignment"
    } else if (href.indexOf(allianceReg) !== -1) {
        activeLi = ".nav-alliance"
    } else if (href.indexOf(indexReg) !== -1) {
        activeLi = ".nav-index"
    }
    $(activeLi).addClass("active").siblings("li").removeClass("active");
}

function logout() {
    window.sessionStorage.clear();
    $.cookie("userToken", "Bearer ", {
        path: '/',
        expires: -1
    });
    $.cookie("per_page", "10", {
        path: '/',
        expires: -1
    });
    $.cookie("laravel_session", "Bearer ", {
        path: '/',
        expires: -1
    });
    $.cookie("bindBank", "Bearer ", {
        path: '/',
        expires: -1
    });
    $.cookie("userName", " ", {
        path: '/',
        expires: -1
    });
    $.cookie("messageCount", "", {
        path: '/',
        expires: -1
    });
    $.cookie("userRole", "", {
        path: '/',
        expires: -1
    });
    $.ajax({
        url: App.url_prefix + "/api/logout",
        method: "POST",
        success: function() {
            window.location.reload();
        }
    });
}