console.log("hello");

let txt = document.getElementById("calPlace");
let txtdisplay = document.getElementById("calDisplay");
let btn = document.getElementById("calBtn");

btn.addEventListener('click', ()=>{
    txtdisplay.textContent = txt.value;
})