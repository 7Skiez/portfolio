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
            keyframes: {
                bounce1: {
                    "0%, 100%": {
                        transform: "translate(-50%, -41.7%)",
                    },
                    "50%": {
                        transform: "translate(-50%, -51.7%)",
                    },
                },
                bounce2: {
                    "0%, 100%": {
                        transform: "translate(-150%, -50%)",
                    },
                    "50%": {
                        transform: "translate(-150%, -60%)",
                    },
                },
                bounce3: {
                    "0%, 100%": {
                        transform: "translate(-50%, 66.67%)",
                    },
                    "50%": {
                        transform: "translate(-50%, 56.67%)",
                    },
                },
                bounce4: {
                    "0%, 100%": {
                        transform: "translate(50%, -41.7%)",
                    },
                    "50%": {
                        transform: "translate(50%, -51.7%)",
                    },
                },
                bounce5: {
                    "0%, 100%": {
                        transform: "translate(150%, -50%)",
                    },
                    "50%": {
                        transform: "translate(150%, -60%)",
                    },
                },
                bounce6: {
                    "0%, 100%": {
                        transform: "translate(50%, 66.67%)",
                    },
                    "50%": {
                        transform: "translate(50%, 56.67%)",
                    },
                },
                blink: {
                    "0%, 100%": {
                        opacity: "1",
                    },
                    "50%": {
                        opacity: "0",
                    },
                },
                rotation: {
                    "0%, 100%": {
                        transform: "rotate(0deg)",
                    },
                    "20%, 80%": {
                        transform: "rotate(360deg)",
                    },
                },
            },
            animation: {
                bounce1: "bounce1 8s ease-in-out infinite",
                bounce2: "bounce2 8s ease-in-out 0.1s infinite",
                bounce3: "bounce3 8s ease-in-out 0.2s infinite",
                bounce4: "bounce4 8s ease-in-out 0.3s infinite",
                bounce5: "bounce5 8s ease-in-out 0.4s infinite",
                bounce6: "bounce6 8s ease-in-out 0.5s infinite",
                blink: "blink 1s step-end infinite",
                rotation: "rotation 8s ease-in-out infinite",
            },
        },
    },
    plugins: [],
};
