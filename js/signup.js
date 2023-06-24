let berhasil = document.querySelector(".berhasil");
if( berhasil !== null ) {
    let popUpSuksesPr = document.querySelector(".popUpSuksesPr");
    popUpSuksesPr.classList.add("active");
    let popUpSukses = document.querySelector(".popUpSukses");
    popUpSukses.classList.add("active");

    let triggerDismiss = document.querySelector(".popUpSukses p");

    triggerDismiss.addEventListener("click", function() {
        popUpSuksesPr.classList.remove("active");
        popUpSukses.classList.remove("active");
    })

}

let hoverLock = document.querySelector(".signUpText i");
hoverLock.addEventListener("mouseover", function() {
    let enkripText = document.querySelector(".enkripsi");
    enkripText.style.display = "flex";

    hoverLock.addEventListener("mouseout", function() {
        enkripText.style.display = "none";
    })

})


let buttonAcc = document.getElementById("buttonSignUp");
buttonAcc.disabled = true;

let checkBoxAcc = document.getElementById("acc");
checkBoxAcc.addEventListener("click", function() {
    let checkFalseValue = checkBoxAcc.getAttribute("value");
    if( checkFalseValue == "false" ) {
        checkBoxAcc.removeAttribute("value");
        checkBoxAcc.setAttribute("value", "true");
    } else {
        checkBoxAcc.removeAttribute("value");
        checkBoxAcc.setAttribute("value", "false");
    }

    if( checkBoxAcc.value == "true" ) {
        buttonAcc.disabled = false;
        buttonAcc.className = "active";
    } else {
        buttonAcc.disabled = true;
        buttonAcc.classList.remove("active");
    }

})