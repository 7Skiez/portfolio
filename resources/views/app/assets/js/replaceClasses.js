export function replaceClasses() {
    return document.addEventListener("DOMContentLoaded", function () {
        var replacers = document.querySelectorAll("[data-replace]");
        for (var i = 0; i < replacers.length; i++) {
            let inputClasses = JSON.parse(
                replacers[i].dataset.replace.replace(/'/g, '"')
            );
            //replace white-space seperated values in inputClasses with array of classes
            var replacementClasses = new Array();
            Object.keys(inputClasses).forEach(function (key, i) {
                replacementClasses[i] = inputClasses[key].match(/(\s+)/)
                    ? inputClasses[key]
                          .split(/(\s+)/)
                          .filter((e) => e.trim().length > 0)
                    : inputClasses[key];
                inputClasses[key] = replacementClasses[i];
            });

            Object.keys(inputClasses).forEach(function (key) {
                replacers[i].classList.remove(key);

                if (typeof inputClasses[key] === "string") {
                    replacers[i].classList.add(inputClasses[key]);
                } else if (typeof inputClasses[key] === "object") {
                    replacers[i].classList.add(...inputClasses[key]);
                }
            });
        }
    });
}
