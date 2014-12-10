function showForm() {
    document.getElementById('loginForm').style.display = "block";
}

function hideForm() {
    document.getElementById('loginForm').style.display = "none";
}

function loginActive() {
    document.getElementById('login').style.backgroundColor = "#a90000";
}

function loginInactive() {
    document.getElementById('login').style.background = "none";
}

function toggle() {
    var ele = document.getElementById("loginForm");

    if (ele.style.display == "block") {
        ele.style.display = "none";
        loginInactive();
    }
    else {
        ele.style.display = "block";
        loginActive();
    }
}

window.onload = function() {
    function getScrollTop() {
        if (typeof window.pageYOffset !== 'undefined') {
            return window.pageYOffset;
        }

        var d = document.documentElement;
        if (d.clientHeight) {
            return d.scrollTop;
        }

        return document.body.scrollTop;
    }

    window.onscroll = function() {
        var nav = document.getElementById('navBar'),
            scroll = getScrollTop();
        var form = document.getElementById('loginForm'),
            scroll = getScrollTop();

        if (scroll <= 100) {
            nav.style.position = "absolute";
            nav.style.top = "100px";
            form.style.position = "absolute";
            form.style.top = "166px";
        }
        else {
            nav.style.position = "fixed";
            nav.style.top = "0";
            form.style.position = "fixed";
            form.style.top = "66px";
        }
    };
};