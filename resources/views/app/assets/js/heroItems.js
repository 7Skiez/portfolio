export function heroItems(response, type = '') {

    const leftItems = document.querySelectorAll(".left div");
    const rightItems = document.querySelectorAll(".right div");

    const displaceItems = (items, maxDistance, direction) => {

        const dir = (direction === 'left' ? -1 : +1)
        const middleItems = (i) =>
            !Number.isInteger(i.length / 2)
                ? [i[Math.floor(i.length / 2)]]
                : [i[i.length / 2 - 1], i[i.length / 2]];
                
        const advanceBy = (items) => maxDistance / (items.length === 1 ? 2 : Math.ceil(items.length / 2) - 1)
        middleItems(items).forEach(i => i.style.cssText = `transform: translateX(${maxDistance * dir}px)`)
        let distance = 0
        for(let i = 0; i < Math.floor(items.length / 2); i++){
            items[i].style.cssText = `transform: translateX(${distance * dir}px)`
            items[items.length-1 - i].style.cssText = `transform: translateX(${distance * dir}px)`
            distance += advanceBy(items)
        }
    }

    const rotateItems = (items, maxDegree, origin) => {

        const reduceBy = items => (maxDegree * 2) / (items.length === 1 ? 2 : items.length- 1)
        const position = (origin === 'left' ? -1 : +1)
        let degree = maxDegree

        items.forEach(i => {
            i.style.cssText = `
                transform: rotate(${degree * position}deg);
                transform-origin: ${origin};
            `
            degree -= reduceBy(items)
        })

    }

    setInterval(() => {
        if(type === 'displace') {
            displaceItems(leftItems, response.hero_items, 'left')
            displaceItems(rightItems, response.hero_items, 'right')
        }
        if(type === 'rotate') {
            rotateItems(leftItems, response.hero_items, 'right')
            rotateItems(rightItems, response.hero_items, 'left')
        }
    }, 500);

}
