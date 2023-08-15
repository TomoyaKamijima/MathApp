const formula = document.getElementById("textarea");
const txt = document.getElementById("txt");
const btn = document.getElementById("btn");
const clear = document.getElementById("clear");
//const back = document.getElementById("back");
//const submit = document.getElementById("submit");
let mathtxt = "";

window.addEventListener("load", () => {
    mathtxt = localStorage.getItem("math");
    if(mathtxt){
        txt.innerText = mathtxt;
        formula.value = mathtxt;
    }
})

/*
window.addEventListener("load", () => {
    formula.value = "";
    txt.innerText = "";
    localStorage.removeItem('math');
})
*/

btn.addEventListener("click", () => {
     localStorage.setItem("math", formula.value);
     location.reload();
})

/*
btn.addEventListener("click", () => {
    localStorage.setItem("math", formula.value);
    mathtxt = localStorage.getItem("math");
    if(mathtxt){
        txt.innerText = mathtxt;
        formula.value = mathtxt;
    }
})
*/

clear.addEventListener("click", () => {
    formula.value = "";
    txt.innerText = "";
    localStorage.removeItem('math');
})

back.addEventListener("click", () => {
    formula.value = "";
    txt.innerText = "";
    localStorage.removeItem('math');
})

submit.addEventListener("click", () => {
    submit.submit();
    formula.value = "";
    txt.innerText = "";
    localStorage.removeItem('math');
})