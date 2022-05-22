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
import cssClasses from '../../../app/assets/js/mixins/cssClasses';
import heroItems from "../../../app/assets/js/mixins/heroItems";

/** Adds some simple class replacers, see the following article to learn more:
 * https://devdojo.com/tnylea/animating-tailwind-transitions-on-page-load
 */

cssClasses.replace();

heroItems.handle(document.querySelectorAll('.number'), 'counter');