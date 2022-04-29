export function flyingIcon(response) {

    const plusAdd = document.querySelector('.plus-add')
    const plusContainer = document.querySelector('.plus-container')

    plusAdd.addEventListener("click", () => {

        const plus = document.createElement('span')
        plus.classList.add('plus')
        plus.style.cssText = `
            background: url(${response.footer.flying_icon}) center/contain;
        `
        plusContainer.appendChild(plus)
        
    });

    setInterval(() => {
        
    }, );

}