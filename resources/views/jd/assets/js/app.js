window._ = require("lodash");
window.axios = require("axios");
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.url = document.querySelector("meta[name='url']").getAttribute("content");
window.csrf = document
    .querySelector("meta[name='csrf-token']")
    .getAttribute("content");
import { throttle, debounce } from "throttle-debounce";
window.debounce = debounce;
import { replaceClasses } from "../../../app/assets/js/replaceClasses";
import { createBarChart } from "../../../app/assets/js/barChart";
import { mySwiper } from "../../../app/assets/js/swiper";

/** Adds some simple class replacers, see the following article to learn more:
 * https://devdojo.com/tnylea/animating-tailwind-transitions-on-page-load
 */

replaceClasses();

/********** SHIFT BACKGROUND **********/

(function () {
    // Init
    var container = document.querySelector("#hero > div"),
        inner = document.getElementById("inner");

    // Mouse
    var mouse = {
        _x: 0,
        _y: 0,
        x: 0,
        y: 0,
        updatePosition: function (event) {
            var e = event || document.event;
            this.x = e.clientX - this._x;
            this.y = (e.clientY - this._y) * -1;
        },
        setOrigin: function (e) {
            this._x = e.offsetLeft + Math.floor(e.offsetWidth / 2);
            this._y = e.offsetTop + Math.floor(e.offsetHeight / 2);
        },
        show: function () {
            return "(" + this.x + ", " + this.y + ")";
        },
    };

    // Track the mouse position relative to the center of the container.
    mouse.setOrigin(container);

    //----------------------------------------------------

    var counter = 0;
    var refreshRate = 10;
    var isTimeToUpdate = function () {
        return counter++ % refreshRate === 0;
    };

    //----------------------------------------------------

    var onMouseEnterHandler = function (event) {
        update(event);
    };

    var onMouseLeaveHandler = function () {
        inner.style = "";
    };

    var onMouseMoveHandler = function (event) {
        if (isTimeToUpdate()) {
            update(event);
        }
    };

    //----------------------------------------------------

    var update = function (event) {
        mouse.updatePosition(event);
        updateTransformStyle(
            (mouse.x / inner.offsetHeight / 2).toFixed(2),
            (mouse.y / inner.offsetWidth / 2).toFixed(2)
        );
    };

    var updateTransformStyle = function (x, y) {
        // var style = "rotateX(" + x + "deg) rotateY(" + y + "deg)";
        var style = "translate(" + x * 5 + "px," + y * -5 + "px)";
        inner.style.transform = style;
        inner.style.webkitTransform = style;
        inner.style.mozTranform = style;
        inner.style.msTransform = style;
        inner.style.oTransform = style;
    };

    //--------------------------------------------------------

    container.onmousemove = throttle(30, onMouseMoveHandler);
    container.onmouseleave = onMouseLeaveHandler;
    container.onmouseenter = onMouseEnterHandler;
})();

/********** SWIPER **********/
mySwiper();
createBarChart();
/********** BLINK TEXT **********/

window.blinkText = debounce(1000, function (e) {
    const section = document.querySelector(
        e.target.getAttribute("href") + " h2"
    );

    if (!section) return;

    section.classList.add("bg-gradient", "text-gradient", "duration-75");
    setTimeout(function () {
        section.classList.remove("bg-gradient", "text-gradient");
    }, 1000);
});

/********** UPDATE URL **********/

window.onscroll = throttle(150, function () {
    let x = this.innerWidth / 2 + this.scrollX;
    let y = this.innerHeight / 2 + this.scrollY;

    let minDist = 50000;
    let minDistEl = null;

    document.querySelectorAll("section[id]").forEach(function (el) {
        let centerX = el.offsetLeft + el.offsetWidth / 2;
        let centerY = el.offsetTop + el.offsetHeight / 2;
        let distance = Math.abs(x - centerX) + Math.abs(y - centerY);

        if (distance < minDist) {
            minDist = distance;
            minDistEl = el;
        }
    });

    if (minDistEl) {
        let urlHash = "#" + minDistEl.id;
        window.history.replaceState(null, null, urlHash);
    }
});

/********** Magnify Around Cursor **********/

(function () {
    const container = document.querySelector("body");
    const outerMag = document.createElement("div");
    outerMag.classList.add("outerMagnifier", "invisible");
    outerMag.setAttribute("data-replace", '{ "invisible": "visible" }');
    const innerMag = document.createElement("div");
    innerMag.classList.add("innerMagnifier");

    container.insertBefore(outerMag, container.firstChild);
    outerMag.insertBefore(innerMag, outerMag.firstChild);

    //Setting a few more...
    const outerMagOffset = +(outerMag.getBoundingClientRect().width / 2);
    const innerMagOffset = +(innerMag.getBoundingClientRect().width / 2);

    const magnification = 1.1;
    const outerMagBGSize =
        28 * magnification + "px " + 28 * magnification + "px";
    const innerMagBGSize =
        28 * magnification * 1.2 + "px " + 28 * magnification * 1.2 + "px";

    let left,
        top = null;

    const onMouseMoveHandler = function (e) {
        const outerMagBGPos =
            "" -
            (e.pageX * magnification - outerMagOffset) +
            "px " +
            -(e.pageY * magnification - outerMagOffset) +
            "px";
        const innerMagBGPos =
            "" -
            (e.pageX * magnification * 1.2 - innerMagOffset) +
            "px " +
            -(e.pageY * magnification * 1.2 - innerMagOffset) +
            "px";

        var inMagnifiableArea = {
            x:
                e.pageX > outerMagOffset &&
                e.pageX <
                    container.getBoundingClientRect().width - outerMagOffset,
            y:
                e.pageY > outerMagOffset &&
                e.pageY <
                    container.getBoundingClientRect().height - outerMagOffset,
        };

        if (inMagnifiableArea.x) left = e.pageX - outerMagOffset + "px";
        if (inMagnifiableArea.y) top = e.pageY - outerMagOffset + "px";

        outerMag.style.cssText = `
            background-size: ${outerMagBGSize};
            background-position: ${outerMagBGPos};
            left: ${left};
            top: ${top};
        `;
        innerMag.style.cssText = `
            background-size: ${innerMagBGSize};
            background-position: ${innerMagBGPos};
        `;
    };

    container.onmousemove = throttle(75, onMouseMoveHandler);
})();
