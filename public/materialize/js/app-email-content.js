$(document).ready(function() {
    "use strict";
    $(".modal").modal(), $(".email-list li").click(function() {
        var e = $(this);
        e.hasClass("sidebar-title") || ($("li").removeClass("active"), e.addClass("active"))
    }), $(window).width() > 900 && $("#email-sidenav").removeClass("sidenav");
    new Quill(".snow-container .compose-editor", {
        modules: {
            toolbar: ".compose-quill-toolbar"
        },
        placeholder: "Reply Here",
        theme: "snow"
    }), new Quill(".snow-container .forward-email", {
        modules: {
            toolbar: ".forward-email-toolbar"
        },
        placeholder: "Your Message",
        theme: "snow"
    });
    if ($(".favorite i").on("click", function() {
            $(this).toggleClass("amber-text")
        }), $(".email-label i").on("click", function() {
            $(this).toggleClass("amber-text"), "label_outline" == $(this).text() ? $(this).text("label") : $(this).text("label_outline")
        }), $(".sidenav-trigger").on("click", function() {
            $(window).width() < 960 && ($(".sidenav").sidenav("close"), $(".app-sidebar").sidenav("close"))
        }), $("#email-sidenav").sidenav({
            onOpenStart: function() {
                $("#sidebar-list").addClass("sidebar-show")
            },
            onCloseEnd: function() {
                $("#sidebar-list").removeClass("sidebar-show")
            }
        }), $("#sidebar-list").length > 0) new PerfectScrollbar("#sidebar-list", {
        theme: "dark"
    });
    $(".reply").on("click", function() {
        $(".reply-box").toggleClass("d-none"), $(".forward-box").hasClass("d-none") || $(".forward-box").addClass("d-none")
    }), $(".forward").on("click", function() {
        var e = $(".email-desc").text().replace(/\s+/g, " ");
        $(".forward-email .ql-editor").html(e), $(".forward-box").toggleClass("d-none"), $(".reply-box").hasClass("d-none") || $(".reply-box").addClass("d-none")
    }), $("html[data-textdirection='rtl']").length > 0 && $("#email-sidenav").sidenav({
        edge: "right",
        onOpenStart: function() {
            $("#sidebar-list").addClass("sidebar-show")
        },
        onCloseEnd: function() {
            $("#sidebar-list").removeClass("sidebar-show")
        }
    })
}), $(window).on("resize", function() {
    $(window).width() > 899 && $("#email-sidenav").removeClass("sidenav"), $(window).width() < 900 && $("#email-sidenav").addClass("sidenav")
});