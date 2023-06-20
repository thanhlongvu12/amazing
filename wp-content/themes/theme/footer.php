<?php $uri=get_template_directory_uri();?>
<?php wp_footer(); ?>
<footer>
    <div class="traveltour-footer-wrapper ">
        <div class="traveltour-footer-container traveltour-container clearfix">
            <div class="traveltour-footer-column traveltour-item-pdlr traveltour-column-15">
                <div id="text-1" class="widget widget_text traveltour-widget">
                    <div class="textwidget">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top" style="padding-bottom: 5px ;">
                            <div class="gdlr-core-title-item-title-wrap ">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 17px ;text-transform: none ;color: #f97150 ;">
                                    Call Us<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                        <i class="icon_phone" style="font-size: 17px ;color: #ffffff ;margin-right: 8px ;"></i>
                        <span style="font-size: 18px; color: #fff;"><?= get_field('phone', 'option');?></span>
                        <span class="gdlr-core-space-shortcode" style="margin-top: 22px ;"></span>
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top" style="padding-bottom: 5px ;">
                            <div class="gdlr-core-title-item-title-wrap ">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 17px ;text-transform: none ;color: #f97150 ;">
                                    Email<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                        <span style="font-size: 18px; color: #fff;">
                            <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b9f8cad2f9cdcbd8cfdcd5cdd6cccbcdd1dcd4dc97dad6d4"><?= get_field('email', 'option');?></a>
                        </span>
                        <div class="feedback" style="background-color: #ffa003; padding: 10px 0px; display: flex; justify-content: center ">
                            <a href="<?= get_permalink(getIdPage('feedback')); ?>" style="">Feedback</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="traveltour-footer-column traveltour-item-pdlr traveltour-column-15">
                <div id="gdlr-core-custom-menu-widget-2" class="widget widget_gdlr-core-custom-menu-widget traveltour-widget">
                    <h3 class="traveltour-widget-title">
                        <span class="traveltour-widget-head-text">About Us</span>
                    </h3>
                    <span class="clear"></span>
                    <div class="menu-about-us-container">
                        <ul id="menu-about-us" class="gdlr-core-custom-menu-widget gdlr-core-menu-style-plain">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5361">
                                <a href="https://demo.goodlayers.com/traveltour/main4/about-us/">Our Story</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5363">
                                <a href="https://demo.goodlayers.com/traveltour/main4/blog-3-columns/">Travel Blog &#038;Tips</a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5364">
                                <a href="#">Working With Us</a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5365">
                                <a href="#">Be Our Partner</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="traveltour-footer-column traveltour-item-pdlr traveltour-column-15">
                <div id="gdlr-core-custom-menu-widget-3" class="widget widget_gdlr-core-custom-menu-widget traveltour-widget">
                    <h3 class="traveltour-widget-title">
                        <span class="traveltour-widget-head-text">Support</span>
                    </h3>
                    <span class="clear"></span>
                    <div class="menu-support-container">
                        <ul id="menu-support" class="gdlr-core-custom-menu-widget gdlr-core-menu-style-plain">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5368">
                                <a href="#">Customer Support</a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5367">
                                <a href="#">Privacy &#038;Policy</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5366">
                                <a href="https://demo.goodlayers.com/traveltour/main4/contact/">Contact Channels</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="traveltour-footer-column traveltour-item-pdlr traveltour-column-15">
                <div id="text-15" class="widget widget_text traveltour-widget">
                    <h3 class="traveltour-widget-title">
                        <span class="traveltour-widget-head-text">Pay Safely With Us</span>
                    </h3>
                    <span class="clear"></span>
                    <div class="textwidget">
                        <p>
                            The payment is encrypted and transmitted securely with an SSL protocol.<br/>
                            <img decoding="async" loading="lazy" class="alignnone size-full wp-image-5360" src="https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2019/04/creditcard-logo.png" alt="" width="254" height="47"/>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="traveltour-copyright-wrapper ">
        <div class="traveltour-copyright-container traveltour-container clearfix">
            <div class="traveltour-copyright-left traveltour-item-pdlr">© 2019 Travel Tour  All Rights Reserved.</div>
            <div class="traveltour-copyright-right traveltour-item-pdlr">
                Follow Us On
                <a href="#" target="_blank">
                    <i class="fa fa-facebook" style="font-size: 14px ;color: #ffffff ;margin-left: 12px ;margin-right: 10px ;"></i>
                </a>
                <a href="#" target="_blank">
                    <i class="fa fa-twitter" style="font-size: 14px ;color: #ffffff ;margin-right: 10px ;"></i>
                </a>
                <a href="#" target="_blank">
                    <i class="fa fa-linkedin" style="font-size: 14px ;color: #ffffff ;margin-right: 10px ;"></i>
                </a>
                <a href="#" target="_blank">
                    <i class="fa fa-pinterest-p" style="font-size: 14px ;color: #ffffff ;margin-right: 10px ;"></i>
                </a>
                <a href="#" target="_blank">
                    <i class="fa fa-vimeo" style="font-size: 14px ;color: #ffffff ;margin-right: 10px ;"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<style>
    @media only screen and (max-width: 767px) {
        #gdlr-core-wrapper-1.gdlr-core-pbf-wrapper {
            padding-top: 90px !important;
            padding-bottom: 90px !important;
        }
    }

    @media only screen and (max-width: 767px) {
        #gdlr-core-column-30476 .gdlr-core-pbf-column-content-margin {
            padding-top: 300px !important;
        }
    }
