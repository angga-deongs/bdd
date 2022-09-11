(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

var _utilities = require("./utilities");

var _components = require("./components");

// --- utilities
// --- components
// --- App
var App = function () {
  // --- run transition
  var runTransition = function runTransition() {
    $("body").removeClass("hold-transition");
  }; // --- show site content


  var showSiteContent = function showSiteContent() {
    $(".js-main-site").removeClass("main-site--hide"); // --- disable scroll

    _utilities.Scrollable.enable();
  }; // --- ready


  var ready = function ready() {
    (function ($) {
      // --- disable scroll
      _utilities.Scrollable.disable(); // --- Global


      runTransition();
      showSiteContent();

      _utilities.BrowserCheck.init(); // --- Project


      _components.WindowResize.init();

      _components.WindowScroll.init();

      _components.Header.init();

      _components.Search.init();

      _components.Home.init();

      _components.Sort.init();

      _components.Category.init();

      _components.Landing.init();

      _components.Single.init();

      _components.Default.init();
    })(jQuery);
  }; // --- load


  var load = function load() {
    (function ($) {
      $(window).on("load", function () {});
    })(jQuery);
  }; // --- init


  var init = function init() {
    load();
    ready();
  }; // --- return


  return {
    init: init
  };
}(); // ---  run main js


App.init();

},{"./components":12,"./utilities":17}],2:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: Category
@description: Category
--------------------------------------------------------------------------------- */
var Category = function () {
  // - handleSetCategory
  var handleSetCategory = function handleSetCategory() {
    if ($(window).width() >= 768) {
      var _category = $(".js-layout-primary");

      _category.imagesLoaded().progress(function () {
        /* isotope ------------------------------------------------------------------ */
        _category.isotope({
          itemSelector: ".card-primary",
          percentPosition: true,
          masonry: {
            gutter: 0,
            columnWidth: ".layout-primary__sizer"
          }
        });
      });
    } else {
      $(".layout-primary__list").removeAttr("style");
      $(".layout-primary__list .card-primary").removeAttr("style");
    }
  }; // - init


  var init = function init() {
    if ($(".js-layout-primary").length) {
      handleSetCategory();
    }
  };

  return {
    init: init,
    setCategory: handleSetCategory
  };
}();

var _default = Category;
exports["default"] = _default;

},{}],3:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: Default
@description: Default
--------------------------------------------------------------------------------- */
var Default = function () {
  // - handleSetSideMenu
  var handleSetSideMenu = function handleSetSideMenu() {
    if ($(".default__body").length) {
      var _menu = "";
      $(".default__body h3").each(function (i, v) {
        // set tab
        $(v).attr("data-pane", i);

        var _txt = $(v).text();

        _menu += '<li class="default__side__item">' + '<a class="default__side__link" href="#" data-target="' + i + '">' + _txt + "</a>" + "</li>";
      });
      $(".default__side__list").html(_menu);
      $(".default__side__item:first").addClass("active");
    }
  }; // - handleClickSideMenu


  var handleClickSideMenu = function handleClickSideMenu() {
    $(".js-default-side-list a").on("click", function (e) {
      var _this = $(e.currentTarget);

      var _target = _this.attr("data-target");

      var _topHeight = $(".top").height();

      if (!_this.parents("li").hasClass("active")) {
        if ($(window).width() >= 992) {
          $(".default__posts").animate({
            scrollTop: $('.default__body h3[data-pane="' + _target + '"]').offset().top - _topHeight - 48
          }, 500);
        } else {
          $("html, body").animate({
            scrollTop: $('.default__body h3[data-pane="' + _target + '"]').offset().top - _topHeight - 48
          }, 500);
        }
      }

      e.preventDefault();
    });
  }; // - handleScrollSideMenu


  var handleScrollSideMenu = function handleScrollSideMenu() {
    if ($(window).width() >= 992) {
      $(".default__posts").on("scroll", function () {
        $(".default__body h3").each(function (i, v) {
          var _scrollTop = $(window).scrollTop();

          var _this = $(v);

          var _target = _this.attr("data-pane");

          var _offsetTop = $('.default__body h3[data-pane="' + _target + '"]').offset().top - $(".default__side__list").height() - $(".top").height();

          if (_scrollTop > _offsetTop) {
            $(".default__side__item").removeClass("active");
            $('.default__side__item a[data-target="' + _target + '"]').parent().addClass("active");
          }
        });
      });
    } else {
      $(window).on("scroll", function () {
        $(".default__body h3").each(function (i, v) {
          var _scrollTop = $(window).scrollTop();

          var _this = $(v);

          var _target = _this.attr("data-pane");

          var _offsetTop = $('.default__body h3[data-pane="' + _target + '"]').offset().top - $(".default__side__list").height() - $(".top").height();

          if (_scrollTop > _offsetTop) {
            $(".default__side__item").removeClass("active");
            $('.default__side__item a[data-target="' + _target + '"]').parent().addClass("active");
          }
        });
      });
    }
  }; // - init


  var init = function init() {
    handleSetSideMenu();
    handleClickSideMenu();
    handleScrollSideMenu();
  };

  return {
    init: init
  };
}();

