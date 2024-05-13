var $devicewidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
var $deviceheight = (window.innerHeight > 0) ? window.innerHeight : screen.height;

var $bodyel = jQuery("body");
var $htmlel = jQuery("html");

var $navbarel = jQuery(".navbar");
var $topbarel = jQuery(".ct-topBar");

var $slider = $('.ct-js-slick');

var $onePage = $(".ct-js-onepage");
var $onePagePosition = $onePage.position();
var $onePageWidth   = $onePage.width();

var isTransparent = false,
    navbar = $("nav.navbar");


if(navbar.hasClass('ct-navbar--transparent')){
    isTransparent = true;
}


/* ========================== */
/* ==== HELPER FUNCTIONS ==== */

function validatedata($attr, $defaultValue) {
    "use strict";
    if ($attr !== undefined) {
        return $attr
    }
    return $defaultValue;
}

function parseBoolean(str, $defaultValue) {
    "use strict";
    if (str == 'true') {
        return true;
    } else if (str == "false") {
        return false;
    }
    return $defaultValue;
}

function  alignRowHeight(contentName, rowName, itemName, desibleRes){
  "use strict";

  if(!desibleRes)
    desibleRes = 0;

  if($devicewidth < desibleRes)
    return;

  $("." + contentName).each(function(){
    var row = $(this).find("." + rowName);

    row.each(function(){
      var maxHeight = 0;

      var items = $(this).find("." + itemName);

      items.each(function(){
        var mHeight = $(this).css("height");

        if(parseInt(mHeight, 10) > maxHeight){
          maxHeight = mHeight;
        }
      });

      items.each(function(){
        $(this).css("height", maxHeight);
      });
    });
  });
}