</style>
<div class="tourmaster-lightbox-content-wrap tourmaster-style-1" data-tmlb-id="room-proceed-without-login">
    <div class="tourmaster-lightbox-head">
        <h3 class="tourmaster-lightbox-title">Proceed Booking</h3>
        <i class="tourmaster-lightbox-close icon_close"></i>
    </div>
    <div class="tourmaster-lightbox-content">
        <div class="tourmaster-login-form2-wrap clearfix">
            <form class="tourmaster-login-form2 tourmaster-form-field tourmaster-with-border" method="post" action="https://demo.goodlayers.com/traveltour/main4/wp-login.php">
                <h3 class="tourmaster-login-title">Already A Member?</h3>
                <a class="tourmaster-button" href="https://demo.goodlayers.com/traveltour/main4/login/?redirect=payment">
                    <span class="tourmaster-text">Login</span>
                </a>
            </form>
            <div class="tourmaster-login2-right">
                <h3 class="tourmaster-login2-right-title">Don &#039;t have an account? Create one.</h3>
                <div class="tourmaster-login2-right-content">
                    <div class="tourmaster-login2-right-description">When you book with an account, you will be able to track your payment status, track the confirmation and you can also rate the tour after you finished the tour.</div>
                    <a class="tourmaster-button tourmaster-register-button" href="https://demo.goodlayers.com/traveltour/main4/register/?redirect=room-payment">Sign Up</a>
                </div>
                <h3 class="tourmaster-login2-right-title">Or Continue As Guest</h3>
                <a class="tourmaster-button tourmaster-continue-button" href="https://demo.goodlayers.com/traveltour/main4/?pt=room&type=booking&tourmaster-payment">Continue As Guest</a>
            </div>
        </div>
    </div>
</div>
<style id='rs-plugin-settings-inline-css' type='text/css'>
    #rs-demo-id {
    }
</style>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type='text/javascript' id='wc-add-to-cart-js-extra'>
    /* <![CDATA[ */
    var wc_add_to_cart_params = {
        "ajax_url": "\/traveltour\/main4\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/traveltour\/main4\/?wc-ajax=%%endpoint%%",
        "i18n_view_cart": "View cart",
        "cart_url": "https:\/\/demo.goodlayers.com\/traveltour\/main4\/cart-2\/",
        "is_cart": "",
        "cart_redirect_after_add": "no"
    };
    /* ]]> */
</script>
<script type='text/javascript' id='woocommerce-js-extra'>
    /* <![CDATA[ */
    var woocommerce_params = {
        "ajax_url": "\/traveltour\/main4\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/traveltour\/main4\/?wc-ajax=%%endpoint%%"
    };
    /* ]]> */
</script>
<script type='text/javascript' id='wc-cart-fragments-js-extra'>
    /* <![CDATA[ */
    var wc_cart_fragments_params = {
        "ajax_url": "\/traveltour\/main4\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/traveltour\/main4\/?wc-ajax=%%endpoint%%",
        "cart_hash_key": "wc_cart_hash_46684fddb51d4101f825433662f4dc2a",
        "fragment_name": "wc_fragments_46684fddb51d4101f825433662f4dc2a",
        "request_timeout": "5000"
    };
    /* ]]> */
