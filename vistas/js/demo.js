jQuery(document).ready(function ($) {
    var $chooser = jQuery("#stylechooser");
    var $container = jQuery("#slideContainer")
    var $body = jQuery('body');
    var isLoaded = false;
    var pathname = window.location.pathname;
    var themeName = 'ct_macaroon.' + pathname;
    $('head').append('<link rel="stylesheet" type="text/css" href="../demo/css/demo.css">');
    $('head').append('<link rel="stylesheet" type="text/css" href="../demo/generator.php">');
    if (getCookie(themeName + '.switcher') != 'show') {
        hideStyleswitcher();
    }
    jQuery("#stylechooser  #styleToggle").click(function () {
        setCookie('ct_macaroon.switcher', $chooser.css('left') == '0px' || $chooser.css('left') == '-1px' ? 'hide' : 'show');
        hideStyleswitcher();
        return false;
    });
    jQuery('#demoReset').click(function () {
        setCookie('ct_macaroon', false);
        location.reload(true);
        return false;
    });
    jQuery('#stylechooser [data-value]').click(function (event) {
        var a = jQuery(this);
        if (a.attr('data-dependent')) {
            jQuery(a.attr('data-dependent')).click();
        }
        var c = a.attr('data-value');
        var off = $body.hasClass(c) && !a.hasClass('btn');
        jQuery('[data-value]', a.parents('div.mkSpace')).each(function () {
            var t = jQuery(this).removeClass('demoActive btn-primary');
            $body.removeClass(t.attr('data-value'));
        });
        if (off) {
            $body.removeClass(c);
            a.removeClass('demoActive');
            a.removeAttr('checked');
            if (a.attr('data-clear-container-deselected') !== undefined) {
                jQuery(a.attr('data-clear-container-deselected')).find('.demoActive').toggleClass('demoActive');
            }
            store();
            if (isLoaded && a.attr('data-refresh')) {
                location.reload(true);
            }
            return false;
        }
        $body.addClass(c);
        if (a.hasClass('btn')) {
            a.addClass('btn-primary');
        } else {
            a.toggleClass('demoActive');
        }
        if (a.attr('type') == 'checkbox') {
            a.attr('checked', true);
        }
        store();
        if (isLoaded && a.attr('data-refresh')) {
            location.reload(true);
        }
        return false;
    });
    function store() {
        var r = '';
        jQuery('a[data-value].btn-primary, [data-value].demoActive', $chooser).each(function () {
            var a = jQuery(this);
            r = r + a.attr('data-value') + '.';
        });
        setCookie('ct_macaroon', r);
    }

    function load() {
        d = getCookie('ct_macaroon');
        if (d) {
            var data = jQuery(d.split('.'));
            jQuery.each(data, function (e, val) {
                $e = jQuery('[data-value="' + val + '"]', $chooser);
                $e.click();
            });
        }
        isLoaded = true;
    }

    function hideStyleswitcher() {
        var $switcher = jQuery("#stylechooser");
        if (jQuery("body").is(".navbar-sidebar")) {
            var right = -222;
            if (parseInt($switcher.css("right")) == right) {
                right = 0;
            }
            if (!isLoaded) {
                $switcher.css('right', right);
            } else {
                $switcher.animate({right: right});
            }
        } else {
            var left = -222;
            if (parseInt($switcher.css("left")) == left) {
                left = 0;
            }
            if (!isLoaded) {
                $switcher.css('left', left);
            } else {
                $switcher.animate({left: left});
            }
        }
    }

    load();
});
var setCookie = function (name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else {
        var expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
};
var getCookie = function (name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length, c.length);
        }
    }
    return null;
};
function selectDropdown() {
    if (getCookie('ct_macaroon.dropdown') != null) {
        jQuery('.navbar-nav').removeClass('ct-navbar--fadeIn');
        jQuery('.navbar-nav').removeClass(getCookie('ct_macaroon.dropdown'));
    } else {
        jQuery('.navbar-nav').removeClass('ct-navbar--fadeIn');
    }
    var e = document.getElementById("dropdownSelect");
    var strUser = e.options[e.selectedIndex].value;
    setCookie('ct_macaroon.dropdown', strUser);
    jQuery('.navbar-nav').addClass(strUser);
}