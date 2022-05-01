export default {
    blink: (e) => {
        const section = document.querySelector(
            e.target.getAttribute("href") + " h2"
        );
    
        if (!section) return;
    
        section.classList.add("bg-gradient", "text-gradient", "duration-75");
    
        setTimeout(function () {
            section.classList.remove("bg-gradient", "text-gradient");
        }, 1000);
    }
}