</script>
<script type='text/javascript' id='rocket-browser-checker-js-after'>
    "use strict";
    var _createClass = function() {
        function defineProperties(target, props) {
            for (var i = 0; i < props.length; i++) {
                var descriptor = props[i];
                descriptor.enumerable = descriptor.enumerable || !1,
                    descriptor.configurable = !0,
                "value"in descriptor && (descriptor.writable = !0),
                    Object.defineProperty(target, descriptor.key, descriptor)
            }
        }
        return function(Constructor, protoProps, staticProps) {
            return protoProps && defineProperties(Constructor.prototype, protoProps),
            staticProps && defineProperties(Constructor, staticProps),
                Constructor
        }
    }();
    function _classCallCheck(instance, Constructor) {
        if (!(instance instanceof Constructor))
            throw new TypeError("Cannot call a class as a function")
    }
    var RocketBrowserCompatibilityChecker = function() {
        function RocketBrowserCompatibilityChecker(options) {
            _classCallCheck(this, RocketBrowserCompatibilityChecker),
                this.passiveSupported = !1,
                this._checkPassiveOption(this),
                this.options = !!this.passiveSupported && options
        }
        return _createClass(RocketBrowserCompatibilityChecker, [{
            key: "_checkPassiveOption",
            value: function(self) {
                try {
                    var options = {
                        get passive() {
                            return !(self.passiveSupported = !0)
                        }
                    };
                    window.addEventListener("test", null, options),
                        window.removeEventListener("test", null, options)
                } catch (err) {
                    self.passiveSupported = !1
                }
            }
        }, {
            key: "initRequestIdleCallback",
            value: function() {
                !1 in window && (window.requestIdleCallback = function(cb) {
                        var start = Date.now();
                        return setTimeout(function() {
                            cb({
                                didTimeout: !1,
                                timeRemaining: function() {
                                    return Math.max(0, 50 - (Date.now() - start))
                                }
                            })
                        }, 1)
                    }
                ),
                !1 in window && (window.cancelIdleCallback = function(id) {
                        return clearTimeout(id)
                    }
                )
            }
        }, {
            key: "isDataSaverModeOn",
            value: function() {
                return "connection"in navigator && !0 === navigator.connection.saveData
            }
        }, {
            key: "supportsLinkPrefetch",
            value: function() {
                var elem = document.createElement("link");
                return elem.relList && elem.relList.supports && elem.relList.supports("prefetch") && window.IntersectionObserver && "isIntersecting"in IntersectionObserverEntry.prototype
            }
        }, {
            key: "isSlowConnection",
            value: function() {
                return "connection"in navigator && "effectiveType"in navigator.connection && ("2g" === navigator.connection.effectiveType || "slow-2g" === navigator.connection.effectiveType)
            }
        }]),
            RocketBrowserCompatibilityChecker
    }();
</script>
<script type='text/javascript' id='rocket-preload-links-js-extra'>
    /* <![CDATA[ */
    var RocketPreloadLinksConfig = {
        "excludeUris": "\/traveltour\/main4(\/(?:.+\/)?feed(?:\/(?:.+\/?)?)?$|\/(?:.+\/)?embed\/|\/checkout-2\/|\/cart-2\/|\/my-account-2\/|\/wc-api\/v(.*)|\/(index\\.php\/)?(.*)wp\\-json(\/.*|$))|\/refer\/|\/go\/|\/recommend\/|\/recommends\/",
        "usesTrailingSlash": "1",
        "imageExt": "jpg|jpeg|gif|png|tiff|bmp|webp|avif|pdf|doc|docx|xls|xlsx|php",
        "fileExt": "jpg|jpeg|gif|png|tiff|bmp|webp|avif|pdf|doc|docx|xls|xlsx|php|html|htm",
        "siteUrl": "https:\/\/demo.goodlayers.com\/traveltour\/main4",
        "onHoverDelay": "100",
        "rateThrottle": "3"
    };
    /* ]]> */
