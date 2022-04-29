module.exports = {
    content: [
        "../app/*.php",
        "../app/**/*.php",
        "../app/**/**/*.(css|scss|js|php)",
        "../vendor/**/**/*.php",
        "../vendor/**/*.php",
        "./*.php",
        "./**/*.php",
        "./**/**/*.+(css|scss)",
    ],
    theme: {
        extend: {
            // keyframes: {
            //     boomarang: {
            //         "10%": { transform: "rotate(-20deg)" },
            //         "35%": {
            //             transform:
            //                 "translate(220%, -55%) scale(0.5) rotate(-200deg)",
            //         },
            //         "75%": {
            //             transform:
            //                 "translate(-210%, 55%) scale(0.9) rotate(260deg)",
            //         },
            //         "90%": { transform: "translate(0%, 0%) rotate(0deg)" },
            //     },
            // },
            // animation: {
            //     boomarang: "boomarang 1.75s infinite",
            // },
        },
    },
    plugins: [],
};
