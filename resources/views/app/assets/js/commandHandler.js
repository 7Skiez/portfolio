import Typewriter from "typewriter-effect/dist/core";

export function commandHandler(response) {
    const triggerers = document.querySelectorAll(".console img");
    const loadTime = document.querySelector(".console .loadtime");
    const commandBox = document.querySelector(".console .command");
    const outputBox = document.querySelector(".console .output");
    const commandDirectory = document.querySelector(".console .dir");

    // window.onload = function(){
    //     setTimeout(function(){
    //       var t = performance.timing;
    //       console.log(t.loadEventStart - t.connectStart);
    //     }, 0);
    //   }
    var loadingWriter = new Typewriter(loadTime, {
        cursor: '',
        delay: 1
    });

    loadingWriter.pasteString('Portfolio 7.1.3 <br/>Copyright (c) MosbatSaz Corporation.<br/><br/>')

      window.onload = () => setTimeout(() => {

        const loadtime = performance.timing.loadEventStart - performance.timing.connectStart

        loadingWriter.pauseFor(loadtime)
        .pasteString('Loading website took ' + loadtime + 'ms.')
        .pauseFor(50)
        .callFunction(() => {
            commandDirectory.classList.remove('hidden')
            commandDirectory.classList.add('flex')
        })
        .start()
        
        let commandWriter = new Typewriter(commandBox,{})

        commandWriter.start();
    
        triggerers.forEach((triggerer) =>
            triggerer.addEventListener("click", (e) => {
                const triggererCommand = e.target.classList.value;
    
                const output = response.commands.find((command) => command[0] === triggererCommand)[1]
    
                // const output = outputArr.map((v, i) => (i + 1 < outputArr.length) ? v + "<br>" : v).join("")
    
                commandWriter.typeString('<span class="text-orange-300">php</span> artisan ' + triggererCommand).start().pauseFor(750).callFunction(() =>
    
                    new Typewriter(outputBox, { cursor: "", delay: 3 }).pasteString(output).start()
    
                )
            })
        );

    }, 0)

}
