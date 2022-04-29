import { throttle } from "lodash";

export function magnifyCursor() {
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

    let left = null,
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

        const inMagnifiableArea = {
            x: e.pageX > outerMagOffset && e.pageX < container.getBoundingClientRect().width - outerMagOffset,
            y: e.pageY > outerMagOffset && e.pageY < container.getBoundingClientRect().height - outerMagOffset,
        };

        if (inMagnifiableArea.x) left = e.pageX - outerMagOffset;
        if (e.pageX < outerMagOffset) left = 0;
        if (e.pageX > container.getBoundingClientRect().width - outerMagOffset) left = container.getBoundingClientRect().width - 2*outerMagOffset

        if (inMagnifiableArea.y) top = e.pageY - outerMagOffset;
        if (e.pageY < outerMagOffset) top = 0;
        if (e.pageY > container.getBoundingClientRect().height - outerMagOffset) top = container.getBoundingClientRect().height - 2*outerMagOffset;

        outerMag.style.cssText = `
            background-size: ${outerMagBGSize};
            background-position: ${outerMagBGPos};
            left: ${left}px;
            top: ${top}px;
        `;
        innerMag.style.cssText = `
            background-size: ${innerMagBGSize};
            background-position: ${innerMagBGPos};
        `;
    };

    container.onmousemove = throttle(onMouseMoveHandler, 100);
}
