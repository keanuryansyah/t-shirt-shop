function burgerKlik(menuLink, changeBurgerTrigger, cartItemHead) {
    
    let element = menuLink;

    element.classList.toggle("active");

    let burgerTrigger = changeBurgerTrigger;

    let satu = burgerTrigger.querySelector("div:first-child")
    let dua = burgerTrigger.querySelector("div:nth-child(2)")
    let tiga = burgerTrigger.querySelector("div:last-child")

    let close = element.querySelector("span");
    close.addEventListener("click", function() {
        element.classList.remove("active");

        satu.style.transform = "rotate(0)";
        satu.style.top = "0";
        dua.style.display = "block";
        tiga.style.transform = "rotate(0)";
        tiga.style.top = "0";

    })



    if( element.classList.contains("active") ) {

        satu.style.transform = "rotate(45deg)";
        satu.style.top = "4px";
        dua.style.display = "none";
        tiga.style.transform = "rotate(-45deg)";
        tiga.style.top = "-4px";

    } else {
        satu.style.transform = "rotate(0)";
        satu.style.top = "0";
        dua.style.display = "block";
        tiga.style.transform = "rotate(0)";
        tiga.style.top = "0";
    }

    let cartIkon = cartItemHead;
    cartIkon.addEventListener("click", function() {
        if( !element.classList.contains("active") ) {
            satu.style.transform = "rotate(0)";
            satu.style.top = "0";
            dua.style.display = "block";
            tiga.style.transform = "rotate(0)";
            tiga.style.top = "0";
        }
    })

}


function delOneRow(trigDel) {

    // ketika tombol delete di klik ambil attribute data id
    let dataid = trigDel.getAttribute("data-id");

    // manipulasi cart child
    let itemCartChild = document.querySelectorAll(".itemCartChild");

    for( let itemCart of itemCartChild ) {

        if( trigDel.parentElement.parentElement.parentElement.parentElement == itemCart ) {
    
            itemCart.classList.add("active");
    
        }

    }


    // ambil total harga cart
    let totalPriceAllItem = document.querySelector(".totalPriceAllItem span:last-child");
    totalToNumb = Number(totalPriceAllItem.innerText);
    
    // ambil total item cart 
    let cartItemHeadMany = document.querySelector(".cartItemHead p");
    let toNumbCartItemMany = Number(cartItemHeadMany.innerText);


    setTimeout(function() {

        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if( xhr.readyState == 4 && xhr.status == 200 ) {
                
                let priceProductItemDelete = document.querySelectorAll(".priceProductItem span:last-child");
                
                for( let priceProdDel of priceProductItemDelete ) {
                    
                    if( priceProdDel.parentElement.parentElement.parentElement.parentElement == trigDel.parentElement.parentElement.parentElement.parentElement ) {
                        
                        let toNumbPriceProdDel = Number(priceProdDel.innerText);
                        let numb = totalToNumb - toNumbPriceProdDel;
                        let hasil = numb.toFixed(2);
                        
                        totalPriceAllItem.innerText =  hasil;
                        
                    } 
                }

                let numberItem = document.querySelectorAll(".numberItem span:nth-child(2)");
                for( let numbIt of numberItem ) {

                    if( numbIt.parentElement.parentElement.parentElement.parentElement.parentElement == trigDel.parentElement.parentElement.parentElement.parentElement ) {

                        let numbItResult = Number(numbIt.innerText);
                        cartItemHeadMany.innerText = toNumbCartItemMany - numbItResult;

                        trigDel.parentElement.parentElement.parentElement.parentElement.remove();

                        let itemKosong = Number(cartItemHeadMany.innerText);

                        if( itemKosong === 0 ) {

                           let http = new XMLHttpRequest();
                           http.onreadystatechange = function() {

                            if( http.readyState == 4 && http.status == 200 ) {

                                localStorage.setItem("response", http.responseText);
                                let sectListCart = document.getElementById("sectListCart");
                                sectListCart.innerHTML = http.responseText;

                                let listCartContainer = document.querySelector(".listCartContainer");
                                listCartContainer.classList.add("active");

                                // ilangin list cart item
                                document.querySelector(".closeYourCart").addEventListener("click", function() {
                                    sectListCart.classList.remove("active");
                                    listCartContainer.classList.remove("active");
                                })

                                window.addEventListener("click", function(ev) {
                                    if( ev.target == sectListCart ) {
                                        sectListCart.classList.remove("active");
                                        listCartContainer.classList.remove("active");
                                    }
                                })

                            }

                           }

                           http.open("GET", "liscartkosong.php", true);
                           http.send();

                            return false;

                        }

                    }

                }




                localStorage.setItem("response", xhr.responseText);
                
            }
        }
    
        xhr.open("POST", "listcartbaru.php?dataid=" + dataid, true);
        xhr.send();
        
    }, 1500)




}