var _default = Default;
exports["default"] = _default;

},{}],4:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _utilities = require("../utilities");

/* ------------------------------------------------------------------------------
@name: Header
@description: Header
--------------------------------------------------------------------------------- */
// - utilities
var Header = function () {
  // - handleMobileMenu
  var handleMobileMenu = function handleMobileMenu() {
    $(".js-burger-menu").on("click", function () {
      handleHideMobileMenu();
    });
  }; // - handleCloseMobileMenu


  var handleCloseMobileMenu = function handleCloseMobileMenu() {
    $(".js-close-mobile-menu").on("click", function () {
      $("body").removeClass("show-navigation");

      _utilities.Scrollable.enable();
    });
    $(".js-overlay").on("click", function () {
      handleHideMobileMenu();
    });
    $(document).on("keyup", function (e) {
      if (e.which === 27) {
        if ($("body").hasClass("show-navigation")) {
          $("body").removeClass("show-navigation");

          _utilities.Scrollable.enable();
        }
      }
    });
  }; // - handleHideMobileMenu


  var handleHideMobileMenu = function handleHideMobileMenu() {
    if ($("body").hasClass("show-navigation")) {
      $("body").removeClass("show-navigation");

      _utilities.Scrollable.enable();
    } else {
      $("body").addClass("show-navigation");

      _utilities.Scrollable.disable();
    }
  }; // - handleDropdownMenu


  var handleDropdownMenu = function handleDropdownMenu() {
    $(".js-header-menu .has-sub-category .header__link").on("click", function (e) {
      var _this = $(e.currentTarget);

      var _parents = _this.parents(".header__item");

      if (_parents.hasClass("show-sub-category")) {
        _parents.removeClass("show-sub-category");

        _parents.find(".header__sub-category__list").slideUp();
      } else {
        _parents.addClass("show-sub-category");

        _parents.find(".header__sub-category__list").slideDown();

        if (_parents.siblings(".header__item").hasClass("show-sub-category")) {
          _parents.siblings(".header__item").removeClass("show-sub-category");

          _parents.siblings(".header__item").find(".header__sub-category__list").slideUp();
        }
      }

      e.preventDefault();
    });
  }; // handleSearchMenu


  var handleSearchMenu = function handleSearchMenu() {
    $(".js-header-search-btn").on("click", function (e) {
      $(".header").addClass("show-search");
      setTimeout(function () {
        $(".header__search__input").focus();
      }, 500);
      e.stopPropagation();
    });
    $("body").on("click", function () {
      if ($(".header").hasClass("show-search")) {
        $(".header").removeClass("show-search");
      }
    });
    $(".header__search").on("click", function (e) {
      e.stopPropagation();
    });
  }; // - init


  var init = function init() {
    handleMobileMenu();
    handleCloseMobileMenu();
    handleDropdownMenu();
    handleSearchMenu();
  };

  return {
    init: init
  };
}();

