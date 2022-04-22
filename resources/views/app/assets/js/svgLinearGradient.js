import * as d3 from "d3";

export function svgLinearGradient(gradient, options = { id: "", string: "" }) {
    let svg = d3.select(options.id).append("svg").attr("height", 0);

    const angle = gradient.match(
        /(?<=\()([^[+-]?([0-9]+\.?[0-9]*|\.[0-9]+))(?=deg)|(?<=\()([0-9]+)(?=deg)/
    );

    const offsets = [
        ...gradient.matchAll(
            /(?<=\)[\s])([^[+-]?([0-9]+\.?[0-9]*|\.[0-9]+))(?=\%)/g
        ),
    ];

    const colors = [...gradient.matchAll(/rgba\(.*?\)|rgb\(.*?\)/g)];

    let gradients = [];

    colors.forEach((c, i) =>
        gradients.push({
            offset: offsets[i][0] + "%",
            color: c[0],
        })
    );

    svg.append("defs")
        .append("linearGradient")
        .attr("id", "grad")
        .attr("x1", "0%")
        .attr("y1", "0%")
        .attr("x2", "100%")
        .attr("y2", "0%")
        .attr("gradientTransform", "rotate(" + angle[0] + ")")
        .selectAll("stop")
        .data(gradients)
        .enter()
        .append("stop")
        .attr("offset", function (d) {
            return d.offset;
        })
        .attr("stop-color", function (d) {
            return d.color;
        });

    if (options.string) {
        let svg = d3.select(options.id).selectChild("svg");
        let svgString = svg.html();
        svg.remove();
        return svgString;
    }
}
