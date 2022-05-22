"use strict";
(self["webpackChunkivno"] = self["webpackChunkivno"] || []).push([["/js/app"],{

/***/ "../app/assets/js/mixins/cssClasses.js":
/*!*********************************************!*\
  !*** ../app/assets/js/mixins/cssClasses.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  replace: function replace() {
    return document.addEventListener("DOMContentLoaded", function () {
      var replacers = document.querySelectorAll("[data-replace]");

      var _loop = function _loop() {
        var inputClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"')); //replace white-space seperated values in inputClasses with array of classes

        replacementClasses = new Array();
        Object.keys(inputClasses).forEach(function (key, i) {
          replacementClasses[i] = inputClasses[key].match(/(\s+)/) ? inputClasses[key].split(/(\s+)/).filter(function (e) {
            return e.trim().length > 0;
          }) : inputClasses[key];
          inputClasses[key] = replacementClasses[i];
        });
        Object.keys(inputClasses).forEach(function (key) {
          replacers[i].classList.remove(key);

          if (typeof inputClasses[key] === "string") {
            replacers[i].classList.add(inputClasses[key]);
          } else if (_typeof(inputClasses[key]) === "object") {
            var _replacers$i$classLis;

            (_replacers$i$classLis = replacers[i].classList).add.apply(_replacers$i$classLis, _toConsumableArray(inputClasses[key]));
          }
        });
      };

      for (var i = 0; i < replacers.length; i++) {
        var replacementClasses;

        _loop();
      }
    });
  }
});

/***/ }),

/***/ "../app/assets/js/mixins/heroItems.js":
/*!********************************************!*\
  !*** ../app/assets/js/mixins/heroItems.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_0__);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  handle: function handle(response) {
    var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
    var leftItems = document.querySelectorAll(".left div");
    var rightItems = document.querySelectorAll(".right div");

    var displaceItems = function displaceItems(items, maxDistance, direction) {
      var dir = direction === "left" ? -1 : +1;

      var middleItems = function middleItems(i) {
        return !Number.isInteger(i.length / 2) ? [i[Math.floor(i.length / 2)]] : [i[i.length / 2 - 1], i[i.length / 2]];
      };

      var advanceBy = function advanceBy(items) {
        return maxDistance / (items.length === 1 ? 2 : Math.ceil(items.length / 2) - 1);
      };

      middleItems(items).forEach(function (i) {
        return i.style.cssText = "transform: translateX(".concat(maxDistance * dir, "px)");
      });
      var distance = 0;

      for (var i = 0; i < Math.floor(items.length / 2); i++) {
        items[i].style.cssText = "transform: translateX(".concat(distance * dir, "px)");
        items[items.length - 1 - i].style.cssText = "transform: translateX(".concat(distance * dir, "px)");
        distance += advanceBy(items);
      }
    };

    var rotateItems = function rotateItems(items, maxDegree, origin) {
      var reduceBy = function reduceBy(items) {
        return maxDegree * 2 / (items.length === 1 ? 2 : items.length - 1);
      };

      var position = origin === "left" ? -1 : +1;
      var degree = maxDegree;
      items.forEach(function (i) {
        i.style.cssText = "\n                    transform: rotate(".concat(degree * position, "deg);\n                    transform-origin: ").concat(origin, ";\n                ");
        degree -= reduceBy(items);
      });
    };

    var counter = function counter(items) {
      var steps = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 10;
      var delay = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 75;
      items.forEach(function (v, i) {
        (function () {
          return setTimeout(function () {
            var m = v.innerText * 1;

            if (m > 1) {
              for (var c = v.innerText = 0, n = 0; n <= m; n += m / steps, c++) {
                (function (n, c) {
                  setTimeout(function () {
                    v.innerText = _.round(n, 1);
                  }, c * delay);
                })(n, c);
              }
            } else {
              for (var c = 1, n = v.innerText * 1 + steps / 100; n >= m; n -= 0.01, c++) {
                (function (n, c) {
                  setTimeout(function () {
                    v.innerText = _.round(n, 2);
                  }, c * delay);
                })(n, c);
              }
            }
          }, i * delay * steps);
        })(v, i);
      });
    };

    setTimeout(function () {
      if (type === "displace") {
        displaceItems(leftItems, response.hero_items, "left");
        displaceItems(rightItems, response.hero_items, "right");
      }

      if (type === "rotate") {
        rotateItems(leftItems, response.hero_items, "right");
        rotateItems(rightItems, response.hero_items, "left");
      }

      if (type === "counter") {
        counter(response);
      }
    }, 500);
  }
});

/***/ }),

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var alpinejs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! alpinejs */ "./node_modules/alpinejs/dist/module.esm.js");
/* harmony import */ var _app_assets_js_mixins_cssClasses__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../app/assets/js/mixins/cssClasses */ "../app/assets/js/mixins/cssClasses.js");
/* harmony import */ var _app_assets_js_mixins_heroItems__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../app/assets/js/mixins/heroItems */ "../app/assets/js/mixins/heroItems.js");
window._ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");

window.Alpine = alpinejs__WEBPACK_IMPORTED_MODULE_0__["default"];
alpinejs__WEBPACK_IMPORTED_MODULE_0__["default"].start();
window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.url = document.querySelector("meta[name='url']").getAttribute("content");
window.csrf = document.querySelector("meta[name='csrf-token']").getAttribute("content");
window.api = document.querySelector("meta[name='api']").getAttribute("content");


/** Adds some simple class replacers, see the following article to learn more:
 * https://devdojo.com/tnylea/animating-tailwind-transitions-on-page-load
 */

_app_assets_js_mixins_cssClasses__WEBPACK_IMPORTED_MODULE_1__["default"].replace();
_app_assets_js_mixins_heroItems__WEBPACK_IMPORTED_MODULE_2__["default"].handle(document.querySelectorAll('.number'), 'counter');

/***/ }),

/***/ "./assets/sass/app.scss":
/*!******************************!*\
  !*** ./assets/sass/app.scss ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["css/app","/js/vendor"], () => (__webpack_exec__("./assets/js/app.js"), __webpack_exec__("./assets/sass/app.scss")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);