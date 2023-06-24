let triggerMinIncative = document.querySelectorAll(".plusMinItem span:first-child");
for( let trigMinInc of triggerMinIncative ) {

    if( trigMinInc.nextElementSibling.innerText > 1 ) {
        trigMinInc.classList.add("active");
    } else {

        trigMinInc.classList.remove("active");

    }

}


// ambil trigger plus
let triggerPlus = document.querySelectorAll(".plusMinItem span:last-child");
for( let trigPlus of triggerPlus ) {

    // ketika tombol trigger plus di klik
    trigPlus.addEventListener("click", function() {

        let dataIdTrigger = trigPlus.getAttribute("data-id");

        let objPlus = {};

        // ambil jumlah item
        let jumlahItem = Number(trigPlus.previousElementSibling.innerText);
        trigPlus.previousElementSibling.innerText = jumlahItem + 1;

         // ambil many cart item head
         let cartItemHead = document.querySelector(".cartItemHead p");
         cartItemHead.innerText = Number(cartItemHead.innerText) + 1;

        if( trigPlus.previousElementSibling.innerText > 1 ) {
            trigPlus.previousElementSibling.previousElementSibling.classList.add("active");
        }

        objPlus.idproduk = dataIdTrigger;
        objPlus.manyitem = 1;

        // ambil harga awal
        let hargaDefaults = trigPlus.parentElement.parentElement.previousElementSibling;
        let hargaDefault = Number(hargaDefaults.querySelector(".hargaAwal span:last-child").innerText);
        
        // ambil harga asli
        let hargaItemNya = document.querySelectorAll(".harganya");
        for( let hargaItem of hargaItemNya ) {

            if( hargaItem.parentElement.parentElement.parentElement == trigPlus.parentElement.parentElement.parentElement ) {

                // tambahkan harga
                let priceMin = Number(hargaItem.innerText) + hargaDefault;
                hargaItem.innerText = priceMin.toFixed(2);
                
                objPlus.hasilprice = hargaItem.innerText;

                let xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if( xhr.readyState == 4 && xhr.status == 200 ) {

                        // ganti harga subtotal dan harga checkout
                        let subTototalPrice = document.querySelector(".isiDolar");
                        let fixedSubTotal = hargaDefault + Number(subTototalPrice.innerText);
                        subTototalPrice.innerText = fixedSubTotal.toFixed(2)

                        let totalCheckout = document.querySelector(".hasilTotal");
                        let fixedPrice = Number(totalCheckout.innerText) + hargaDefault
                        totalCheckout.innerText = fixedPrice.toFixed(2);

                    }
                }

                xhr.open("POST", "checkout.php?updateDataPlus=" + JSON.stringify(objPlus), true);
                xhr.send();

            }

        }
        

    })

}


let triggerMin = document.querySelectorAll(".plusMinItem span:first-child");
for( let trigMin of triggerMin ) {

    // ketika tombol trigger plus di klik
    trigMin.addEventListener("click", function() {

        let dataIdTrigger = trigMin.getAttribute("data-id");

        let objMin = {};

        // ambil jumlah item
        let jumlahItem = Number(trigMin.nextElementSibling.innerText);
        trigMin.nextElementSibling.innerText = jumlahItem - 1;

        // ambil many cart item head
        let cartItemHead = document.querySelector(".cartItemHead p");
        cartItemHead.innerText = Number(cartItemHead.innerText) - 1;

        if( trigMin.nextElementSibling.innerText == 1 ) {
            trigMin.classList.remove("active");
        }

        if( trigMin.nextElementSibling.innerText == 0 ) {

            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if( xhr.readyState == 4 && xhr.status == 200 ) {

                    trigMin.parentElement.parentElement.parentElement.remove();

                    return false;

                }
            }

            xhr.open("POST", "checkout.php?dataid=" + dataIdTrigger, true);
            xhr.send();

        }

        objMin.idproduk = dataIdTrigger;
        objMin.manyitem = 1;

        // ambil harga awal
        let hargaDefaults = trigMin.parentElement.parentElement.previousElementSibling;
        let hargaDefault = Number(hargaDefaults.querySelector(".hargaAwal span:last-child").innerText);
        
        // ambil harga asli
        let hargaItemNya = document.querySelectorAll(".harganya");
        for( let hargaItem of hargaItemNya ) {

            if( hargaItem.parentElement.parentElement.parentElement == trigMin.parentElement.parentElement.parentElement ) {

                // tambahkan harga
                let priceMin = Number(hargaItem.innerText) - hargaDefault;
                hargaItem.innerText = priceMin.toFixed(2);
                
                objMin.hasilprice = hargaItem.innerText;

                let xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if( xhr.readyState == 4 && xhr.status == 200 ) {

                        // ganti harga subtotal dan harga checkout
                        let subTototalPrice = document.querySelector(".isiDolar");
                        let fixedSubTotal = Number(subTototalPrice.innerText) - hargaDefault;
                        subTototalPrice.innerText = fixedSubTotal.toFixed(2)

                        let totalCheckout = document.querySelector(".hasilTotal");
                        let fixedPrice = Number(totalCheckout.innerText) - hargaDefault
                        totalCheckout.innerText = fixedPrice.toFixed(2);

                    }
                }

                xhr.open("POST", "checkout.php?updateDataMin=" + JSON.stringify(objMin), true);
                xhr.send();

            }

        }
        

    })

}









// ambil trigger delete
let triggerDelete = document.querySelectorAll(".tableData td:nth-child(5) p i");

for( let trigDell of triggerDelete ) {

    // trigger delete di klik

    trigDell.addEventListener("click", function() {

        // ambil data-id
        let dataId = trigDell.getAttribute("data-id");
        console.log(dataId)

        // ambil many cart item head
        let cartItemHead = document.querySelector(".cartItemHead p");
        cartItemHead.innerText = Number(cartItemHead.innerText) - Number(trigDell.parentElement.parentElement.previousElementSibling.querySelector(".plusMinItem span:nth-child(2)").innerText)
        
        // ambil semua element yang satu row dengan trigger delete
        let allRows = document.querySelectorAll(".tableData");
        for( let oneRow of allRows ) {

            if( oneRow == trigDell.parentElement.parentElement.parentElement ) {
                oneRow.remove();
            }

        }


        
        // kirim data-id untuk dihapus
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if( xhr.readyState == 4 && xhr.status == 200 ) {

                let totalBayar = document.querySelector(".hasilTotal");

                let hargaItem = Number(trigDell.parentElement.parentElement.nextElementSibling.querySelector(".harganya").innerText);
                let newPrice = Number(totalBayar.innerText) - hargaItem;
                totalBayar.innerText = newPrice.toFixed(2);

                let subtotalWr = document.querySelector(".subTotalWr span:last-child");
                let newSubTotal = Number(subtotalWr.innerText) - hargaItem;
                subtotalWr.innerText = newSubTotal.toFixed(2);

                if( totalBayar.innerText == 0 ) {
                    
                    let http = new XMLHttpRequest();
                    http.onreadystatechange = function() {

                        if( http.readyState == 4 && http.status == 200 ) {

                            let sectionTable = document.getElementById("sectionTable");

                            localStorage.setItem("cokosong", http.responseText);

                            sectionTable.innerHTML = http.responseText

                            let cartItemHead = document.querySelector(".cartItemHead p");
                            cartItemHead.innerHTML = 0;

                        }

                    }

                    http.open("GET", "cokosong.php", true);
                    http.send();

                    localStorage.removeItem("response");

                }
            }
        }

        xhr.open("POST", "checkout.php?dataid=" + dataId, true);
        xhr.send();

    })
}