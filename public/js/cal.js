const formula = document.getElementById("textarea");
const txt = document.getElementById("txt");
const btn = document.getElementById("btn");
const clear = document.getElementById("clear");
let mathtxt = "";

window.addEventListener("load", () => {
    mathtxt = localStorage.getItem("math");
    if(mathtxt){
        txt.innerText = mathtxt;
        formula.value = mathtxt;
    }
})

btn.addEventListener("click", () => {
     localStorage.setItem("math", formula.value);
     location.reload();
})

clear.addEventListener("click", () => {
    formula.value = "";
    txt.innerText = "";
    localStorage.removeItem('math');
})