!function() {
    "use strict";
    var t, e, a, s, n = localStorage.getItem("language"), o = "en";
    // function l(e) {
    //     document.getElementsByClassName("header-lang-img").forEach(function(t) {
    //         if (t) {
    //             switch (e) {
    //             case "eng":
    //                 t.src = "assets/images/flags/us.jpg";
    //                 break;
    //             case "sp":
    //                 t.src = "assets/images/flags/spain.jpg";
    //                 break;
    //             case "gr":
    //                 t.src = "assets/images/flags/germany.jpg";
    //                 break;
    //             case "it":
    //                 t.src = "assets/images/flags/italy.jpg";
    //                 break;
    //             case "ru":
    //                 t.src = "assets/images/flags/russia.jpg";
    //                 break;
    //             default:
    //                 t.src = "assets/images/flags/us.jpg"
    //             }
    //             localStorage.setItem("language", e),
    //             n = localStorage.getItem("language"),
    //             function() {
    //                 null == n && l(o);
    //                 var t = new XMLHttpRequest;
    //                 t.open("GET", "/assets/lang/" + n + ".json"),
    //                 t.onreadystatechange = function() {
    //                     var a;
    //                     4 === this.readyState && 200 === this.status && (a = JSON.parse(this.responseText),
    //                     Object.keys(a).forEach(function(e) {
    //                         document.querySelectorAll("[data-key='" + e + "']").forEach(function(t) {
    //                             t.textContent = a[e]
    //                         })
    //                     }))
    //                 }
    //                 ,
    //                 t.send()
    //             }()
    //         }
    //     })
    // }
    function r() {
        var t = document.querySelectorAll(".counter-value");
        t && t.forEach(function(n) {
            !function t() {
                var e = +n.getAttribute("data-target")
                  , a = +n.innerText
                  , s = e / 250;
                s < 1 && (s = 1),
                a < e ? (n.innerText = (a + s).toFixed(0),
                setTimeout(t, 1)) : n.innerText = e
            }()
        })
    }
    function i() {
        setTimeout(function() {
            var t, e, a, s = document.getElementById("side-menu");
            s && (t = s.querySelector(".mm-active .active"),
            300 < (e = t ? t.offsetTop : 0) && (e -= 100,
            (a = document.getElementsByClassName("vertical-menu") ? document.getElementsByClassName("vertical-menu")[0] : "") && a.querySelector(".simplebar-content-wrapper") && setTimeout(function() {
                a.querySelector(".simplebar-content-wrapper").scrollTop = e
            }, 0)))
        }, 0)
    }
    function d() {
        for (var t = document.getElementById("topnav-menu-content").getElementsByTagName("a"), e = 0, a = t.length; e < a; e++)
            "nav-item dropdown active" === t[e].parentElement.getAttribute("class") && (t[e].parentElement.classList.remove("active"),
            t[e].nextElementSibling.classList.remove("show"))
    }
    function c(t) {
        var e = document.getElementById(t);
        e.style.display = "block";
        var a = setInterval(function() {
            e.style.opacity || (e.style.opacity = 1),
            0 < e.style.opacity ? e.style.opacity -= .2 : (clearInterval(a),
            e.style.display = "none")
        }, 200)
    }
    function u() {
        var t, e, a;
        eva.replace(),
        window.sessionStorage && ((t = sessionStorage.getItem("is_visited")) ? null !== (e = document.querySelector("#" + t)) && (e.checked = !0,
        a = t,
        1 == document.getElementById("layout-direction-ltr").checked && "layout-direction-ltr" === a ? (document.getElementsByTagName("html")[0].removeAttribute("dir"),
        document.getElementById("layout-direction-rtl").checked = !1,
        document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap.min.css"),
        document.getElementById("app-style").setAttribute("href", "assets/css/app.min.css"),
        sessionStorage.setItem("is_visited", "layout-direction-ltr")) : 1 == document.getElementById("layout-direction-rtl").checked && "layout-direction-rtl" === a && (document.getElementById("layout-direction-ltr").checked = !1,
        document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap-rtl.min.css"),
        document.getElementById("app-style").setAttribute("href", "assets/css/app-rtl.min.css"),
        document.getElementsByTagName("html")[0].setAttribute("dir", "rtl"),
        sessionStorage.setItem("is_visited", "layout-direction-rtl"))) : sessionStorage.setItem("is_visited", "layout-direction-ltr"));
        var s = document.getElementsByTagName("body")[0];
        s.hasAttribute("data-layout") && "horizontal" == s.getAttribute("data-layout") ? (m("layout-horizontal"),
        document.getElementById("sidebar-setting").style.display = "none",
        document.getElementsByClassName("vertical-menu")[0].style.display = "none",
        document.getElementsByClassName("ishorizontal-topbar")[0].style.display = "block",
        document.getElementsByClassName("isvertical-topbar")[0].style.display = "none",
        document.getElementsByClassName("topnav")[0].style.display = "block",
        document.getElementsByClassName("footer")[0].style.display = "block",
        "light" == s.hasAttribute("data-topbar") ? (m("topbar-color-light"),
        document.body.setAttribute("data-topbar", "light")) : "dark" == s.hasAttribute("data-topbar") && (m("topbar-color-dark"),
        document.body.setAttribute("data-topbar", "dark")),
        document.body.removeAttribute("data-sidebar")) : (document.getElementsByClassName("isvertical-topbar")[0].style.display = "block",
        m("layout-vertical"),
        document.getElementsByClassName("topnav")[0].style.display = "none",
        document.getElementsByClassName("ishorizontal-topbar")[0].style.display = "none")
    }
    function m(t) {
        document.getElementById(t) && (document.getElementById(t).checked = !0)
    }
    function b() {
        document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || document.body.classList.remove("fullscreen-enable")
    }
    window.onload = function() {
        document.getElementById("preloader") && (c("pre-status"),
        c("preloader"))
    }
    ,
    u(),
    document.addEventListener("DOMContentLoaded", function(t) {
        document.getElementById("side-menu") && new MetisMenu("#side-menu")
    }),
    r(),
    function() {
        var e = document.body.getAttribute("data-sidebar-size");
        window.onload = function() {
            1024 <= window.innerWidth && window.innerWidth <= 1366 && (document.body.setAttribute("data-sidebar-size", "sm"),
            m("sidebar-size-small"))
        }
        ;
        for (var t = document.getElementsByClassName("vertical-menu-btn"), a = 0; a < t.length; a++)
            t[a] && t[a].addEventListener("click", function(t) {
                t.preventDefault(),
                document.body.classList.toggle("sidebar-enable"),
                992 <= window.innerWidth ? null == e ? null == document.body.getAttribute("data-sidebar-size") || "lg" == document.body.getAttribute("data-sidebar-size") ? document.body.setAttribute("data-sidebar-size", "sm") : document.body.setAttribute("data-sidebar-size", "lg") : "md" == e ? "md" == document.body.getAttribute("data-sidebar-size") ? document.body.setAttribute("data-sidebar-size", "sm") : document.body.setAttribute("data-sidebar-size", "md") : "sm" == document.body.getAttribute("data-sidebar-size") ? document.body.setAttribute("data-sidebar-size", "lg") : document.body.setAttribute("data-sidebar-size", "sm") : i()
            })
    }(),
    setTimeout(function() {
        var t = document.querySelectorAll("#sidebar-menu a");
        t && t.forEach(function(t) {
            var e, a, s, n, o, l = window.location.href.split(/[?#]/)[0];
            t.href == l && (t.classList.add("active"),
            (e = t.parentElement) && "side-menu" !== e.id && (e.classList.add("mm-active"),
            (a = e.parentElement) && "side-menu" !== a.id && (a.classList.add("mm-show"),
            a.classList.contains("mm-collapsing") && console.log("has mm-collapsing"),
            (s = a.parentElement) && "side-menu" !== s.id && (s.classList.add("mm-active"),
            (n = s.parentElement) && "side-menu" !== n.id && (n.classList.add("mm-show"),
            (o = n.parentElement) && "side-menu" !== o.id && o.classList.add("mm-active"))))))
        })
    }, 0),
    (t = document.querySelectorAll(".navbar-nav a")) && t.forEach(function(t) {
        var e, a, s, n, o, l, r = window.location.href.split(/[?#]/)[0];
        t.href == r && (t.classList.add("active"),
        (e = t.parentElement) && (e.classList.add("active"),
        (a = e.parentElement).classList.add("active"),
        (s = a.parentElement) && (s.classList.add("active"),
        (n = s.parentElement).closest("li") && n.closest("li").classList.add("active"),
        n && (n.classList.add("active"),
        (o = n.parentElement) && (o.classList.add("active"),
        (l = o.parentElement) && l.classList.add("active"))))))
    }),
    (e = document.querySelector('[data-toggle="fullscreen"]')) && e.addEventListener("click", function(t) {
        t.preventDefault(),
        document.body.classList.toggle("fullscreen-enable"),
        document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement ? document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen() : document.documentElement.requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
    }),
    document.addEventListener("fullscreenchange", b),
    document.addEventListener("webkitfullscreenchange", b),
    document.addEventListener("mozfullscreenchange", b),
    function() {
        if (document.getElementById("topnav-menu-content")) {
            for (var t = document.getElementById("topnav-menu-content").getElementsByTagName("a"), e = 0, a = t.length; e < a; e++)
                t[e].onclick = function(t) {
                    "#" === t.target.getAttribute("href") && (t.target.parentElement.classList.toggle("active"),
                    t.target.nextElementSibling.classList.toggle("show"))
                }
                ;
            window.addEventListener("resize", d)
        }
    }(),
    [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(t) {
        return new bootstrap.Tooltip(t)
    }),
    [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(t) {
        return new bootstrap.Popover(t)
    }),
    [].slice.call(document.querySelectorAll(".toast")).map(function(t) {
        return new bootstrap.Toast(t)
    }),
    // function() {
    //     "null" != n && n !== o && l(n);
    //     var t = document.getElementsByClassName("language");
    //     t && t.forEach(function(e) {
    //         e.addEventListener("click", function(t) {
    //             l(e.getAttribute("data-lang"))
    //         })
    //     })
    // }(),
    a = document.body,
    // document.getElementsByClassName("right-bar-toggle").forEach(function(t) {
    //     t.addEventListener("click", function(t) {
    //         a.classList.toggle("right-bar-enabled")
    //     })
    // }),
    a.addEventListener("click", function(t) {
        !t.target.parentElement.classList.contains("right-bar-toggle-close") && t.target.closest(".right-bar-toggle, .right-bar") || document.body.classList.remove("right-bar-enabled")
    }),
    (a = document.getElementsByTagName("body")[0]).hasAttribute("data-layout") && "horizontal" == a.getAttribute("data-layout") ? (m("layout-horizontal"),
    "light" == a.hasAttribute("data-topbar") ? (m("topbar-color-light"),
    document.body.setAttribute("data-topbar", "light")) : "dark" == a.hasAttribute("data-topbar") && (m("topbar-color-dark"),
    document.body.setAttribute("data-topbar", "dark")),
    document.getElementById("sidebar-setting").style.display = "none",
    document.body.removeAttribute("data-sidebar")) : (m("layout-vertical"),
    document.getElementById("sidebar-setting").style.display = "block"),
    a.hasAttribute("data-layout-mode") && "dark" == a.getAttribute("data-layout-mode") ? m("layout-mode-dark") : m("layout-mode-light"),
    a.hasAttribute("data-layout-size") && "boxed" == a.getAttribute("data-layout-size") ? m("layout-width-boxed") : m("layout-width-fluid"),
    a.hasAttribute("data-layout-scrollable") && "true" == a.getAttribute("data-layout-scrollable") ? m("layout-position-scrollable") : m("layout-position-fixed"),
    a.hasAttribute("data-topbar") && "dark" == a.getAttribute("data-topbar") ? m("topbar-color-dark") : m("topbar-color-light"),
    a.hasAttribute("data-sidebar-size") && "sm" == a.getAttribute("data-sidebar-size") ? m("sidebar-size-small") : a.hasAttribute("data-sidebar-size") && "md" == a.getAttribute("data-sidebar-size") ? m("sidebar-size-compact") : m("sidebar-size-default"),
    a.hasAttribute("data-sidebar") && "brand" == a.getAttribute("data-sidebar") ? m("sidebar-color-brand") : a.hasAttribute("data-sidebar") && "dark" == a.getAttribute("data-sidebar") ? m("sidebar-color-dark") : m("sidebar-color-light"),
    document.getElementsByTagName("html")[0].hasAttribute("dir") && "rtl" == document.getElementsByTagName("html")[0].getAttribute("dir") ? m("layout-direction-rtl") : m("layout-direction-ltr"),
    document.querySelectorAll("input[name='layout'").forEach(function(t) {
        t.addEventListener("change", function(t) {
            t && t.target && "vertical" == t.target.value ? (m("layout-vertical"),
            m("topbar-color-light"),
            document.body.setAttribute("data-layout", "vertical"),
            document.body.setAttribute("data-topbar", "light"),
            document.getElementsByClassName("isvertical-topbar")[0].style.display = "block",
            document.getElementsByClassName("ishorizontal-topbar")[0].style.display = "none",
            document.getElementsByClassName("vertical-menu")[0].style.display = "block",
            document.getElementById("sidebar-setting").style.display = "block",
            document.getElementsByClassName("topnav")[0].style.display = "none",
            window.innerWidth <= 992 && document.getElementsByClassName("vertical-menu")[0].removeAttribute("style"),
            document.getElementsByClassName("footer")[0].style.display = "none") : (m("layout-horizontal"),
            m("topbar-color-light"),
            document.body.setAttribute("data-topbar", "light"),
            document.body.setAttribute("data-layout", "horizontal"),
            document.body.removeAttribute("data-sidebar"),
            document.getElementById("sidebar-setting").style.display = "none",
            document.getElementsByClassName("vertical-menu")[0].style.display = "none",
            document.getElementsByClassName("ishorizontal-topbar")[0].style.display = "block",
            document.getElementsByClassName("isvertical-topbar")[0].style.display = "none",
            document.getElementsByClassName("topnav")[0].style.display = "block",
            document.getElementsByClassName("footer")[0].style.display = "block")
        })
    }),
    document.querySelectorAll("input[name='layout-mode']").forEach(function(t) {
        t.addEventListener("change", function(t) {
            t && t.target && t.target.value && ("light" == t.target.value ? (document.body.setAttribute("data-layout-mode", "light"),
            document.body.setAttribute("data-topbar", "light"),
            document.body.setAttribute("data-sidebar", "light"),
            a.hasAttribute("data-layout") && "horizontal" == a.getAttribute("data-layout") || document.body.setAttribute("data-sidebar", "light"),
            m("topbar-color-light"),
            m("sidebar-color-light")) : "dark" == t.target.value ? (document.body.setAttribute("data-layout-mode", "dark"),
            document.body.setAttribute("data-topbar", "dark"),
            document.body.setAttribute("data-sidebar", "dark"),
            a.hasAttribute("data-layout") && "horizontal" == a.getAttribute("data-layout") || document.body.setAttribute("data-sidebar", "dark"),
            m("topbar-color-dark")) : "bordered" == t.target.value && document.body.setAttribute("data-layout-mode", "bordered"))
        })
    }),
    document.querySelectorAll("input[name='layout-direction']").forEach(function(t) {
        t.addEventListener("change", function(t) {
            t && t.target && t.target.value && ("ltr" == t.target.value ? (document.getElementsByTagName("html")[0].removeAttribute("dir"),
            document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap.min.css"),
            document.getElementById("app-style").setAttribute("href", "assets/css/app.min.css"),
            sessionStorage.setItem("is_visited", "layout-direction-ltr")) : (document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap-rtl.min.css"),
            document.getElementById("app-style").setAttribute("href", "assets/css/app-rtl.min.css"),
            document.getElementsByTagName("html")[0].setAttribute("dir", "rtl"),
            sessionStorage.setItem("is_visited", "layout-direction-rtl")))
        })
    }),
    i(),
    (s = document.getElementById("checkAll")) && (s.onclick = function() {
        for (var t = document.querySelectorAll('.table-check input[type="checkbox"]'), e = 0; e < t.length; e++)
            t[e].checked = this.checked
    }
    )
}();

// window.fn1 = function fn1() {
//     alert("external fn clicked");
// }

window.notifLaunch = function notifLaunch(status,message) {
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown",
        "hideMethod": "slideUp"
    }
    if(status=="success"){
        toastr["success"](message)
    }
    if(status=="error"){
        toastr["error"](message)
    }
}


window.checkNotif = function checkNotif() {
    $.ajax({
        type: "POST",
        url: $("#BaseUrl").val()+'notification',
        dataType: "JSON",
        success: function(data) {
            console.log(data.results)
            let list = "";
            for (i = 0; i < data.results.length; i++) {
                if(data.results[i].read_status == 1){
                    const s_id = new String("'"+data.results[i].id_notif+"'");
                    list +=
                        '<a href="'+$("#BaseUrl").val()+''+data.results[i].path_notif+'" onclick="readNotif('+s_id+')"  class="text-reset notification-item">'+
                        // '<a href="#" onclick="readNotif('+s_id+')" class="text-reset notification-item">'+
                            '<div class="d-flex list-group-item list-group-item-action list-group-item-warning py-1">'+
                                '<div class="flex-shrink-0 align-self-center avatar-sm me-3">'+
                                    '<span class="avatar-title bg-success rounded-circle font-size-16">'+
                                        '<i class="bx bx-badge-check"></i>'+
                                    '</span>'+
                                '</div>'+
                                '<div class="flex-grow-1">'+
                                    '<h6 class="mb-1">'+data.results[i].type_notif+'</h6>'+
                                    '<div class="font-size-13">'+
                                        '<p class="mb-0 font-size-16"><strong class="text-primary"><u>'+data.results[i].title_notif+'</u> </strong>'+data.results[i].notification+'</p>'+
                                        '<p class="mb-0 fst-italic text-end"><span class="">'+data.results[i].created_at+'</span></p>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</a>'
                    ;
                } else {
                    const s_id = new String("'"+data.results[i].id_notif+"'");
                    list +=
                    '<a href="'+$("#BaseUrl").val()+''+data.results[i].path_notif+'" onclick="readNotif('+s_id+')"  class="text-reset notification-item">'+
                            '<div class="d-flex py-1">'+
                                '<div class="flex-shrink-0 align-self-center avatar-sm me-3">'+
                                    '<span class="avatar-title bg-success rounded-circle font-size-16">'+
                                        '<i class="bx bx-badge-check"></i>'+
                                    '</span>'+
                                '</div>'+
                                '<div class="flex-grow-1">'+
                                    '<h6 class="mb-1">'+data.results[i].type_notif+'</h6>'+
                                    '<div class="font-size-13">'+
                                        '<p class="mb-0 font-size-16"><strong class="text-primary"><u>'+data.results[i].title_notif+'</u> </strong>'+data.results[i].notification+'</p>'+
                                        '<p class="mb-0 fst-italic text-end"><span class="">'+data.results[i].created_at+'</span></p>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</a>'
                    ;
                }
            }

            $("#listNotif").html(list);

            let pillhtml = "";
            if(data.pill > 0){
                pillhtml +=
                    // '<i class="bx bx-bell icon-sm align-middle"></i>'+
                    '<span class="noti-dot bg-danger rounded-pill" >'+data.pill+'</span>'
                ;
            }else{
                $(".noti-dot").remove();
            }
            $("#page-header-notifications-dropdown").append(pillhtml);

        }
    });
}

checkNotif();


function readNotif(a) {
    $.ajax({
        type: "POST",
        url: $("#BaseUrl").val()+'notification/read',
        dataType: "JSON",
        data: {
            data: a,
        },
        success: function(data) {
            checkNotif();
        }
    })
    console.log(a)
    
}
