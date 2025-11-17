console.log("JS OK")
const title = document.getElementById("main-title")
const subtitle = document.getElementById("main-subtitle")

titleString = "Music is what feelings sound like."
subtitleString = "Discover them now." 

i = 0
addEventListener("DOMContentLoaded", () => {
    interval = setInterval(() => {
        if(i == titleString.length){
            subtitle.innerText = subtitleString
            subtitle.style.opacity = 1
            clearInterval(interval)
        } else {
            title.innerHTML += titleString[i]
            i++
        }}, 45)
})

