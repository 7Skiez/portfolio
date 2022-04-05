// import '@simonwep/pickr/dist/themes/monolith.min.css';  // 'monolith' theme

// // Modern or es5 bundle (pay attention to the note below!)
// import Pickr from '@simonwep/pickr';

import './gpickr.min.js';

// // document.querySelectorAll('.color-container').forEach(e => {

//     const pickr = Pickr.create({
//         el: '.color-container',
//         theme: 'classic', // or 'monolith', or 'nano'
    
//         swatches: [
//             'rgba(244, 67, 54, 1)',
//             'rgba(233, 30, 99, 0.95)',
//             'rgba(156, 39, 176, 0.9)',
//             'rgba(103, 58, 183, 0.85)',
//             'rgba(63, 81, 181, 0.8)',
//             'rgba(33, 150, 243, 0.75)',
//             'rgba(3, 169, 244, 0.7)',
//             'rgba(0, 188, 212, 0.7)',
//             'rgba(0, 150, 136, 0.75)',
//             'rgba(76, 175, 80, 0.8)',
//             'rgba(139, 195, 74, 0.85)',
//             'rgba(205, 220, 57, 0.9)',
//             'rgba(255, 235, 59, 0.95)',
//             'rgba(255, 193, 7, 1)'
//         ],
    
//         components: {
    
//             // Main components
//             preview: true,
//             opacity: true,
//             hue: true,
    
//             // Input / output Options
//             interaction: {
//                 hex: true,
//                 rgba: true,
//                 hsla: true,
//                 hsva: true,
//                 cmyk: true,
//                 input: true,
//                 clear: true,
//                 save: true
//             }
//         }
//     });

// // })

var declarationToStops = function (string) {

    let colors = [...string.matchAll(/rgba\(.*?\)/g)]
    
    return colors.map(rgba => {

        let rgbas = rgba[0].match(/^rgba\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3}),\s*(\d*(?:\.\d+)?)\)/)
        return (rgbas ? [`rgb(${rgbas[1]},${rgbas[2]},${rgbas[3]})`, Number(rgbas[4]) ] : null)
        
    })

  };

// fetch('http://localhost:3000/admin/settings/colors')
//         .then(res => res.json())
//         .then(json => {
            document.querySelectorAll('.gradient-pickr').forEach(e => {

                new GPickr({
            
                    el: `${'.'+e.firstElementChild.classList[0]}`,
                    
                    // Pre-defined stops. These are the default since at least two should be defined

                    stops: declarationToStops('linear-gradient(45deg, rgba(255, 132, 109, 1) 0%,rgba(171, 79, 151, 1) 100%)')
                    // stops: [
                    //     ['rgb(255,132,109)', 0],
                    //     ['rgb(255,136,230)', 1]
                    // ]
            
                }).on('change', instance => {
                    console.log(instance.getGradient());
                });
            
            })
        // })