import { throttle } from "lodash";

export default {
    update: () => {
        window.onscroll = throttle(function () {
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
        }, 750);
    },
};