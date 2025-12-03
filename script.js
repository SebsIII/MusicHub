console.log("JS OK")
const title = document.getElementById("main-title")
const subtitle = document.getElementById("main-subtitle")

const aibox = document.getElementById("AIBOX-wrapper")
const aibox_input = document.getElementById("AIBOX-input")
const aibox_btn = document.getElementById("AIBOX-btn")

titleString = "Music is what feelings sound like."
subtitleString = "Discover them now." 

i = 0
addEventListener("DOMContentLoaded", () => {
    interval = setInterval(() => {
        if(i == titleString.length){
            subtitle.innerText = subtitleString
            subtitle.style.opacity = 1
            aibox.style.opacity = 1               
            clearInterval(interval)
        } else {
            title.innerHTML += titleString[i]
            i++
        }}, 45)
})

async function askAI(text) {
  const response = await fetch(
    "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=AIzaSyA2I-ScKBi_g0mImXnyMY8zyXYhMCsiIcw",
    {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        contents: [
          {
            role: "user",
            parts: [{ text: text + "NEVER REPLY ABOUT YOURSELF, DO NOT REPLY IF TOPIC'S OUTSIDE MUSIC" }]
          }
        ]
      }),
    }
  );

  const data = await response.json();
  console.log(data.candidates[0].content.parts[0].text);
}

aibox_btn.addEventListener("click", async () => {
    console.log("clicked")
    askAI(aibox_input.value).then((reply) => {
        aibox_input.value = reply
    })
})



