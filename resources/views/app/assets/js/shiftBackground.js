import { throttle } from "lodash";

export function shiftBackground() {
    // Init
    var inner = document.querySelector("#profile_bg_img"),
        container = document.querySelector("#hero");

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

    var onMouseEnterHandler = function (event) {
        update(event);
    };

    var onMouseLeaveHandler = function () {
        inner.style = "";
    };

    var onMouseMoveHandler = function (event) {
        update(event);
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

    container.onmousemove = throttle(onMouseMoveHandler, 100);
    container.onmouseleave = onMouseLeaveHandler;
    container.onmouseenter = onMouseEnterHandler;
}
