import { round } from "lodash";

export default {
    handle: function (response, type = "") {
        const leftItems = document.querySelectorAll(".left div");
        const rightItems = document.querySelectorAll(".right div");

        const displaceItems = (items, maxDistance, direction) => {
            const dir = direction === "left" ? -1 : +1;
            const middleItems = (i) =>
                !Number.isInteger(i.length / 2)
                    ? [i[Math.floor(i.length / 2)]]
                    : [i[i.length / 2 - 1], i[i.length / 2]];

            const advanceBy = (items) =>
                maxDistance /
                (items.length === 1 ? 2 : Math.ceil(items.length / 2) - 1);
            middleItems(items).forEach(
                (i) =>
                    (i.style.cssText = `transform: translateX(${
                        maxDistance * dir
                    }px)`)
            );
            let distance = 0;
            for (let i = 0; i < Math.floor(items.length / 2); i++) {
                items[i].style.cssText = `transform: translateX(${
                    distance * dir
                }px)`;
                items[
                    items.length - 1 - i
                ].style.cssText = `transform: translateX(${distance * dir}px)`;
                distance += advanceBy(items);
            }
        };

        const rotateItems = (items, maxDegree, origin) => {
            const reduceBy = (items) =>
                (maxDegree * 2) / (items.length === 1 ? 2 : items.length - 1);
            const position = origin === "left" ? -1 : +1;
            let degree = maxDegree;

            items.forEach((i) => {
                i.style.cssText = `
                    transform: rotate(${degree * position}deg);
                    transform-origin: ${origin};
                `;
                degree -= reduceBy(items);
            });
        };

        const counter = (items, steps = 10, delay = 75) => {

            items.forEach((v, i) => {

                (() => setTimeout(() => {
                    var m = v.innerText * 1;

                    if (m > 1) {
                        for (
                            var c = (v.innerText = 0), n = 0;
                            n <= m;
                            n += m / steps, c++
                        ) {
                            (function (n, c) {
                                setTimeout(function () {
                                    v.innerText = _.round(n, 1);
                                }, c * delay);
                            })(n, c);
                        }
                    } else {
                        for (
                            var c = 1, n = v.innerText * 1 + steps / 100;
                            n >= m;
                            n -= 0.01, c++
                        ) {
                            (function (n, c) {
                                setTimeout(function () {
                                    v.innerText = _.round(n, 2);
                                }, c * delay);
                            })(n, c);
                        }
                    }

                }, i * delay * steps))(v, i);

            });

        };

        setTimeout(() => {
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
    },
};
