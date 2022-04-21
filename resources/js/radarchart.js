import * as d3 from "d3"

export function drawRadarChart() {
    
    if (!document.querySelector(".radarChart")) {return;}

    return axios.get("/api/data").then((response) => {
        /********** RADAR CHART **********/

        function RadarChart(id, data, options) {
            var cfg = {
                maxValue: 0, //What is the value that the biggest circle will represent
                labelFactor: 1.25, //How much farther than the radius of the outer circle should the labels be placed
                wrapWidth: 60, //The number of pixels after which a label needs to be given a new line
                opacityArea: 0.35, //The opacity of the area of the blob
                dotRadius: parseFloat(response.data.radarChart.dotRadius), //The size of the colored circles of each blog
                opacityCircles: 0.1, //The opacity of the circles of each blob
                strokeWidth: parseFloat(
                    response.data.radarChart.strokeWidth
                ), //The width of the stroke around each blob
            };

            //Put all of the options into a variable called cfg
            if ("undefined" !== typeof options) {
                for (var i in options) {
                    if ("undefined" !== typeof options[i]) {
                        cfg[i] = options[i];
                    }
                } //for i
            } //if

            //If the supplied maxValue is smaller than the actual one, replace by the max in the data
            var maxValue = Math.max(
                cfg.maxValue,
                d3.max(data, function (i) {
                    return d3.max(
                        i.map(function (o) {
                            return o.value;
                        })
                    );
                })
            );

            var allAxis = data[0].map(function (i, j) {
                    return i.axis;
                }), //Names of each axis
                total = allAxis.length, //The number of different axes
                radius = Math.min(cfg.w / 2, cfg.h / 2), //Radius of the outermost circle
                Format = d3.format("%"), //Percentage formatting
                angleSlice = (Math.PI * 2) / total; //The width in radians of each "slice"

            //Scale for the radius
            var rScale = d3.scaleLinear()
                .range([0, radius])
                .domain([0, maxValue]);

            /////////////////////////////////////////////////////////
            //////////// Create the container SVG and g /////////////
            /////////////////////////////////////////////////////////

            //Remove whatever chart with the same id/class was present before
            d3.select(id).select("svg").remove();

            //Initiate the radar chart SVG
            var svg = d3
                .select(id)
                .append("svg")
                // .attr("width", cfg.w + 250 + cfg.margin.left + cfg.margin.right)
                // .attr("height", cfg.h + cfg.margin.top + cfg.margin.bottom)
                .attr("class", "radar" + id)
                .attr(
                    "viewBox",
                    -(cfg.w + cfg.margin.left + cfg.margin.right) / 2 +
                        " " +
                        -(cfg.h + cfg.margin.top + cfg.margin.bottom) / 2 +
                        " " +
                        (cfg.w + cfg.margin.left + cfg.margin.right) +
                        " " +
                        (cfg.h + cfg.margin.top + cfg.margin.bottom)
                );
            //Append a g element
            var g = svg.append("g");

            /////////////////////////////////////////////////////////
            ////////// Glow filter for some extra pizzazz ///////////
            /////////////////////////////////////////////////////////

            //Filter for the outside glow
            var filter = g
                    .append("defs")
                    .append("filter")
                    .attr("id", "glow"),
                feGaussianBlur = filter
                    .append("feGaussianBlur")
                    .attr("stdDeviation", "2.5")
                    .attr("result", "coloredBlur"),
                feMerge = filter.append("feMerge"),
                feMergeNode_1 = feMerge
                    .append("feMergeNode")
                    .attr("in", "coloredBlur"),
                feMergeNode_2 = feMerge
                    .append("feMergeNode")
                    .attr("in", "SourceGraphic");

            /////////////////////////////////////////////////////////
            /////////////// Draw the Circular grid //////////////////
            /////////////////////////////////////////////////////////

            //Wrapper for the grid & axes
            var axisGrid = g.append("g").attr("class", "axisWrapper");

            //Draw the background circles
            axisGrid
                .selectAll(".levels")
                .data(d3.range(1, cfg.levels + 1).reverse())
                .enter()
                .append("circle")
                .attr("class", "gridCircle")
                .attr("r", function (d, i) {
                    return (radius / cfg.levels) * d;
                })
                .style("fill", "#CDCDCD")
                .style("stroke", "#CDCDCD")
                .style("fill-opacity", cfg.opacityCircles)
                .style("filter", "url(#glow)");

            /////////////////////////////////////////////////////////
            //////////////////// Draw the axes //////////////////////
            /////////////////////////////////////////////////////////

            //Create the straight lines radiating outward from the center
            var axis = axisGrid
                .selectAll(".axis")
                .data(allAxis)
                .enter()
                .append("g")
                .attr("class", "axis");

            axis.append("text")
                .attr("class", "legend")
                .attr("text-anchor", "middle")
                .attr("dy", "0.35em")
                .attr("x", function (d, i) {
                    return (
                        rScale(maxValue * cfg.labelFactor) *
                        Math.cos(angleSlice * i - Math.PI / 2)
                    );
                })
                .attr("y", function (d, i) {
                    let y =
                        rScale(maxValue * cfg.labelFactor) *
                        Math.sin(angleSlice * i - Math.PI / 2);

                    return y < 0 ? y + 45 : y - 45;
                })
                .text(function (d) {
                    return d;
                });
            // .call(wrap, cfg.wrapWidth)

            const rects = document.querySelectorAll(".axis text");
            var xList = [],
                yList = [];

            for (let i = 0; i < rects.length; i++) {
                xList.push(rects[i].getAttribute("x"));
                yList.push(rects[i].getAttribute("y"));
            }

            /////////////////////////////////////////////////////////
            ///////////// Draw the radar chart blobs ////////////////
            /////////////////////////////////////////////////////////

            // console.log(cfg.roundStrokes ? 'd3.curveCardinalClosed' : 'd3.curveLinearClosed')
            //The radial line function
            var radarLine = d3
                .lineRadial()
                .curve(cfg.roundStrokes ? d3.curveCardinalClosed : d3.curveLinearClosed)
                // .interpolate("linear-closed")
                .radius(function (d) {
                    return rScale(d.value);
                })
                .angle(function (d, i) {
                    return i * angleSlice;
                });

            // if (cfg.roundStrokes) {
            //     radarLine.curve(d3.curveCardinalClosed);
            // }

            //Create a wrapper for the blobs
            var blobWrapper = g
                .selectAll(".radarWrapper")
                .data(data)
                .enter()
                .append("g")
                .attr("class", "radarWrapper");

            //Append the backgrounds
            blobWrapper
                .append("path")
                .attr("class", "radarArea")
                .attr("d", function (d, i) {
                    return radarLine(d);
                })
                .style("fill", function (d, i) {
                    return cfg.color(i);
                })
                .style("fill-opacity", cfg.opacityArea)
                .on("mouseover", function (d, i) {
                    //Dim all blobs
                    d3.selectAll(".radarArea")
                        .transition()
                        .duration(200)
                        .style("fill-opacity", 0.1);
                    //Bring back the hovered over blob
                    d3.select(this)
                        .transition()
                        .duration(200)
                        .style("fill-opacity", 0.7);
                })
                .on("mouseout", function () {
                    //Bring back all blobs
                    d3.selectAll(".radarArea")
                        .transition()
                        .duration(200)
                        .style("fill-opacity", cfg.opacityArea);
                });

            //Create the outlines
            blobWrapper
                .append("path")
                .attr("class", "radarStroke")
                .attr("d", function (d, i) {
                    return radarLine(d);
                })
                .style("stroke-width", cfg.strokeWidth + "px")
                .style("stroke", function (d, i) {
                    return cfg.color(i);
                })
                .style("fill", "none")
                .style("filter", "url(#glow)");

            //Append the circles
            blobWrapper
                .selectAll(".radarCircle")
                .data(function (d, i) {
                    return d;
                })
                .enter()
                .append("circle")
                .attr("class", "radarCircle")
                .attr("r", cfg.dotRadius)
                .attr("cx", function (d, i) {
                    return (
                        rScale(d.value) *
                        Math.cos(angleSlice * i - Math.PI / 2)
                    );
                })
                .attr("cy", function (d, i) {
                    return (
                        rScale(d.value) *
                        Math.sin(angleSlice * i - Math.PI / 2)
                    );
                })
                .style("fill", function (d, i, j) {
                    return cfg.color(j);
                })
                .style("fill-opacity", 0.8);

            /////////////////////////////////////////////////////////
            //////// Append invisible circles for tooltip ///////////
            /////////////////////////////////////////////////////////

            //Wrapper for the invisible circles on top
            var blobCircleWrapper = g
                .selectAll(".radarCircleWrapper")
                .data(data)
                .enter()
                .append("g")
                .attr("class", "radarCircleWrapper");

            //Append a set of invisible circles on top for the mouseover pop-up
            blobCircleWrapper
                .selectAll(".radarInvisibleCircle")
                .data(function (d, i) {
                    return d;
                })
                .enter()
                .append("circle")
                .attr("class", "radarInvisibleCircle")
                .attr("r", cfg.dotRadius * 1.5)
                .attr("cx", function (d, i) {
                    return (
                        rScale(d.value) *
                        Math.cos(angleSlice * i - Math.PI / 2)
                    );
                })
                .attr("cy", function (d, i) {
                    return (
                        rScale(d.value) *
                        Math.sin(angleSlice * i - Math.PI / 2)
                    );
                })
                .style("fill", "none")
                .style("pointer-events", "all")
                .on("mouseover", function (d, i) {
                    let newX = parseFloat(d3.select(this).attr("cx")) - 10;
                    let newY = parseFloat(d3.select(this).attr("cy")) - 15;

                    tooltip
                        .attr("x", newX)
                        .attr("y", newY)
                        .text(
                            roundStrokes
                                ? d3.format(".0%")(i.value * 1.1 + 0.01)
                                : d3.format(".0%")(i.value)
                        )
                        .transition()
                        .duration(200)
                        .style("opacity", 1);
                })
                .on("mouseout", function () {
                    tooltip.transition().duration(200).style("opacity", 0);
                });

            //Set up the small tooltip for when you hover over a circle
            var tooltip = g
                .append("text")
                .attr("class", "tooltip")
                .style("opacity", 0);
        } //RadarChart

        /* Radar chart design created by Nadieh Bremer - VisualCinnamon.com */

        //////////////////////////////////////////////////////////////
        //////////////////////// Set-Up //////////////////////////////
        //////////////////////////////////////////////////////////////

        var margin = { top: 110, right: 110, bottom: 110, left: 110 },
            width = 635 - margin.left - margin.right,
            height = width;

        //////////////////////////////////////////////////////////////
        ////////////////////////// Data //////////////////////////////
        //////////////////////////////////////////////////////////////

        const radarItems = response.data.radarChart.radarItems;

        var data = [[]];

        let roundStrokes = response.data.radarChart.roundStrokes
            ? JSON.parse(
                    response.data.radarChart.roundStrokes.toLowerCase()
                )
            : false;

        Object.keys(radarItems).forEach((item) => {
            data[0].push({
                axis: item,
                value: roundStrokes
                    ? radarItems[item] * 0.009
                    : radarItems[item] * 0.01,
            });
        });

        /////////////////////////////////////////////////////////
        /////////////////// Helper Function /////////////////////
        /////////////////////////////////////////////////////////

        // Taken from http://bl.ocks.org/mbostock/7555321
        // Wraps SVG text
        function wrap(text, width) {
            text.each(function () {
                var text = d3.select(this),
                    words = text.text().split(/\s+/).reverse(),
                    word,
                    line = [],
                    lineNumber = 0,
                    lineHeight = 1.4, // ems
                    y = text.attr("y"),
                    x = text.attr("x"),
                    dy = parseFloat(text.attr("dy")),
                    tspan = text
                        .text(null)
                        .append("tspan")
                        .attr("x", x)
                        .attr("y", y)
                        .attr("dy", dy + "em");

                while ((word = words.pop())) {
                    line.push(word);
                    tspan.text(line.join(" "));
                    if (tspan.node().getComputedTextLength() > width) {
                        line.pop();
                        tspan.text(line.join(" "));
                        line = [word];
                        tspan = text
                            .append("tspan")
                            .attr("x", x)
                            .attr("y", y)
                            .attr(
                                "dy",
                                ++lineNumber * lineHeight + dy + "em"
                            )
                            .text(word);
                    }
                }
            });
        } //wrap

        //////////////////////////////////////////////////////////////
        //////////////////// Draw the Chart //////////////////////////
        //////////////////////////////////////////////////////////////

        var svg = d3
            .select("#" + response.data.radarChart.id)
            .append("svg")
            .attr("height", 0);

        const angle = response.data.radarChart.gradient.match(
            /(?<=\()([^[+-]?([0-9]+\.?[0-9]*|\.[0-9]+))(?=deg)|(?<=\()([0-9]+)(?=deg)/
        );

        const offsets = [
            ...response.data.radarChart.gradient.matchAll(
                /(?<=\)[\s])([^[+-]?([0-9]+\.?[0-9]*|\.[0-9]+))(?=\%)/g
            ),
        ];

        const colors = [
            ...response.data.radarChart.gradient.matchAll(
                /rgba\(.*?\)|rgb\(.*?\)/g
            ),
        ];

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

        var color = d3.scaleOrdinal().range(["url(#grad)"]);

        var radarChartOptions = {
            w: width,
            h: height,
            margin: margin,
            maxValue: 1.5,
            levels: 0,
            roundStrokes: roundStrokes,
            color: color,
        };
        //Call function to draw the Radar chart
        RadarChart(".radarChart", data, radarChartOptions);

        function makeBG(e) {
            var svgns = "http://www.w3.org/2000/svg";
            var bounds = e.getBBox();
            var bg = document.createElementNS(svgns, "rect");
            var style = getComputedStyle(e);
            var padding_top = parseInt(style["padding-top"]);
            var padding_left = parseInt(style["padding-left"]);
            var padding_right = parseInt(style["padding-right"]);
            var padding_bottom = parseInt(style["padding-bottom"]);
            bg.setAttribute(
                "x",
                bounds.x - parseInt(style["padding-left"])
            );
            bg.setAttribute("y", bounds.y - parseInt(style["padding-top"]));
            bg.setAttribute(
                "width",
                bounds.width + padding_left + padding_right
            );
            bg.setAttribute(
                "height",
                bounds.height + padding_top + padding_bottom
            );
            bg.setAttribute("fill", style["background-color"]);
            bg.setAttribute("rx", style["border-radius"]);
            e.parentNode.insertBefore(bg, e);
        }

        var texts = document.querySelectorAll("g.axis > text");

        texts.forEach((t) => makeBG(t));
    });
}