var _default = Header;
exports["default"] = _default;

},{"../utilities":17}],5:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: Home
@description: Home
--------------------------------------------------------------------------------- */
var Home = function () {
  // - handleDropdownCategory
  var handleDropdownCategory = function handleDropdownCategory() {
    $(".js-home-posts-category").on("click", function (e) {
      var _this = $(e.currentTarget);

      var _parents = _this.parents(".home__head");

      if (_parents.hasClass("show-dropdown")) {
        _parents.removeClass("show-dropdown");
      } else {
        _parents.addClass("show-dropdown");

        if (_this.parents(".home__posts").siblings(".home__posts").find(".home__head").hasClass("show-dropdown")) {
          _this.parents(".home__posts").siblings(".home__posts").find(".home__head").removeClass("show-dropdown");
        }
      }

      e.stopPropagation();
    });
  }; // - handleCloseDropdownCategory


  var handleCloseDropdownCategory = function handleCloseDropdownCategory() {
    $("body").on("click", function () {
      if ($(".home__head").hasClass("show-dropdown")) {
        $(".home__head").removeClass("show-dropdown");
      }
    });
  }; // - handleClickSubCategory


  var handleClickSubCategory = function handleClickSubCategory() {
    if ($(window).width() >= 992) {
      $(".js-home-sub-category li").on("click", function (e) {
        var _this = $(e.currentTarget);

        var _txt = _this.text();

        var _parents = _this.parents(".home__head");

        _parents.find(".home__current-category").text(_txt);

        _this.addClass("active").siblings(".home__sub-category__item").removeClass("active");

        e.stopPropagation();
      });
    }
  }; // - handleAjaxDropdown


  var handleAjaxDropdown = function handleAjaxDropdown() {
    $(".js-home-sub-category .home__sub-category__item").on("click", function (e) {
      var _this = $(e.currentTarget);

      var _category = _this.attr("data-id");

      var _str = "&category=" + _category + "&action=dropdown_ajax";

      $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: _str,
        success: function success(data) {
          var _data = $(data);

          _this.parents(".home__posts").find(".home__list").html(_data);
        },
        error: function error(data) {}
      });
    });
  }; // - init


  var init = function init() {
    handleDropdownCategory();
    handleCloseDropdownCategory();
    handleClickSubCategory();
    handleAjaxDropdown();
  };

  return {
    init: init
  };
}();

var _default = Home;
exports["default"] = _default;

},{}],6:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: Landing
@description: Landing
--------------------------------------------------------------------------------- */
var Landing = function () {
  // - handleSetLanding
  var handleSetLanding = function handleSetLanding() {
    $.scrollify({
      section: ".snap-section",
      sectionName: "section-name",
      setHeights: false,
      updateHash: false,
      scrollbars: false,
      standardScrollElements: ".header, .overlay, section"
    });
  }; // - handleClickLogo


  var handleClickLogo = function handleClickLogo() {
    $(".js-sidenav-logo").on("click", function (e) {
      $.scrollify.previous();
    });
  }; // - handleClickArrow


  var handleClickArrow = function handleClickArrow() {
    $(".js-landing-arrow").on("click", function (e) {
      $.scrollify.next();
    });
  }; // - init


  var init = function init() {
    handleSetLanding();
    handleClickLogo();
    handleClickArrow();
  };

  return {
    init: init
  };
}();

var _default = Landing;
exports["default"] = _default;

},{}],7:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: Search
@description: Search
--------------------------------------------------------------------------------- */
var Search = function () {
  // - handleOpenSearch
  var handleOpenSearch = function handleOpenSearch() {
    $(".js-top-search .top__search__btn").on("click", function (e) {
      var _this = $(e.currentTarget);

      var _parents = _this.parents(".top__search");

      var _bar = _parents.find(".top__search__bar");

      if (!_bar.val().replace(/\s/g, "")) {
        _parents.addClass("top__search--show");

        setTimeout(function () {
          _bar.focus();
        }, 300);
        e.preventDefault();
      }
    });
  }; // - handleCloseSearch


  var handleCloseSearch = function handleCloseSearch() {
    $(".js-top-search .top__search__bar").blur(function (e) {
      var _this = $(e.currentTarget);

      var _parents = _this.parents(".top__search");

      if (_this.val()) {
        _parents.addClass("top__search--show");
      } else {
        _parents.removeClass("top__search--show");
      }
    });
    $(document).on("keyup", function (e) {
      if (e.which === 27) {
        if ($(".top__search").hasClass("top__search--show")) {
          $(".top__search").removeClass("top__search--show");
        }
      }
    });
  }; // - init


  var init = function init() {
    handleOpenSearch();
    handleCloseSearch();
  };

  return {
    init: init
  };
}();