</script>
<script type='text/javascript' id='rocket-preload-links-js-after'>
    (function() {
        "use strict";
        var r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                return typeof e
            }
            : function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            }
            , e = function() {
            function i(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1,
                        i.configurable = !0,
                    "value"in i && (i.writable = !0),
                        Object.defineProperty(e, i.key, i)
                }
            }
            return function(e, t, n) {
                return t && i(e.prototype, t),
                n && i(e, n),
                    e
            }
        }();
        function i(e, t) {
            if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function")
        }
        var t = function() {
            function n(e, t) {
                i(this, n),
                    this.browser = e,
                    this.config = t,
                    this.options = this.browser.options,
                    this.prefetched = new Set,
                    this.eventTime = null,
                    this.threshold = 1111,
                    this.numOnHover = 0
            }
            return e(n, [{
                key: "init",
                value: function() {
                    !this.browser.supportsLinkPrefetch() || this.browser.isDataSaverModeOn() || this.browser.isSlowConnection() || (this.regex = {
                        excludeUris: RegExp(this.config.excludeUris, "i"),
                        images: RegExp(".(" + this.config.imageExt + ")$", "i"),
                        fileExt: RegExp(".(" + this.config.fileExt + ")$", "i")
                    },
                        this._initListeners(this))
                }
            }, {
                key: "_initListeners",
                value: function(e) {
                    -1 < this.config.onHoverDelay && document.addEventListener("mouseover", e.listener.bind(e), e.listenerOptions),
                        document.addEventListener("mousedown", e.listener.bind(e), e.listenerOptions),
                        document.addEventListener("touchstart", e.listener.bind(e), e.listenerOptions)
                }
            }, {
                key: "listener",
                value: function(e) {
                    var t = e.target.closest("a")
                        , n = this._prepareUrl(t);
                    if (null !== n)
                        switch (e.type) {
                            case "mousedown":
                            case "touchstart":
                                this._addPrefetchLink(n);
                                break;
                            case "mouseover":
                                this._earlyPrefetch(t, n, "mouseout")
                        }
                }
            }, {
                key: "_earlyPrefetch",
                value: function(t, e, n) {
                    var i = this
                        , r = setTimeout(function() {
                        if (r = null,
                        0 === i.numOnHover)
                            setTimeout(function() {
                                return i.numOnHover = 0
                            }, 1e3);
                        else if (i.numOnHover > i.config.rateThrottle)
                            return;
                        i.numOnHover++,
                            i._addPrefetchLink(e)
                    }, this.config.onHoverDelay);
                    t.addEventListener(n, function e() {
                        t.removeEventListener(n, e, {
                            passive: !0
                        }),
                        null !== r && (clearTimeout(r),
                            r = null)
                    }, {
                        passive: !0
                    })
                }
            }, {
                key: "_addPrefetchLink",
                value: function(i) {
                    return this.prefetched.add(i.href),
                        new Promise(function(e, t) {
                                var n = document.createElement("link");
                                n.rel = "prefetch",
                                    n.href = i.href,
                                    n.onload = e,
                                    n.onerror = t,
                                    document.head.appendChild(n)
                            }
                        ).catch(function() {})
                }
            }, {
                key: "_prepareUrl",
                value: function(e) {
                    if (null === e || "object" !== (void 0 === e ? "undefined" : r(e)) || !1 in e || -1 === ["http:", "https:"].indexOf(e.protocol))
                        return null;
                    var t = e.href.substring(0, this.config.siteUrl.length)
                        , n = this._getPathname(e.href, t)
                        , i = {
                        original: e.href,
                        protocol: e.protocol,
                        origin: t,
                        pathname: n,
                        href: t + n
                    };
                    return this._isLinkOk(i) ? i : null
                }
            }, {
                key: "_getPathname",
                value: function(e, t) {
                    var n = t ? e.substring(this.config.siteUrl.length) : e;
                    return n.startsWith("/") || (n = "/" + n),
                        this._shouldAddTrailingSlash(n) ? n + "/" : n
                }
            }, {
                key: "_shouldAddTrailingSlash",
                value: function(e) {
                    return this.config.usesTrailingSlash && !e.endsWith("/") && !this.regex.fileExt.test(e)
                }
            }, {
                key: "_isLinkOk",
                value: function(e) {
                    return null !== e && "object" === (void 0 === e ? "undefined" : r(e)) && (!this.prefetched.has(e.href) && e.origin === this.config.siteUrl && -1 === e.href.indexOf("?") && -1 === e.href.indexOf("#") && !this.regex.excludeUris.test(e.href) && !this.regex.images.test(e.href))
                }
            }], [{
                key: "run",
                value: function() {
                    "undefined" != typeof RocketPreloadLinksConfig && new n(new RocketBrowserCompatibilityChecker({
                        capture: !0,
                        passive: !0
                    }),RocketPreloadLinksConfig).init()
                }
            }]),
                n
        }();
        t.run();
    }());
