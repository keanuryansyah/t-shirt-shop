// header start js


let sectHead = this.document.getElementById("sectHead");

window.addEventListener("scroll", function() {
    let hasil = Math.round(this.scrollY)
    if( hasil >  7) {
        sectHead.style.boxShadow = "0px 2px 3px grey";
    } else {
        sectHead.style.boxShadow = "none";
    }
})


    // header end js




// ikon cart di klik

let cartKlik = document.querySelector(".cartItemHead i");

let lcs = localStorage.getItem("response");

    if( lcs ) {
        document.getElementById("sectListCart").innerHTML = lcs;
        let cekotTrigger = document.querySelector(".buttonCoNow a");
        
        if( cekotTrigger != null ) {
            cekotTrigger.addEventListener("click", function() {
                let cokosong = localStorage.getItem("cokosong");

                if( cokosong ) {
                    localStorage.removeItem("cokosong")
                }

            })
        }

        // tombol delete di klik
        let trigDelFromListCart = document.querySelectorAll(".deleteIcon i");
        for( let trigDel of trigDelFromListCart ) {
            trigDel.addEventListener("click", function() {
                delOneRow(trigDel);
            })

        }

        // tombol plus dipencet
        let triggerPlusItem = document.querySelectorAll(".numberItem span:last-child");
        for( let trigPlus of triggerPlusItem ) {

            trigPlus.addEventListener("click", function() {

                tambahItem(trigPlus);

            })

        }

        // tombol min dipencet
        let triggerMinItem = document.querySelectorAll(".numberItem span:first-child");
        for( let trigMin of triggerMinItem ) {

            trigMin.addEventListener("click", function() {

                kurangItem(trigMin);

            })

        }

    }

let menuLink = document.querySelector(".menuLink");

cartKlik.addEventListener("click", function() {

    if( menuLink.classList.contains("active") ){
        menuLink.classList.remove("active");
    }
    
    let sectListCart = document.getElementById("sectListCart");

    sectListCart.className = "active";

    let cartCtn = document.querySelector(".listCartContainer");
    cartCtn.classList.add("active")
    
    window.addEventListener("click", function(ev) {
        if( ev.target == sectListCart ) {
            sectListCart.classList.remove("active");
            cartCtn.classList.remove("active");
        }
    })

    document.querySelector(".closeYourCart").addEventListener("click", function() {
        sectListCart.classList.remove("active");
        cartCtn.classList.remove("active");
    })



})


    let loginedBro = document.querySelector(".loginedBro");
    
    
    let masihKosongBro = document.querySelector(".masihKosongBro p").innerText;
    console.log(masihKosongBro);

    
    if( loginedBro !== null ) {

        let profileTrigger = document.querySelector(".userProfile a:first-child");
        
        profileTrigger.addEventListener("click", function(ev) {
            ev.preventDefault();
            let userProfileLogOut = document.querySelector(".userProfileLogout");
            userProfileLogOut.classList.toggle("active");
        })
        
        let logOutBtn = document.querySelector(".logOutBtn a");
        logOutBtn.addEventListener("click", function() {
            localStorage.removeItem("response");
        })
        
    }

    if( loginedBro !== null ) {

        if( masihKosongBro !== "kosong" ) {
            let userProfileName = document.querySelector(".userProfileLogout p").innerText;
            
            let xhr = new XMLHttpRequest();
            
            xhr.onreadystatechange = function() {
                if( xhr.readyState == 4 && xhr.status == 200 ) {
                    
                    let hasilAjax = xhr.responseText;
                    document.getElementById("sectListCart").innerHTML = hasilAjax;
    
                    document.querySelector(".buttonCoNow a").addEventListener("click", function() {
                        localStorage.removeItem("cokosong");
                    })

                    // tombol delete di klik
                    let trigDelFromListCart = document.querySelectorAll(".deleteIcon i");
                    for( let trigDel of trigDelFromListCart ) {
                        trigDel.addEventListener("click", function() {
                            delOneRow(trigDel);
                        })

                    }

                    // tombol plus dipencet
                    let triggerPlusItem = document.querySelectorAll(".numberItem span:last-child");
                    for( let trigPlus of triggerPlusItem ) {

                        trigPlus.addEventListener("click", function() {

                            tambahItem(trigPlus);

                        })

                    }

                    // tombol min dipencet
                    let triggerMinItem = document.querySelectorAll(".numberItem span:first-child");
                    for( let trigMin of triggerMinItem ) {

                        trigMin.addEventListener("click", function() {

                            kurangItem(trigMin);

                        })

                    }
                    
                }
            }
            
            xhr.open("POST", "listcartlogin.php?username=" + userProfileName, true);
            xhr.send();
        } else {
            let xhr = new XMLHttpRequest();
        
            xhr.onreadystatechange = function() {
                if( xhr.readyState == 4 && xhr.status == 200 ) {
                    
                    let hasilAjax = xhr.responseText;
                    document.getElementById("sectListCart").innerHTML = hasilAjax;
                    
                }
            }
            
            xhr.open("GET", "liscartkosong.php", true);
            xhr.send();
        }

    }


    let burgerMenu = document.querySelector(".burgerMenu");
    let cartIkon = document.querySelector(".cartItemHead i");
    burgerMenu.addEventListener("click", function() {

        let changeBurgerTrigger = burgerMenu;
        
        burgerKlik(menuLink, changeBurgerTrigger,cartIkon);

})
    

    
    