var _default = Search;
exports["default"] = _default;

},{}],8:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: Single
@description: Single
--------------------------------------------------------------------------------- */
var Single = function () {
  // - handleRunCarousel
  var handleRunCarousel = function handleRunCarousel() {
    var _selector = $(".wp-block-gallery");

    var _itemLength = $(".wp-block-gallery .wp-block-image").length;
    var _itemRun = 1; // destroy carousel

    if (_selector.hasClass("owl-carousel")) {
      _selector.owlCarousel("destroy").removeClass("owl-carousel");
    } // --- check if itemLength > itemRun


    if (_itemLength > _itemRun) {
      // --- init carousel
      _selector.addClass("owl-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        dots: false,
        nav: true,
        loop: true,
        touchDrag: true,
        mouseDrag: true,
        smartSpeed: 1000,
        autoplayHoverPause: false,
        autoplayTimeout: 6000
      });
    } else {
      if (_selector.hasClass("owl-carousel")) {
        _selector.removeClass("owl-carousel");
      }

      _selector.addClass("wp-block-gallery--single");
    }
  }; // - handleGallery


  var handleGallery = function handleGallery() {
    $(".wp-block-image img").wrap("<div class='wp-block-image-box'></div>");
  }; // - handleClickCopy


  var handleClickCopy = function handleClickCopy() {
    $(".js-copy-link").on("click", function (e) {
      var _this = $(e.currentTarget);

      var _temp = $('<input type="text"/>');

      _this.parents(".single-events__share__item").addClass("show-tooltip");

      setTimeout(function () {
        _this.parents(".single-events__share__item").removeClass("show-tooltip");
      }, 2000);
      $(".single-events__share__item:last").append(_temp);

      _temp.val(_this.attr("data-link")).select();

      document.execCommand("copy");

      _temp.remove();

      e.preventDefault();
    });
  }; // - init


  var init = function init() {
    handleClickCopy();

    if ($(".wp-block-gallery")) {
      handleRunCarousel();
      handleGallery();
    }
  };

  return {
    init: init
  };
}();

var _default = Single;
exports["default"] = _default;

},{}],9:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: Sort
@description: Sort
--------------------------------------------------------------------------------- */
var Sort = function () {
  // - handleClickSort
  var handleClickSort = function handleClickSort() {
    $(".js-sort-btn").on("click", function (e) {
      $(e.currentTarget).parents(".sort").toggleClass("show-sort");
      e.stopPropagation();
    });
    $(".sort__link").on("click", function (e) {
      e.stopPropagation();
    });
  }; // - handleCloseSort


  var handleClsoeSort = function handleClsoeSort() {
    $("body").on("click", function () {
      if ($(".sort").hasClass("show-sort")) {
        $(".sort").removeClass("show-sort");
      }
    });
  }; // - init


  var init = function init() {
    handleClickSort();
    handleClsoeSort();
  };

  return {
    init: init
  };
}();

var _default = Sort;
exports["default"] = _default;

},{}],10:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _index = require("./index");

/*----------------------------------------
@name : components - windowresize
@description: Function to window resize
----------------------------------------
*/
var WindowResize = function () {
  var _timeout = false,
      _delta = 100,
      _rtime; // - handleWindowResize


  var handleWindowResize = function handleWindowResize() {
    $(window).on("resize", function () {
      _rtime = new Date();

      if (_timeout === false) {
        _timeout = true;
        $("body").addClass("hold-transition");
        setTimeout(handleWindowResizeEnd, _delta);
      }
    });
  };

  var handleWindowResizeEnd = function handleWindowResizeEnd() {
    if (new Date() - _rtime < _delta) {
      setTimeout(handleWindowResizeEnd, _delta);
    } // - end on window resize
    else {
      _timeout = false; // run function on Resize end

      $("body").removeClass("hold-transition");

      _index.Home.setScrollHorizontal();

      _index.Category.setCategory();
    }
  }; // - init


  var init = function init() {
    handleWindowResize();
  };

  return {
    init: init
  };
}();