</script>
<script type='text/javascript' src='https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/plugins/wp-google-map-plugin/assets/js/maps.js?ver=6.2' id='wpgmp-google-map-main-js' defer></script>
<script type='text/javascript' src='https://maps.google.com/maps/api/js?key=AIzaSyD733KCcfQFGTp5SjZ5P9nvUKl6Ir4fYPo&#038;callback=initwpmaps&#038;libraries=geometry%2Cplaces%2Cdrawing&#038;language=en&#038;ver=6.2' id='wpgmp-google-api-js' defer></script>
<!-- <script src="https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/cache/min/1/fe5bb66e873d65d8a97322233cf7255f.js" data-minify="1" defer></script> -->
<script src="<?= $uri?>/assets/fontawesome-free-6.4.0-web/js/all.js" data-minify="1" defer></script>
<script src="<?= $uri?>/js/customizer.js"></script>
<!-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7c67e2804d822102","version":"2023.4.0","r":1,"token":"9247582a97cd45c0b9f0c15195583f49","si":100}' crossorigin="anonymous"></script> -->
<script defer src="<?= $uri?>assets/js/beacon.min.js" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7c67e2804d822102","version":"2023.4.0","r":1,"token":"9247582a97cd45c0b9f0c15195583f49","si":100}' crossorigin="anonymous"></script>
<!--<script src="--><?//= $uri?><!--/js/jquery.validate.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<!--<script>-->
<!--    $('#signinForm').validate({-->
<!--        rules: {-->
<!--            emailSignin: {-->
<!--                required: true,-->
<!--                email: true-->
<!--            },-->
<!--            passwordSignin: {-->
<!--                required: true,-->
<!--                minlength: 5,-->
<!--                maxlength: 20,-->
<!--            },-->
<!--        },-->
<!--        messages: {-->
<!--            emailSignin: {-->
<!--                required: 'Email is required!',-->
<!--                email: 'Email is not valid!'-->
<!--            },-->
<!--            passwordSignin: {-->
<!--                required: 'Password is required!',-->
<!--                minlength: 'Please enter at least 5 characters!',-->
<!--                maxlength: 'Please enter no more than 20 characters!'-->
<!--            }-->
<!--        },-->
<!--        submitHandler: function(form) {-->
<!--            let site_key = $("#site_key").val();-->
<!--            let ajaxUrl = $('#ajaxUrl').val();-->
<!--            var emailSignin = document.getElementsByName('emailSignin')[0].value;-->
<!--            var passwordSignin = document.getElementsByName('passwordSignin')[0].value;-->
<!--            var rememberSignin = document.getElementById('rememberLogin').checked;-->
<!--            grecaptcha.ready(function() {-->
<!--                grecaptcha.execute(site_key, {action: 'signin_capcha'}).then(function(token) {-->
<!--                    $.ajax({-->
<!--                        type: 'post',-->
<!--                        dataType: 'json',-->
<!--                        url: ajaxUrl,-->
<!--                        data: {-->
<!--                            action: 'signin',-->
<!--                            email: emailSignin,-->
<!--                            password: passwordSignin,-->
<!--                            remember: rememberSignin,-->
<!--                            action1: 'signin_capcha',-->
<!--                            token1: token-->
<!--                        },-->
<!--                        beforeSend:function () {-->
<!--                            $('.divgif').show();-->
<!--                        },-->
<!--                        success: function(response) {-->
<!--                            $('.divgif').hide();-->
<!--                            Swal.fire({-->
<!--                                icon: response.status,-->
<!--                                text: response.message,-->
<!--                            });-->
<!--                            if(response.status == 'success') {-->
<!--                                window.location.reload();-->
<!--                            }-->
<!--                        }-->
<!--                    });-->
<!--                    return false;-->
<!--                });-->
<!--            });-->
<!--        }-->
<!--    });-->
<!---->
<!--    // jQuery.validator.addMethod("specialCharacter", function(value, element) {-->
<!--    //     return this.optional(element) || !(/[~`!@#$%^&*()_+='"?.>,{}<,:;]/.test(value));-->
<!--    // }, "Username contains only uppercase, lowercase and numbers");-->
<!--    jQuery.validator.addMethod("alphanumeric", function(value, element) {-->
<!--        return this.optional(element) || (/^[a-zA-Z0-9_.,]+$/.test(value));-->
<!--    }, "Username contains only uppercase, lowercase and numbers");-->
<!--</script>-->
<script src="<?= $uri?>/assets/js/main.js" data-minify="1" defer></script>

</body>
</html>