(function ($) {
    "use strict";

    var $devicewidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    var $deviceheight = (window.innerHeight > 0) ? window.innerHeight : screen.height;
    var $bodyel = jQuery("body");
    var $navbarel = jQuery(".navbar");

    $(document).ready(function () {

        // Progress Bar // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        // $('.progress-bar').progressbar();

        if (jQuery().appear && jQuery("body").hasClass("cssAnimate")) {
            jQuery('.progress').appear(function () {
                var $this = jQuery(this);
                $this.each(function () {
                    var $innerbar = $this.find(".progress-bar");
                    var percentage = $innerbar.attr("data-percentage");
                    $innerbar.addClass("animating").css("width", percentage + "%");

                    $innerbar.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function () {
                        $innerbar.find(".pull-right").fadeIn(900);
                    });

                });
            }, {accY: -100});
        } else {
            jQuery('.progress').each(function () {
                var $this = jQuery(this);
                var $innerbar = $this.find(".progress-bar");
                var percentage = $innerbar.attr("data-percentage");
                $innerbar.addClass("animating").css("width", percentage + "%");

                $innerbar.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function () {
                    $innerbar.find(".pull-right").fadeIn(900);
                });

            });
        }


        // categories & archives


        if($('.ct-js-catArc').length){
            $('.ct-js-catArc').each(function(){
               var $li      = $(this).find(".widget-inner > ul > li"),
                   $innerLi = $li.find("ul li");

                $li.on("click", function(e){
                    e.preventDefault();

                    $li.each(function(){
                       $(this).removeClass("active");
                    });

                    $(this).addClass("active");

                    return false;
                });


                $innerLi.on("click", function(e){
                    e.preventDefault();

                    $innerLi.each(function(){
                        $(this).removeClass("active");
                    });

                    $(this).addClass("active");

                    return false;
                });
            });
        }


      //calendar


    if($('#calendar').length){
      $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '2015-02-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-01'
				},
				{
					title: 'Long Event',
					start: '2015-02-07',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					end: '2015-02-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-16T16:00:00'
				},
				{
					title: 'Conference',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-11',
					end: '2015-02-13'
				},
				{
					title: 'Meeting',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-12T10:30:00',
					end: '2015-02-12T12:30:00'
				},
				{
					title: 'Lunch',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-12T12:00:00'
				},
				{
					title: 'Meeting',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-12T14:30:00'
				},
				{
					title: 'Happy Hour',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-12T17:30:00'
				},
				{
					title: 'Dinner',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-12T20:00:00'
				},
				{
					title: 'Birthday Party',
                    url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://themeforest.net/item/dojo-martial-arts-html-template-/12839291?s_rank=2',
					start: '2015-02-28'
				}
			],

          eventClick: function(event) {
              if (event.url) {
                  window.open(event.url);
                  return false;
              }
          }
		});
    }



        $('.ct-js-btnScrollUp').on("click", function (e) {
            e.preventDefault();
            $("body,html").animate({scrollTop: 0}, 1200);
            $navbarel.find('.onepage').removeClass('active');
            $navbarel.find('.onepage:first-child').addClass('active');
            return false;
        });


        // Onepager Close on click

        var $mobileOnepager = $('.ct-menuMobile .ct-menuMobile-navbar .onepage');

        $mobileOnepager.on("click", function(e){
            return false;
        });
        $mobileOnepager.on("click", function(e){
            snapper.close();
            return false;
        });





      $(".ct-js-event-accordion").each(function(){
        $(this).find('.panel-body').unbind().on("click", function(ev){
          ev.preventDefault();

          var target = $( ev.target );

          console.log(target)

          if(target.is("a.btn") || target.is("a.btn span")){
            var link = target.closest(".btn");

            if(link.attr("href") !== "#" && link.attr("href") !== "" && link.attr("href") !== " ")
              var win = window.open(link.attr("href"), '_blank');
          }
          return false;
        });
      });


        if (jQuery.browser.mozilla){$htmlel.addClass('browser-mozilla') }
        if (jQuery.browser.webkit){$htmlel.addClass('browser-webkit') }
        if (jQuery.browser.msie){$htmlel.addClass('browser-msie') }
        if (jQuery.browser.safari){$htmlel.addClass('browser-safari') }


        //grayscale remove mobile


        if(device.mobile()){

            jQuery(".grayscale").each(function(){
               $(this).removeClass("grayscale");
            });
        }



      //$(".ct-js-formMap-container").each(function(){
      //  var $this = $(this),
      //  $formMapButton = $this.find(".ct-formMapButton a");
      //
      //
      //    $formMapButton.on("click", function(e){
      //        e.preventDefault();
      //
      //        if($this.hasClass("ct-showForm")){
      //            $this.removeClass("ct-showForm");
      //            $formMapButton.find("span").text("Show Form");
      //        }else{
      //            $formMapButton.find("span").text("Hide Form");
      //            $this.addClass("ct-showForm");
      //        }
      //
      //        return false;
      //    });
      // });



      // Ignore Slick // ---------------------------------

        $slider.attr('data-snap-ignore', 'true');


      //Placeholder


        if(!$htmlel.hasClass("ie8")){
            (function() {
                // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
                if (!String.prototype.trim) {
                    (function() {
                        // Make sure we trim BOM and NBSP
                        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                        String.prototype.trim = function() {
                            return this.replace(rtrim, '');
                        };
                    })();
                }


                [].slice.call( document.querySelectorAll( 'input, textarea' ) ).forEach( function( inputEl ) {
                    // in case the input is already filled..
                    if( inputEl.value.trim() !== '' ) {
                        classie.add( inputEl.parentNode, 'form-control--filled' );
                    }

                    // events:

                    if(inputEl.addEventListener){
                        inputEl.addEventListener( 'focus', onInputFocus );
                        inputEl.addEventListener( 'blur', onInputBlur );
                    }else{
                        inputEl.attachEvent('onfocus', onInputFocus);
                        inputEl.attachEvent('onblur', onInputBlur);
                    }



                } );

                function onInputFocus( ev ){
                    classie.add( ev.target.parentNode, 'form-control--filled' );
                }

                function onInputBlur( ev ){
                    if( ev.target.value.trim() === '' ) {
                        classie.remove( ev.target.parentNode, 'form-control--filled' );
                    }
                }
            })();
        }


        $(".ct-map").ShopLocator();

        $('.lightGallery').lightGallery({
            showThumbByDefault:false,
            addClass:'showThumbByDefault',
            enableTouch: true,
            enableDrag: true,
            loop:true
        });

        $('.lightGalleryVideo').lightGallery({
            showThumbByDefault:false,
            thumbnail:false,
            addClass:'localVideo'
        });


      $(".ct-js-embed").each(function(){
        var $this = $(this);
        var $overly = $this.find(".ct-personMedia-overly");
        var $media = $this.find("iframe").get(0);

        $this.find(".ct-personMedia-playButton").on("click", function(e){
          $overly.fadeOut(250);
          $media.src += "&autoplay=1";
          e.preventDefault();
        });
      });


      // PersonBox content show/hide


      jQuery(".ct-js-personBox").each(function(){
        var $this         = $(this),
            $button       = $this.find(".ct-js-btn");


        $button.on("click", function(e){
          e.preventDefault();
          jQuery(".ct-js-personBox").each(function(){
            $(this).removeClass("active");
          });

          $this.addClass("active");
          $this.find(".ct-personBox-body");
          return false;
        });
      });




      //================================================ Modal ==================================================

       var $modal = jQuery('.ct-modal');

      $modal.each(function(){
            var $this = jQuery(this);
            var $modalDialog = $this.find('.ct-modalDialog');
            var $modalContent = $modalDialog.find('.ct-modalContent');
            var $modalContentHeight = $modalContent.height();

            $modalDialog.css("height", $modalContentHeight + "px");

            if($deviceheight < $modalContentHeight){
                $modalDialog.css({
                    "position": "static",
                    "padding-top": "17px"
                })
            }
        });



      // TabSlick


      $(".ct-js-sliderTab").each(function(){

        var $con = $(this);
        var $slider = $con.find(".ct-sliderTab-slider").first();
        var $items = $slider.find(".item");

        var $container = $con.find(".ct-js-sliderTab-content").first();
        var $targetItems = $container.find(".targetItem");

        $con.on("click", function(e){

          var $target = $(e.target);

          if($target.is("img") || $target.is("p") || $target.is("i") || $target.is(".ct-sliderTab-join") || $target.is("span")){
            var $item = $target.closest(".item");
            var $for = $item.attr("data-for");
            var $allItem = $con.find(".item");

            $allItem.each(function(){
              var $this = $(this);

              if($this.attr("data-for") !== $for){
                $this.removeClass("active");
              }else{
                $this.addClass("active");

                var data = {
                  target: $for
                };
                $con.trigger('slickTabActiveChange', data);
              }
            });
          }
        });


          $con.on('afterChange', function(event, slick, currentSlide, nextSlide){
          var $slickList = $con.find(".item");
              var $for = null;
              $slickList.each(function(){
                  var $this = $(this);


                  if(!$this.hasClass("slick-center")){
                     // $this.removeClass("active");
                  }else{
                      $for = $this.attr("data-for");
                      $this.addClass("active");

                      var data = {
                          target: $for
                      };
                      $con.trigger('slickTabActiveChange', data);
                  }
              });

        });

        $con.bind('slickTabActiveChange', function (e, data) {

            if(data.target == "none")
                return;

          $targetItems.each(function(){
            var $this = $(this);

            if($this.hasClass(data.target)){
              $this.addClass("active");
            }else{
              $this.removeClass("active");
            }
          });
        });
      });




      $(".ct-mediaSection").mediaSection();

      // Text Color
    if (jQuery('[data-color]').length > 0) {
      jQuery('[data-color]').each(function () {
        var $this = jQuery(this);
        $this.css("color", $this.attr('data-color'));
      });
    }

    // Background Color
    if (jQuery('[data-background]').length > 0) {
      jQuery('[data-background]').each(function () {
        var $this = jQuery(this),
          $background = jQuery(this).attr('data-background'),
          $backgroundmobile = jQuery(this).attr('data-background-mobile');

        if ($this.attr('data-background').substr(0, 1) === '#') {
          $this.css('background-color', $background);
        } else if ($this.attr('data-background-mobile') && device.mobile()) {
          $this.css('background-image', 'url(' + $backgroundmobile + ')');
        } else if (!$htmlel.hasClass("ie8")){
          $this.css('background-image', 'url(' + $background + ')');
        }else{
            $this.css('background', 'url(' + $background + ')');
        }

      });
    }

    // Height
    if (jQuery('[data-height]').length > 0) {
      jQuery('[data-height]').each(function () {
        var $this = jQuery(this),
          $height = $this.attr('data-height');

        if ($height.indexOf("%") > -1) {
          $this.css('min-height', $deviceheight * (parseInt($height, 10) / 100));
        } else {
          $this.css('min-height', parseInt($height, 10) + "px");
        }
      });
    }

        // Tooltips and Popovers // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        $("[data-toggle='tooltip']").tooltip();

        $("[data-toggle='popover']").popover({trigger: "hover", html: true});


        // Link Scroll to Section // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        function goToByScroll(id) {
            $('html,body').animate({scrollTop: $(id).offset().top - 70}, 'slow');
        }

        $(document).ready(function () {
            $('body .ct-js-btnScroll').click(function () {
                goToByScroll($(this).attr('href'));
                return false;
            });
        });

        $('.ct-js-btnScrollUp').click(function (e) {
            e.preventDefault();
            $("body,html").animate({scrollTop: 0}, 1200, "swing");
            $navbarel.find('.onepage').removeClass('active');
            $navbarel.find('.onepage:first-child').addClass('active');
            return false;
        });

        // Placeholder Fallback // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        if ($().placeholder) {
            $("input[placeholder],textarea[placeholder]").placeholder();
        }



    var $navIcon =  $("#nav-icon");

    $navIcon.on("click", function () {

        if($(this).hasClass('open')){
            $(this).removeClass("open");
            $('.ct-menuMobile').removeClass("isOpen");
            $('#ct-js-wrapper').removeClass("isOpen");

            if(jQuery.browser.msie)
                $('.ct-mainHeader').removeClass("isOpen");
        } else{
            $(this).addClass("open");
            $('.ct-menuMobile').addClass("isOpen");
            $('#ct-js-wrapper').addClass("isOpen");
            if(jQuery.browser.msie)
                $('.ct-mainHeader').addClass("isOpen");
        }
    });

        // Snap Navigation in Mobile open // ---------------------------------------------------------------------------

        var menuElementToClick = $('.ct-menuMobile .ct-menuMobile-navbar .dropdown > a');

        menuElementToClick.on("click", function() {
            return false; // iOS SUCKS
        });
        menuElementToClick.on("click", function(){
            var $this = $(this);
            if($this.parent().hasClass('open')){
                $this.parent().removeClass('open');
            } else{
                $('.ct-menuMobile .ct-menuMobile-navbar .dropdown.open').toggleClass('open');
                $this.parent().addClass('open');
            }

        });

      // To Top Button // --------------------------------------------------------------------------------------------


        $('.ct-js-btnScrollUp').on("click", function (e) {
            e.preventDefault();
            $("body,html").animate({scrollTop: 0}, 1200);
            $navbarel.find('.onepage').removeClass('active');
            $navbarel.find('.onepage:first-child').addClass('active');
            return false;
        });



        // Animations Init // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        if ($().appear) {
            if (device.mobile() || device.tablet()) {
                $("body").removeClass("cssAnimate");
            } else {
                $('.cssAnimate .animated').appear(function () {
                    var $this = $(this);

                    $this.each(function () {
                        if ($this.data('time') != undefined) {
                            setTimeout(function () {
                                $this.addClass('activate');
                                $this.addClass($this.data('fx'));
                            }, $this.data('time'));
                        } else {
                            $this.addClass('activate');
                            $this.addClass($this.data('fx'));
                        }
                    });
                }, {accX: 50, accY: -350});
            }
        }


        if($devicewidth < 768){
            $('.ct-preloader').css({
                "display": "none"
            });
        }


    });
    $(window).on("load", function() {

        var $personBoxContainer = jQuery(".ct-js-personBoxContainer");

        $personBoxContainer.each(function(){
            var $this = jQuery(this),
                height = $this.height();

            $this.css({"min-height": height+300});
        });


        if($devicewidth > 767){
            alignRowHeight("ct-js-news-container", "ct-js-news-row", "ct-news-item", 768);
            alignRowHeight("ct-js-testimonial", "ct-js-testimonial-row", "ct-testimonial-item", 991);
        }

        if(!device.mobile() && !device.tablet() )
        {
            var s = skrollr.init({
                forceHeight: false
            });
        }
        if(device.mobile()){
            $('.ct-preloader').css({
                "display": "none"
            })
        }


        var $preloader = $('.ct-preloader');
        var $content = $('.ct-preloader-content');

        var $timeout = setTimeout(function(){
            $($preloader).addClass('animated').addClass('fadeOut');
            $($content).addClass('animated').addClass('fadeOut');
        }, 0);
        var $timeout2 = setTimeout(function(){
            $($preloader).css('display', 'none').css('z-index', '-9999');
        }, 500);


        if(!device.mobile() && !device.tablet()){
            $(window).stellar({
                horizontalScrolling   : false,
                verticalScrolling     : true,
                responsive            : true,
                horizontalOffset      : 0,
                verticalOffset        : 0,
                parallaxBackgrounds   : true,
                parallaxElements      : true,
                scrollProperty        : 'scroll',
                positionProperty      : 'position',
                hideDistantElements   : true
            });
        }
    });


  $(window).on("scroll", function(){

        var scroll        = $(window).scrollTop(),
            $toTopArrow = $('.ct-js-btnScrollUp');

        if (scroll > 300) {
            $toTopArrow.addClass('is-active');

            if(isTransparent){
                navbar.removeClass('ct-navbar--transparent');
            }
        } else {
           $toTopArrow.removeClass('is-active');
            if(isTransparent) {
                navbar.addClass('ct-navbar--transparent');
            }
        }

        //
        //if(htmlHeight - scroll - $deviceheight < 87){
        //  $toTopArrow.css("bottom", "88px");
        //}else{
        //  $toTopArrow.css("bottom", "0");
        //}


      if($onePage.length > 0){

          var scroll  = $(window).scrollTop(),
              offset  = -165;

          if(scroll + offset > $onePagePosition.top){
              $onePage.addClass("onepageFix").css("width", $onePageWidth);
          }else{
              $onePage.removeClass("onepageFix").css("width", "auto");
          }
      }

        //if($navbarel.find('.onepage').length <= 0){
        //    var isTransparent = false;
        //    var navTrans = $bodyel.find(".navbar-default");
        //
        //    if(navTrans.hasClass("ct-navbar--transparent")){
        //        isTransparent = true;
        //    }
        //
        //  if(isTransparent){
        //      if (scroll > 100) {
        //          navTrans.removeClass("ct-navbar--transparent");
        //      } else {
        //          navTrans.addClass("ct-navbar--transparent");
        //      }
        //  }



        //}

        //else{
        //    if (scroll > 100) {
        //        $bodyel.addClass("navbar--makeSmaller");
        //    } else {
        //        $bodyel.removeClass("navbar--makeSmaller");
        //    }
        //}

    });

})(jQuery);