var _default = WindowResize;
exports["default"] = _default;

},{"./index":12}],11:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/*----------------------------------------
@name : window scroll - components
@description: function to window scroll
----------------------------------------
*/
var WindowScroll = function () {
  var _lastScrollTop = 0;
  var _delta = 4;

  var _headerHeight = $('.header').height() / 2; // --- handleHeaderScroll


  var handleHeaderScroll = function handleHeaderScroll() {
    // --- _scrollTop
    var _scrollTop = $(window).scrollTop(); // --- Make sure they scroll more than _delta


    if (Math.abs(_lastScrollTop - _scrollTop) <= _delta) {
      return;
    }

    if (_scrollTop > 32) {
      $('body').addClass('on-scroll');
    } else {
      $('body').removeClass('on-scroll');
    } // --- Scroll Down


    if (_scrollTop > _lastScrollTop && _scrollTop > _headerHeight) {
      if (!$('.show-navigation').length) {
        $('body').addClass('scroll-down');
      }
    } else {
      // --- Scroll Up
      if (_scrollTop + $(window).height() < $(document).height()) {
        $('body').removeClass('scroll-down');
      }
    }

    _lastScrollTop = _scrollTop;
  }; // --- handleScroll


  var handleScroll = function handleScroll() {
    var _didScroll;

    $(window).scroll(function () {
      _didScroll = true;
      setInterval(function () {
        if (_didScroll) {
          if ($('.header').length) {
            handleHeaderScroll();
          }

          _didScroll = false;
        }
      }, 200);
    });
  }; // --- init


  var init = function init() {
    handleScroll();

    if ($('.header').length) {
      handleHeaderScroll();
    }
  }; // --- return


  return {
    init: init
  };
}();

var _default = WindowScroll;
exports["default"] = _default;

},{}],12:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
Object.defineProperty(exports, "Category", {
  enumerable: true,
  get: function get() {
    return _Category["default"];
  }
});
Object.defineProperty(exports, "Default", {
  enumerable: true,
  get: function get() {
    return _Default["default"];
  }
});
Object.defineProperty(exports, "Header", {
  enumerable: true,
  get: function get() {
    return _Header["default"];
  }
});
Object.defineProperty(exports, "Home", {
  enumerable: true,
  get: function get() {
    return _Home["default"];
  }
});
Object.defineProperty(exports, "Landing", {
  enumerable: true,
  get: function get() {
    return _Landing["default"];
  }
});
Object.defineProperty(exports, "Search", {
  enumerable: true,
  get: function get() {
    return _Search["default"];
  }
});
Object.defineProperty(exports, "Single", {
  enumerable: true,
  get: function get() {
    return _Single["default"];
  }
});
Object.defineProperty(exports, "Sort", {
  enumerable: true,
  get: function get() {
    return _Sort["default"];
  }
});
Object.defineProperty(exports, "WindowResize", {
  enumerable: true,
  get: function get() {
    return _WindowResize["default"];
  }
});
Object.defineProperty(exports, "WindowScroll", {
  enumerable: true,
  get: function get() {
    return _WindowScroll["default"];
  }
});

var _WindowResize = _interopRequireDefault(require("./WindowResize"));

var _WindowScroll = _interopRequireDefault(require("./WindowScroll"));

var _Header = _interopRequireDefault(require("./Header"));

var _Search = _interopRequireDefault(require("./Search"));

var _Home = _interopRequireDefault(require("./Home"));

var _Sort = _interopRequireDefault(require("./Sort"));

var _Category = _interopRequireDefault(require("./Category"));

var _Landing = _interopRequireDefault(require("./Landing"));

var _Single = _interopRequireDefault(require("./Single"));

var _Default = _interopRequireDefault(require("./Default"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

},{"./Category":2,"./Default":3,"./Header":4,"./Home":5,"./Landing":6,"./Search":7,"./Single":8,"./Sort":9,"./WindowResize":10,"./WindowScroll":11}],13:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: BrowserCheck
@description: BrowserCheck
--------------------------------------------------------------------------------- */
// --- BrowserCheck
var BrowserCheck = function () {
  // --- handleCheck
  var handleCheck = function handleCheck() {
    var _browser = 'dekstop-browser';
    var HTMLElement = document.getElementsByTagName('html')[0];

    if (navigator.userAgent.match(/Android/i)) {
      _browser = 'android-browser';
    } else if (navigator.userAgent.match(/BlackBerry/i)) {
      _browser = 'blackberry-browser';
    } else if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
      _browser = 'ios-browser';
    } else if (navigator.userAgent.match(/IEMobile/i)) {
      _browser = 'windows-phone-browser';
    }

    $('html').addClass(_browser);
  }; // --- init


  var init = function init() {
    handleCheck();
  }; // --- return


  return {
    init: init
  };
}();

