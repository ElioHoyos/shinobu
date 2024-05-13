;window.CloudflareApps = window.Eager = window.CloudflareApps || window.Eager || {};
window.CloudflareApps = window.CloudflareApps || {};
CloudflareApps.siteId = "2c8306cf103ab32d0b93e98a2e5b859d";
CloudflareApps.installs = CloudflareApps.installs || {};
;(function() {
    'use strict'
    CloudflareApps.internal = CloudflareApps.internal || {}
    var errors = []
    CloudflareApps.internal.placementErrors = errors
    var errorHashes = {}
    function noteError(options) {
        var hash = options.selector + '::' + options.type + '::' + (options.installId || '')
        if (errorHashes[hash]) {
            return
        }
        errorHashes[hash] = true
        errors.push(options)
    }
    var initializedSelectors = {}
    var currentInit = false
    CloudflareApps.internal.markSelectors = function markSelectors() {
        if (!currentInit) {
            check()
            currentInit = true
            setTimeout(function() {
                currentInit = false
            })
        }
    }
    function check() {
        var installs = window.CloudflareApps.installs
        for (var installId in installs) {
            if (!installs.hasOwnProperty(installId)) {
                continue
            }
            var selectors = installs[installId].selectors
            if (!selectors) {
                continue
            }
            for (var key in selectors) {
                if (!selectors.hasOwnProperty(key)) {
                    continue
                }
                var hash = installId + '::' + key
                if (initializedSelectors[hash]) {
                    continue
                }
                var els = document.querySelectorAll(selectors[key])
                if (els && els.length > 1) {
                    noteError({
                        type: 'init:too-many',
                        option: key,
                        selector: selectors[key],
                        installId: installId
                    })
                    initializedSelectors[hash] = true
                    continue
                } else if (!els || !els.length) {
                    continue
                }
                initializedSelectors[hash] = true
                els[0].setAttribute('cfapps-selector', selectors[key])
            }
        }
    }
    CloudflareApps.querySelector = function querySelector(selector) {
        if (selector === 'body' || selector === 'head') {
            return document[selector]
        }
        CloudflareApps.internal.markSelectors()
        var els = document.querySelectorAll('[cfapps-selector="' + selector + '"]')
        if (!els || !els.length) {
            noteError({
                type: 'select:not-found:by-attribute',
                selector: selector
            })
            els = document.querySelectorAll(selector)
            if (!els || !els.length) {
                noteError({
                    type: 'select:not-found:by-query',
                    selector: selector
                })
                return null
            } else if (els.length > 1) {
                noteError({
                    type: 'select:too-many:by-query',
                    selector: selector
                })
            }
            return els[0]
        }
        if (els.length > 1) {
            noteError({
                type: 'select:too-many:by-attribute',
                selector: selector
            })
        }
        return els[0]
    }
}());
(function() {
    'use strict'
    var prevEls = {}
    CloudflareApps.createElement = function createElement(options, prevEl) {
        options = options || {}
        CloudflareApps.internal.markSelectors()
        try {
            if (prevEl && prevEl.parentNode) {
                var replacedEl
                if (prevEl.cfAppsElementId) {
                    replacedEl = prevEls[prevEl.cfAppsElementId]
                }
                if (replacedEl) {
                    prevEl.parentNode.replaceChild(replacedEl, prevEl)
                    delete prevEls[prevEl.cfAppsElementId]
                } else {
                    prevEl.parentNode.removeChild(prevEl)
                }
            }
            var element = document.createElement('cloudflare-app')
            var container
            if (options.pages && options.pages.URLPatterns && !CloudflareApps.matchPage(options.pages.URLPatterns)) {
                return element
            }
            try {
                container = CloudflareApps.querySelector(options.selector)
            } catch (e) {}
            if (!container) {
                return element
            }
            if (!container.parentNode && (options.method === 'after' || options.method === 'before' || options.method === 'replace')) {
                return element
            }
            if (container === document.body) {
                if (options.method === 'after') {
                    options.method = 'append'
                } else if (options.method === 'before') {
                    options.method = 'prepend'
                }
            }
            switch (options.method) {
            case 'prepend':
                if (container.firstChild) {
                    container.insertBefore(element, container.firstChild)
                    break
                }
            case 'append':
                container.appendChild(element)
                break
            case 'after':
                if (container.nextSibling) {
                    container.parentNode.insertBefore(element, container.nextSibling)
                } else {
                    container.parentNode.appendChild(element)
                }
                break
            case 'before':
                container.parentNode.insertBefore(element, container)
                break
            case 'replace':
                try {
                    var id = element.cfAppsElementId = Math.random().toString(36)
                    prevEls[id] = container
                } catch (e) {}
                container.parentNode.replaceChild(element, container)
            }
            return element
        } catch (e) {
            if (typeof console !== 'undefined' && typeof console.error !== 'undefined') {
                console.error('Error creating Cloudflare Apps element', e)
            }
        }
    }
}());
(function() {
    'use strict'
    CloudflareApps.matchPage = function matchPage(patterns) {
        if (!patterns || !patterns.length) {
            return true
        }
        var loc = document.location.host + document.location.pathname
        if (window.CloudflareApps && CloudflareApps.proxy && CloudflareApps.proxy.originalURL) {
            var url = CloudflareApps.proxy.originalURL.parsed
            loc = url.host + url.path
        }
        for (var i = 0; i < patterns.length; i++) {
            var re = new RegExp(patterns[i],'i')
            if (re.test(loc)) {
                return true
            }
        }
        return false
    }
}());
CloudflareApps.installs["cJmejr2IRVSC"] = {
    appId: "lMxPPXVOqmoE",
    scope: {}
};
;CloudflareApps.installs["cJmejr2IRVSC"].options = {
    "id": "UA-109137088-1",
    "social": false
};
;CloudflareApps.installs["cJmejr2IRVSC"].URLPatterns = ["^actly.splash.html.themeforest.createit.pl/?.*$", "^blackangus.html.themeforest.createit.pl/?.*$", "^blackangus.wp.themeforest.createit.pl/?.*$", "^blogly.themeforest.createit.pl/?.*$", "^booze.html.themeforest.createit.pl/?.*$", "^boston.gallery2.ghost.themeforest.createit.pl/?.*$", "^boston.ghost.themeforest.createit.pl/?.*$", "^boston.html.themeforest.createit.pl/?.*$", "^boston.slogan.ghost.themeforest.createit.pl/?.*$", "^boston.splash.ghost.themeforest.createit.pl/?.*$", "^boston.splash.html.themeforest.createit.pl/?.*$", "^boston.video.ghost.themeforest.createit.pl/?.*$", "^boston.wp.themeforest.createit.pl/?.*$", "^brick.html.themeforest.createit.pl/?.*$", "^brick.wp.themeforest.createit.pl/?.*$", "^catalogmode.createit.pl/?.*$", "^charlotte.createit.pl/?.*$", "^charlotte.html.createit.pl/?.*$", "^club.html.themeforest.createit.pl/?.*$", "^confetti.html.themeforest.createit.pl/?.*$", "^corpress.html.themeforest.createit.pl/?.*$", "^corpress.splash.html.themeforest.createit.pl/?.*$", "^corpress.splash.wp.themeforest.createit.pl/?.*$", "^corpress.wp.themeforest.createit.pl/?.*$", "^creative.elysium.wp.themeforest.createit.pl/?.*$", "^cupcake.html.themeforest.createit.pl/?.*$", "^cupcake.wp.themeforest.createit.pl/?.*$", "^dark.orlando.wp.themeforest.createit.pl/?.*$", "^darkonepager.orlando.wp.themeforest.createit.pl/?.*$", "^daycare.createit.pl/?.*$", "^daycare.html.createit.pl/?.*$", "^daycare.html.themeforest.createit.pl/?.*$", "^daycare.splash.createit.pl/?.*$", "^decima.createit.pl/?.*$", "^decima.html.createit.pl/?.*$", "^delimondo.wp.themeforest.createit.pl/?.*$", "^delimondo2.html.themeforest.createit.pl/?.*$", "^delimondo2.splash.themeforest.createit.pl/?.*$", "^delimondo2.themeforest.createit.pl/?.*$", "^diana.html.createit.pl/?.*$", "^dish.html.themeforest.createit.pl/?.*$", "^dish.wp.themeforest.createit.pl/?.*$", "^disrupt.createit.pl/?.*$", "^disrupt.html.createit.pl/?.*$", "^disrupt.splash.html.createit.pl/?.*$", "^dojo.html.themeforest.createit.pl/?.*$", "^dojo.splash.html.themeforest.createit.pl/?.*$", "^elysium.html.themeforest.createit.pl/?.*$", "^elysium.splash.wp.themeforest.createit.pl/?.*$", "^elysium.wp.themeforest.createit.pl/?.*$", "^estato.html.themeforest.createit.pl/?.*$", "^estato.wp.themeforest.createit.pl/?.*$", "^exico.html.themeforest.createit.pl/?.*$", "^exico.splash.html.themeforest.createit.pl/?.*$", "^farmfresh.createit.pl/?.*$", "^farmfresh.splash.createit.pl/?.*$", "^farmfresh.splash.html.createit.pl/?.*$", "^fishtank.html.createit.pl/?.*$", "^fishtank.splash.html.createit.pl/?.*$", "^foodtruck.html.themeforest.createit.pl/?.*$", "^foodtruck.multi.wp.themeforest.createit.pl/?.*$", "^foodtruck.splash.html.themeforest.createit.pl/?.*$", "^foodtruck.splash.wp.themeforest.createit.pl/?.*$", "^foodtruck.test.html.themeforest.createit.pl/?.*$", "^foodtruck.wp.themeforest.createit.pl/?.*$", "^fullslider.boston.wp.themeforest.createit.pl/?.*$", "^fullslider2.boston.wp.themeforest.createit.pl/?.*$", "^fullslider3.boston.wp.themeforest.createit.pl/?.*$", "^funfetti.themeforest.createit.pl/?.*$", "^houses.html.createit.pl/?.*$", "^houses.splash.html.createit.pl/?.*$", "^invia.html.themeforest.createit.pl/?.*$", "^invia.wp.themeforest.createit.pl/?.*$", "^invious.html.themeforest.createit.pl/?.*$", "^invious.splash.html.themeforest.createit.pl/?.*$", "^invision.html.themeforest.createit.pl/?.*$", "^invision.wp.themeforest.createit.pl/?.*$", "^jugas.html.themeforest.createit.pl/?.*$", "^jugas.tumblr.themeforest.createit.pl/?.*$", "^lecanard.html.themeforest.createit.pl/?.*$", "^lecanard.wp.themeforest.createit.pl/?.*$", "^looksgood.html.createit.pl/?.*$", "^macaroon.createit.pl/?.*$", "^macaroon.html.createit.pl/?.*$", "^macaroon.splash.createit.pl/?.*$", "^macaroon.splash.html.createit.pl/?.*$", "^master.html.themeforest.createit.pl/?.*$", "^memoria.createit.pl/?.*$", "^memoria.html.themeforest.createit.pl/?.*$", "^memoria.splash.html.themeforest.createit.pl/?.*$", "^memoria.themeforest.createit.pl/?.*$", "^nonus.createit.pl/?.*$", "^nonus.html.createit.pl/?.*$", "^nonus.single.createit.pl/?.*$", "^nonus.splash.createit.pl/?.*$", "^octavus.createit.pl/?.*$", "^octavus.html.createit.pl/?.*$", "^onepager.elysium.wp.themeforest.createit.pl/?.*$", "^onepager.orlando.wp.themeforest.createit.pl/?.*$", "^onepagercreative.elysium.wp.themeforest.createit.pl/?.*$", "^onestep.html.createit.pl/?.*$", "^optimus-prime.createit.pl/?.*$", "^orlando.dark.wp.themeforest.createit.pl/?.*$", "^orlando.html.themeforest.createit.pl/?.*$", "^orlando.splash.wp.themeforest.createit.pl/?.*$", "^orlando.tumblr.themeforest.createit.pl/?.*$", "^orlando.wp.themeforest.createit.pl/?.*$", "^panacea.html.themeforest.createit.pl/?.*$", "^panacea.single.wp.themeforest.createit.pl/?.*$", "^panacea.splash.wp.themeforest.createit.pl/?.*$", "^panacea.wp.themeforest.createit.pl/?.*$", "^parallax2.boston.wp.themeforest.createit.pl/?.*$", "^petlovers.createit.pl/?.*$", "^petlovers.splash.createit.pl/?.*$", "^pizza.html.themeforest.createit.pl/?.*$", "^pizza.wp.themeforest.createit.pl/?.*$", "^pluto.html.createit.pl/?.*$", "^pluto.splash.createit.pl/?.*$", "^pluto.splash.html.createit.pl/?.*$", "^quartum.createit.pl/?.*$", "^quartum.html.createit.pl/?.*$", "^rentica.html.themeforest.createit.pl/?.*$", "^revolution.boston.wp.themeforest.createit.pl/?.*$", "^revolution2.boston.wp.themeforest.createit.pl/?.*$", "^rota.html.createit.pl/?.*$", "^scrolla.html.themeforest.createit.pl/?.*$", "^seafresh.html.themeforest.createit.pl/?.*$", "^seafresh.wp.themeforest.createit.pl/?.*$", "^secundo.createit.pl/?.*$", "^secundo.html.createit.pl/?.*$", "^sella.html.createit.pl/?.*$", "^sella.splash.html.createit.pl/?.*$", "^septimus.createit.pl/?.*$", "^septimus.html.createit.pl/?.*$", "^sextus.html.createit.pl/?.*$", "^shoplocator.createit.pl/?.*$", "^shot.html.themeplayers.createit.pl/?.*$", "^shot.splash.html.createit.pl/?.*$", "^simpl.html.themeforest.createit.pl/?.*$", "^simpl.splash.wp.themeforest.createit.pl/?.*$", "^simpl.wp.dark.single.themeforest.createit.pl/?.*$", "^simpl.wp.dark.themeforest.createit.pl/?.*$", "^simpl.wp.mobile.dark.themeforest.createit.pl/?.*$", "^simpl.wp.mobile.light.themeforest.createit.pl/?.*$", "^simpl.wp.single.themeforest.createit.pl/?.*$", "^simpl.wp.themeforest.createit.pl/?.*$", "^single.pluto.createit.pl/?.*$", "^siver.themeforest.createit.pl/?.*$", "^sizeguide.createit.pl/?.*$", "^slogan.boston.wp.themeforest.createit.pl/?.*$", "^splash.boston.wp.themeforest.createit.pl/?.*$", "^sporta.html.themeforest.createit.pl/?.*$", "^tourstickets.html.createit.pl/?.*$", "^uacademy.html.themeforest.createit.pl/?.*$", "^uacademy.splash.html.themeforest.createit.pl/?.*$", "^ursus-polaris.html.createit.pl/?.*$", "^video.boston.wp.themeforest.createit.pl/?.*$", "^waitlist.codecanyon.themeforest.createit.pl/?.*$", "^waitlist.createit.pl/?.*$", "^woo.pluto.createit.pl/?.*$", "^you.createit.pl/?.*$", "^you.html.createit.pl/?.*$", "^you.splash.createit.pl/?.*$", "^youthhostel.html.createit.pl/?.*$"];
;if (CloudflareApps.matchPage(CloudflareApps.installs['cJmejr2IRVSC'].URLPatterns)) {
    (function() {
        var options = CloudflareApps.installs['cJmejr2IRVSC'].options
        var id
        if (options.account && options.organization) {
            id = options['web-properties-for-' + options.organization]
        } else {
            id = (options.id || '').trim()
        }
        if (!id) {
            console.log('Cloudflare Google Analytics: Disabled. UA-ID not present.')
            return
        } else if ("cJmejr2IRVSC" === 'preview') {
            console.log('Cloudflare Google Analytics: Enabled', id)
        }
        function resolveParameter(uri, parameter) {
            if (uri) {
                var parameters = uri.split('#')[0].match(/[^?=&]+=([^&]*)?/g)
                for (var i = 0, chunk; chunk = parameters[i]; ++i) {
                    if (chunk.indexOf(parameter) === 0) {
                        return unescape(chunk.split('=')[1])
                    }
                }
            }
        }
        window.dataLayer = window.dataLayer || []
        function gtag() {
            window.dataLayer.push(arguments)
        }
        gtag('js', new Date())
        gtag('config', id)
        var vendorScript = document.createElement('script')
        vendorScript.src = 'https://www.googletagmanager.com/gtag/js?id=' + id
        document.head.appendChild(vendorScript)
        if (options.social) {
            window.addEventListener('load', function googleAnalyticsSocialTracking() {
                var FB = window.FB
                var twttr = window.twttr
                if ('FB'in window && 'Event'in FB && 'subscribe'in window.FB.Event) {
                    FB.Event.subscribe('edge.create', function(targetUrl) {
                        gtag('event', 'share', {
                            method: 'facebook',
                            event_action: 'like',
                            content_id: targetUrl
                        })
                    })
                    FB.Event.subscribe('edge.remove', function(targetUrl) {
                        gtag('event', 'share', {
                            method: 'facebook',
                            event_action: 'unlike',
                            content_id: targetUrl
                        })
                    })
                    FB.Event.subscribe('message.send', function(targetUrl) {
                        gtag('event', 'share', {
                            method: 'facebook',
                            event_action: 'send',
                            content_id: targetUrl
                        })
                    })
                }
                if ('twttr'in window && 'events'in twttr && 'bind'in twttr.events) {
                    twttr.events.bind('tweet', function(event) {
                        if (event) {
                            var targetUrl
                            if (event.target && event.target.nodeName === 'IFRAME') {
                                targetUrl = resolveParameter(event.target.src, 'url')
                            }
                            gtag('event', 'share', {
                                method: 'twitter',
                                event_action: 'tweet',
                                content_id: targetUrl
                            })
                        }
                    })
                }
            }, false)
        }
    }())
}
