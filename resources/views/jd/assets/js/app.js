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

import $ from 'jquery';
window.$ = window.jQuery = $;
import {terminal} from 'jquery.terminal'
// import { heroItems } from "../../../app/assets/js/heroItems";

// import * as THREE from 'three'
// import { commandHandler } from "../../../app/assets/js/commandHandler";

// import App from './interactive-particles/src/scripts/App';

/** Adds some simple class replacers, see the following article to learn more:
 * https://devdojo.com/tnylea/animating-tailwind-transitions-on-page-load
 */

//  jQuery(function($, undefined) {
    $('.terminal').terminal({
        add: function(a, b) {
            this.echo(a + b);
        },
        re: function(re, str) {
           if (re instanceof RegExp && re.test(str)) {
              this.echo(str + ' [[;green;]match]');
           }
        },
        foo: 'foo.php',
        bar: {
            sub: function(a, b) {
                this.echo(a - b);
            }
        }
    }, {
        height: 200,
        width: 450,
        prompt: 'demo> '
    });
// });

replaceClasses();

// document.addEventListener('DOMContentLoaded', () => {
//     window.app = new App();
// 	window.app.init();
// });

/********** SWIPER **********/

fetch("/api/data").then(res => res.json()).then(response => {
    // heroItems(response, 'displace');
    // commandHandler(response);
    mySwiper(response);
    createBarChart(response);
})
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