var _default = BrowserCheck;
exports["default"] = _default;

},{}],14:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: Scrollable
@description: Scrollable
--------------------------------------------------------------------------------- */
// --- Scrollable
var Scrollable = function () {
  // --- handleEnable
  var handleEnable = function handleEnable() {
    $("body").removeClass("rm-scroll");
  }; // --- handleDisable


  var handleDisable = function handleDisable() {
    $("body").addClass("rm-scroll");
  }; // --- return


  return {
    enable: handleEnable,
    disable: handleDisable
  };
}();

var _default = Scrollable;
exports["default"] = _default;

},{}],15:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: Session
@description: Session
--------------------------------------------------------------------------------- */
// --- Session
var Session = function () {
  var _timeoutSession; // --- handleSet


  var handleSet = function handleSet(key, value) {
    return localStorage.setItem(key, value);
  }; // --- handleGet


  var handleGet = function handleGet(key, value) {
    return localStorage.getItem(key, value);
  }; // --- handleRemove


  var handleRemove = function handleRemove(key) {
    return localStorage.removeItem(key);
  }; // --- handleClear


  var handleClear = function handleClear(key) {
    return localStorage.clear();
  }; // --- handleTimeout


  var handleTimeout = function handleTimeout(callbackFunction) {
    var timer = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 30;
    _timeoutSession = setTimeout(function () {
      callbackFunction();
    }, timer * 1000);
    document.addEventListener('mousemove', function (e) {
      clearTimeout(_timeoutSession);
      _timeoutSession = setTimeout(function () {
        callbackFunction();
      }, timer * 1000);
    }, true);
  }; // --- return


  return {
    set: handleSet,
    get: handleGet,
    remove: handleRemove,
    clear: handleClear,
    timeout: handleTimeout
  };
}();

var _default = Session;
exports["default"] = _default;

},{}],16:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _variables = require("../variables");

/* ------------------------------------------------------------------------------
@name: Validation
@description: Validation
--------------------------------------------------------------------------------- */
// --- variables
var Validation = function () {
  // - handleInput
  var handleInput = function handleInput(eventsEl, selectorEl) {
    $.each(eventsEl, function (ie, ve) {
      $.each(selectorEl, function (i, v) {
        $('#' + v.id).on(ve, function (e) {
          var _this = $(e.currentTarget),
              _val = _this.val(),
              _target = _this.attr('data-target'),
              _alertEl = $('#' + _target);

          var _errorMessage; // Condition if validation does not error


          _alertEl.removeClass('error');

          _this.parent().removeClass('error'); // Minimum Validation


          if (v.validation.minimum) {
            if (_val.length < v.validation.minimumChar) {
              _errorMessage = _alertEl.attr('data-invalid');
            }
          } // Maximum Validation


          if (v.validation.maximum) {
            if (_val.length < v.validation.maximumChar) {
              _errorMessage = _alertEl.attr('data-invalid');
            }
          } // Minimum Validation


          if (v.validation.name) {
            if (!_variables.PERSON_NAME.test(_val)) {
              _errorMessage = _alertEl.attr('data-invalid');
            }
          } // Email validation


          if (v.validation.email) {
            if (!_variables.EMAIL.test(_val)) {
              _errorMessage = _alertEl.attr('data-invalid');
            }
          } // Numeric validation


          if (v.validation.phone) {
            if (!_variables.PHONE_NUMBER.test(_val)) {
              _errorMessage = _alertEl.attr('data-invalid-phone');
            }
          } // Required validation


          if (_variables.WHITESPACE.test(_val)) {
            _errorMessage = _alertEl.attr('data-req');
          } // Error Message


          if (_errorMessage !== undefined) {
            _alertEl.text(_errorMessage);

            _alertEl.addClass('error');

            _this.parent().addClass('error');
          }
        });
      });
    }); // Return Handle keypress

    handleKeypress();
  }; // handleKeypress


  var handleKeypress = function handleKeypress() {
    $('.number-only').on('keypress', function (e) {
      var _this = $(e.currentTarget),
          _val = _this.val(),
          _target = _this.attr('data-target'),
          _alertEl = $('#' + _target);

      var _errorMessage;

      if (!_variables.NUMBERIC.test(e.key)) {
        _errorMessage = _alertEl.attr('data-invalid');

        _alertEl.text(_errorMessage);

        _alertEl.addClass('error');

        _this.parent().addClass('error'); // remove error after few second


        setTimeout(function () {
          _alertEl.removeClass('error');

          _this.parent().removeClass('error');
        }, 2000);
        e.preventDefault();
      }
    });
  };

  return {
    config: handleInput
  };
}();

