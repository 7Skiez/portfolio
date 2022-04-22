import { svgLinearGradient } from "../../../app/assets/js/svgLinearGradient";

export function createBarChart() {
    
    if (!document.querySelector(".barChart")) {return;}

    return fetch("/api/data").then(res => res.json()).then(response => {
      
        let skills = document.getElementsByClassName('skill')

        Object.entries(response).forEach((skill, i) => {
        
            const [name, percentage] = skill

            return new Waypoint({

                element: skills[i],
                handler: function() {
                    // var Gradient = '<defs><linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse"><stop offset="0%" stop-color="#CC0D69" /><stop offset="50%" stop-color="#CC0D69" /><stop offset="100%" stop-color="#830DCC" /></linearGradient></defs>';

                    let gradient = svgLinearGradient(response.data.chart.gradient, { id: "#" + response.data.chart.id, string: true });

                    var bar = new ProgressBar.Line(`[name=${ name }]`, {
                        strokeWidth: 8,
                        easing: 'easeInOut',
                        duration: 1400,
                        delay: 0 + i*100,
                        color: 'url(#gradient)',
                        trailColor: 'rgba(255,255,255,0.15)',
                        trailWidth: this.strokeWidth,
                        svgStyle: null
                    });
                    bar.svg.insertAdjacentHTML('afterbegin', gradient);
                    bar.animate(percentage*0.01); // Number from 0.0 to 1.0
                    this.destroy()
                },
                offset: '95%'
            
            })

        })

    })

}