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
window.api = document.querySelector("meta[name='api']").getAttribute("content");
import cssClasses from "../../../app/assets/js/mixins/cssClasses";
import cursor from "../../../app/assets/js/mixins/cursor";
import profileBG from "../../../app/assets/js/mixins/profileBG";
import sectionTitle from "../../../app/assets/js/mixins/sectionTitle";
window.bt = _.debounce(sectionTitle.blink, 1000);
import heroItems from "../../../app/assets/js/mixins/heroItems";
import swiper from "../../../app/assets/js/mixins/swiper";
import radarChart from "../../../app/assets/js/mixins/radarChart";
import url from "../../../app/assets/js/mixins/url";
import flyingIcons from "../../../app/assets/js/mixins/flyingIcons";

/** Adds some simple class replacers, see the following article to learn more:
 * https://devdojo.com/tnylea/animating-tailwind-transitions-on-page-load
 */

cssClasses.replace();

/********** MAGNIFY AROUND CURSOR **********/

cursor.magnifyAround();

/********** SHIFT BACKGROUND **********/

profileBG.shift("#profile_bg_img", "#hero");

/********** HANDLE SECTIONS **********/

fetch("/api/" + api)
    .then((res) => res.json())
    .then((response) => {
        heroItems.handle(response, "rotate");
        swiper.create(response);
        radarChart.draw(".radarChart", response);
        flyingIcons.handle(response);
    });

/********** UPDATE URL **********/

url.update();