var _default = Validation;
exports["default"] = _default;

},{"../variables":20}],17:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
Object.defineProperty(exports, "BrowserCheck", {
  enumerable: true,
  get: function get() {
    return _BrowserCheck["default"];
  }
});
Object.defineProperty(exports, "Scrollable", {
  enumerable: true,
  get: function get() {
    return _Scrollable["default"];
  }
});
Object.defineProperty(exports, "Session", {
  enumerable: true,
  get: function get() {
    return _Session["default"];
  }
});
Object.defineProperty(exports, "Validation", {
  enumerable: true,
  get: function get() {
    return _Validation["default"];
  }
});
Object.defineProperty(exports, "isOS", {
  enumerable: true,
  get: function get() {
    return _isOS["default"];
  }
});

var _isOS = _interopRequireDefault(require("./isOS"));

var _BrowserCheck = _interopRequireDefault(require("./BrowserCheck"));

var _Scrollable = _interopRequireDefault(require("./Scrollable"));

var _Validation = _interopRequireDefault(require("./Validation"));

var _Session = _interopRequireDefault(require("./Session"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

},{"./BrowserCheck":13,"./Scrollable":14,"./Session":15,"./Validation":16,"./isOS":18}],18:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

/* ------------------------------------------------------------------------------
@name: isOS
@description: isOS
--------------------------------------------------------------------------------- */
var isOS = {
  android: function android() {
    return navigator.userAgent.match(/Android/i);
  },
  blackberry: function blackberry() {
    return navigator.userAgent.match(/BlackBerry/i);
  },
  iOS: function iOS() {
    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
  },
  mac: function mac() {
    return navigator.platform.indexOf('Mac') > -1;
  },
  opera: function opera() {
    return navigator.userAgent.match(/Opera Mini/i);
  },
  win: function win() {
    return navigator.platform.indexOf('Win') > -1;
  },
  winMobile: function winMobile() {
    return navigator.userAgent.match(/IEMobile/i);
  },
  any: function any() {
    return isOS.android() || isOS.blackberry() || isOS.iOS() || isOS.mac() || isOS.opera() || isOS.win() || isOS.winMobile();
  }
};
var _default = isOS;
exports["default"] = _default;

},{}],19:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.WHITESPACE = exports.PHONE_NUMBER = exports.PERSON_NAME = exports.NUMBERIC = exports.FULL_NAME = exports.EMAIL = void 0;

/* ------------------------------------------------------------------------------
@name: Regex
@description: Regex
--------------------------------------------------------------------------------- */
var WHITESPACE = /^ *$/;
exports.WHITESPACE = WHITESPACE;
var EMAIL = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
exports.EMAIL = EMAIL;
var NUMBERIC = /[0-9]+$/i;
exports.NUMBERIC = NUMBERIC;
var PHONE_NUMBER = /^(0|\+62)+([0-9]){4,16}/i;
exports.PHONE_NUMBER = PHONE_NUMBER;
var FULL_NAME = /^(?:[\u00c0-\u01ffa-zA-Z-\s\.']){3,}(?:[\u00c0-\u01ffa-zA-Z-\s\.']{3,})+$/i;
exports.FULL_NAME = FULL_NAME;
var PERSON_NAME = /^[a-zA-Z][a-zA-Z\-' ]*[a-zA-Z ]$/i;
exports.PERSON_NAME = PERSON_NAME;

},{}],20:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _Regex = require("./Regex");

Object.keys(_Regex).forEach(function (key) {
  if (key === "default" || key === "__esModule") return;
  if (key in exports && exports[key] === _Regex[key]) return;
  Object.defineProperty(exports, key, {
    enumerable: true,
    get: function get() {
      return _Regex[key];
    }
  });
});

},{"./Regex":19}]},{},[1])

//# sourceMappingURL=maps/app.js.map
