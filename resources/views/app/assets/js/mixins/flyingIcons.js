require('waypoints/lib/noframework.waypoints.min');

let Obj = {
    create: (container, flyingIcon) => {
        const icon = document.createElement("span");
        icon.classList.add("icon");
        icon.style.cssText = `
            width: ${flyingIcon.width};
            height: ${flyingIcon.height};
            background: url(${flyingIcon.background}) center/contain;
        `;
        container.appendChild(icon);

        const evenness = Array.prototype.indexOf.call(icon.parentNode.childNodes, icon) % 2 === 0;

        icon.style.cssText += `
            animation: ${flyingIcon.animation_duration ?? (evenness ? 2.8 : 3)}s ${ flyingIcon.animation ?? (evenness ? "flyingEven" : "flyingOdd")} linear;
        `;

        const duration = window.getComputedStyle(icon).animationDuration.slice(0, -1) * 1000;

        setTimeout(() => {
            icon.remove();
        }, duration);
    },

    handle: (response) => {
        
        const iconContainer = document.querySelector(".icon-container");
        const iconAdd = document.querySelector(".icon-add");
        const team = document.querySelector(".team");

        let counter = 0;
        let add = true;
        iconAdd.addEventListener("click", () => {

            if (!add) return;

            if (counter < 10) {
                const iconSize = Math.random()
                Obj.create(iconContainer, {
                    width: `${iconSize*2}rem`,
                    height: `${iconSize*2}rem`,
                    background: response.footer.flyingIcon,
                });
                counter++;
            } else {
                add = false;
                Obj.create(iconContainer, {
                    width: "4rem",
                    height: "4rem",
                    background: response.footer.flyingIcon,
                    animation: "flyingBig",
                    animation_duration: 4
                });
                counter = 0;
                setTimeout(() => {
                    add = true
                }, 2000);
            }

        });

        new Waypoint({
            element: iconAdd,
            handler: function() {

                iconAdd.classList.add('animate-mouseClick')
                var timeouts = [];
                for(let i=0; i<33 ; i++){
                    timeouts.push(
                        setTimeout(() => {
                            iconAdd.click()
                            if(i === 32) {
                                iconAdd.classList.remove('animate-mouseClick')
                                team.classList.remove('animate-embolden')
                            }
                        }, i*250)
                    ) 
                }
                iconAdd.addEventListener('mouseover', () => {
                    timeouts.forEach(t => clearTimeout(t))
                    iconAdd.classList.remove('animate-mouseClick')
                    team.classList.remove('animate-embolden')
                })

                team.classList.add('animate-embolden')
                this.destroy()
            },
            offset: 'bottom-in-view'
        })
    },
};

export default Obj;