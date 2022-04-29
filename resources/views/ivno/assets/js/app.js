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
import { replaceClasses } from "../../../app/assets/js/replaceClasses";
import { drawRadarChart } from "../../../app/assets/js/radarChart";
import { mySwiper } from "../../../app/assets/js/swiper";
import { shiftBackground } from '../../../app/assets/js/shiftBackground'
import { heroItems } from "../../../app/assets/js/heroItems";
import { magnifyCursor } from "../../../app/assets/js/magnifyCursor";
import { blinkText } from "../../../app/assets/js/blinkText";
window.bt = _.debounce(blinkText, 1000)
import { updateUrl } from "../../../app/assets/js/updateUrl";
// import { flyingIcon } from "../../../app/assets/js/flyingIcon";

/** Adds some simple class replacers, see the following article to learn more:
 * https://devdojo.com/tnylea/animating-tailwind-transitions-on-page-load
 */

replaceClasses();
/********** SHIFT BACKGROUND **********/
shiftBackground();
/********** SWIPER **********/
fetch("/api/data").then(res => res.json()).then(response => {
    heroItems(response, 'rotate');
    mySwiper(response);
    drawRadarChart(response);
    // flyingIcon(response)
});
/********** UPDATE URL **********/
updateUrl()
/********** Magnify Around Cursor **********/
magnifyCursor()