function tambahItem(trigPlus) {

    let cartItemHeadMany = document.querySelector(".cartItemHead p");
    cartItemHeadMany.innerText = Number(cartItemHeadMany.innerText) + 1;


    let objUpdate = {};

    let idProduct = trigPlus.getAttribute("data-id");

    objUpdate.idproduk = idProduct;

    let priceAwal = trigPlus.getAttribute("price-awal");

    let transparentBg = document.querySelector(".transparentBg");
    transparentBg.classList.add("active");

    setTimeout(function() {
        transparentBg.classList.remove("active");

        let totalPriceAllItems = document.querySelector(".totalPriceAllItem span:last-child");
        let pertambahanTotal = Number(totalPriceAllItems.innerText) + Number(priceAwal);
        totalPriceAllItems.innerText = pertambahanTotal.toFixed(2);

    }, 2500)


    let manyItemPlus = trigPlus.previousElementSibling;
    manyItemPlus.innerText = Number(manyItemPlus.innerText) + 1;

    let hasilAkhir;
    
    
    let priceAwalCartChilds = document.querySelectorAll(".priceProductItem span:last-child");
    for( let priceAwalCartChild of priceAwalCartChilds ) {
        
        if( priceAwalCartChild.parentElement.parentElement.parentElement == trigPlus.parentElement.parentElement.parentElement.parentElement ) {
            
            let pricePlus = priceAwalCartChild;
            let innerBaru = Number(pricePlus.innerText) + Number(priceAwal);
            hasilAkhir = pricePlus.innerText = innerBaru.toFixed(2);
            
            
            
        }
        
    }
    
    objUpdate.manyitem = 1;
    objUpdate.hasilprice = hasilAkhir;

    


    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {

            localStorage.setItem("response", xhr.responseText);


        }
    }

    xhr.open("POST", "listcartbaru.php?updateDataPlus=" + JSON.stringify(objUpdate), true);
    xhr.send();
    
    
    
    


    
}


function kurangItem(trigMin) {

    let cartItemHeadMany = document.querySelector(".cartItemHead p");
    cartItemHeadMany.innerText = Number(cartItemHeadMany.innerText) - 1;

    let manyItemMin = trigMin.nextElementSibling;
    manyItemMin.innerText = Number(manyItemMin.innerText) - 1;

    let toNumbManyItem = Number(manyItemMin.innerText);
    
    if( toNumbManyItem === 0 ) {

        let deleteIkon = document.querySelectorAll(".deleteIcon i");
        for( let delIkon of deleteIkon ) {

            if( delIkon.parentElement.parentElement.parentElement.parentElement == trigMin.parentElement.parentElement.parentElement.parentElement.parentElement ) {

                trigMin = delIkon;

                delOneRow(trigMin);

                return false;


            }

        }

    }

    let objUpdate = {};

    let idProduct = trigMin.getAttribute("data-id");

    objUpdate.idproduk = idProduct;

    let priceAwal = trigMin.getAttribute("price-awal");

    let transparentBg = document.querySelector(".transparentBg");
    transparentBg.classList.add("active");

    setTimeout(function() {
        transparentBg.classList.remove("active");

        let totalPriceAllItems = document.querySelector(".totalPriceAllItem span:last-child");
        let penguranganTotal = Number(totalPriceAllItems.innerText) - Number(priceAwal);
        totalPriceAllItems.innerText = penguranganTotal.toFixed(2);

    }, 2500)




    let hasilAkhir;
    
    
    let priceAwalCartChilds = document.querySelectorAll(".priceProductItem span:last-child");
    for( let priceAwalCartChild of priceAwalCartChilds ) {
        
        if( priceAwalCartChild.parentElement.parentElement.parentElement == trigMin.parentElement.parentElement.parentElement.parentElement ) {
            
            let priceMin = priceAwalCartChild;
            let innerBaru = Number(priceMin.innerText) - Number(priceAwal);
            hasilAkhir = priceMin.innerText = innerBaru.toFixed(2);
            
            
            
        }
        
    }
    
    objUpdate.manyitem = 1;
    objUpdate.hasilprice = hasilAkhir;

    


    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {

            localStorage.setItem("response", xhr.responseText);


        }
    }

    xhr.open("POST", "listcartbaru.php?updateDataMin=" + JSON.stringify(objUpdate), true);
    xhr.send();
    
    
    
    


    
}


