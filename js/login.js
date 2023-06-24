let checked = document.getElementById("seePassword");

checked.addEventListener("click", function() {

    let password = document.getElementById("password")

    if( checked.getAttribute("value") == "true" ) {
        checked.removeAttribute("value");
        checked.setAttribute("value", "false");
        if( checked.getAttribute("value") == "false" ) {
            password.removeAttribute("type");
            password.setAttribute("type", "password");
        }
        return false;
    }

    let checkVal = checked.getAttribute("value")
    if( checkVal == "false" ) {
        checked.removeAttribute("value")
        checked.setAttribute("value", "true")
        if( checked.getAttribute("value") == "true" ) {
            password.removeAttribute("type");
            password.setAttribute("type", "text");
        }
    }
    
})

let buttonSubmit = document.querySelector(".buttonSubmit button");

buttonSubmit.disabled = true;

let passwordWrite = document.getElementById("password");

passwordWrite.addEventListener("keyup", function() {
    let passVal = passwordWrite.value;
    if( passVal.length > 6 ) {
        buttonSubmit.disabled = false;
        buttonSubmit.classList.add("active");
    } else {
        buttonSubmit.disabled = true;
        buttonSubmit.classList.remove("active")
    }
})


