window.addEventListener("load", function() {



    // header start js


    let sectHead = this.document.getElementById("sectHead");

    window.addEventListener("scroll", function() {
        let hasil = Math.round(this.scrollY)
        if( hasil >  7) {
            sectHead.style.boxShadow = "0px 4px 3px grey";
        } else {
            sectHead.style.boxShadow = "none";
        }
    })

    // header end js





    // slider start js

    let nextLatest = document.querySelector(".nextLatest");

    let sliderCtn = document.querySelector(".sliderCtn");
    
    let prevLatest = document.querySelector(".prevLatest");
    
    nextLatest.addEventListener("click", function() {
        sliderCtn.scrollLeft += 212;
    })
    
    prevLatest.addEventListener("click", function() {
        sliderCtn.scrollLeft -= 212;
    })

    // slider end js
    

    // love wishlist start js

    let love = document.querySelectorAll(".loveProd i:first-child");


    let loveLast = document.querySelectorAll(".loveProd i:last-child");


    love.forEach(function(lv) {
        lv.addEventListener("click", function() {
            lv.nextElementSibling.classList.add("active");
        })
    })


    loveLast.forEach(function(ll) {
        ll.addEventListener("click", function() {
            ll.classList.remove("active");
        })
    })

    // love wishlist end js



    // ajax best seller start


    // trigger view di klik

    let triggerView = document.querySelectorAll(".viewChild a");

    triggerView.forEach(function(trigView) {
        trigView.addEventListener("click", function() {

            // ambil value data-view
            let dataTrigView = trigView.getAttribute("data-view");

            // ambil harga awalan untuk cek out
            const hargaAwalanProduk = trigView.getAttribute("data-price-awal");

            // kirim value data-view untuk pop up
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if( xhr.readyState == 4 && xhr.status == 200 ) {

                    // ganti sect modall menjadi sect modal
                    let change = document.getElementById("sectModal");
                    change.innerHTML = xhr.responseText;

                    change.className = "active";

                    // close modal
                    let close = document.querySelector(".closeModal");

                    close.addEventListener("click", function() {
                        document.getElementById("sectModal").classList.remove("active");
                    })

                    let cpop = document.getElementById("sectModal");

                    window.addEventListener("click", function(e) {
                        if( e.target == cpop ) {
                            cpop.classList.remove("active");
                        }
                    })

                    // harga item
                    let hargaAwal = document.querySelector(".dolar span:last-child");
                    let hargaDitambah = Number(document.querySelector(".dolar span:last-child").innerText);


                    // +1 item
                    let count = 1;
                    let itemPlus = document.querySelector(".manyProd p:last-child");
                    let jumlahItemNya = document.querySelector(".manyProd p:nth-child(2)"); 
                    let itemKurang = document.querySelector(".manyProd p:first-child");

                    itemPlus.addEventListener("click", function() {
                        count++;
                        jumlahItemNya.innerText = count;
                        if( jumlahItemNya.innerText > 1 ) {
                            itemKurang.style.transform = "translateY(0)";
                        }

                        // harga item ditambah

                        let numb = Number(hargaAwal.innerText) + hargaDitambah;
                        let toFixedNumb = numb.toFixed(2);
                        hargaAwal.innerText = toFixedNumb;
                    })

                    // -1 item
                    itemKurang.addEventListener("click", function() {
                        count--;
                        jumlahItemNya.innerText = count;
                        if( jumlahItemNya.innerText == 1 ) {
                            itemKurang.style.transform = "translateY(200%)";
                        }

                        // harga item dikurang

                        let numbMin = Number(hargaAwal.innerText) - hargaDitambah;
                        let toFixedNumbMin = numbMin.toFixed(2);
                        hargaAwal.innerText = toFixedNumbMin;
                    })


                    // munculin tombol add to cart
                    let sizeOption = document.getElementById("selectSize");

                    sizeOption.addEventListener("change", function() {
                        let valueSize = sizeOption.value;
                        if( valueSize !== "null" ) {
                            document.querySelector(".addToCart span").style.transform = "translateY(0)";
                        } else {
                            document.querySelector(".addToCart span").style.transform = "translateY(100%)";
                        }
                    })

                    // add to cart trigger di klik
                    let addToCartTrigger = document.querySelector(".addToCart span");
                    
                    addToCartTrigger.addEventListener("click", function() {

                        // ambil gambar item
                        let gambarProduk = document.querySelector(".middleCtnModal img").getAttribute("src");

                        // ambil harga item
                        let hargaProduk = document.querySelector(".dolar span:last-child").innerText;

                        // ambil nama item
                        let nameProd = document.querySelector(".keteranganProduk p:first-child").innerText;

                        // ambil jumlah pembelian item
                        let jumlahBeli = document.querySelector(".manyProd p:nth-child(2)").innerText;

                        // ambil size produk
                        let sizeProduk = document.getElementById("selectSize").value;

                        // pertambahan jumlah item cart
                        let toIntJumlahPembelian = Number(jumlahBeli);

                        let jumlahAwal = document.querySelector(".cartItemHead p");
                        jumlahAwal.innerText = Number(jumlahAwal.innerText) + toIntJumlahPembelian;       

                        // masukkan semua ke dalam objek
                        let objekProduk = {
                            gambarproduk : gambarProduk,
                            hargaproduk : hargaProduk,
                            namaproduk : nameProd,
                            jumlahbeli : jumlahBeli,
                            hargaawal : hargaAwalanProduk,
                            sizeproduk : sizeProduk,
                        };
                        
                        
                        // ajax 2
                        let http = new XMLHttpRequest();
                        
                        http.onreadystatechange = function() {
                            if( http.readyState == 4 && http.status == 200 ) {
                                // ganti sect list cart
                                let sectListCart = document.getElementById("sectListCart");

                                let httpResponse = http.responseText;
                                
                                // simpan hasil ajax kedalam localstorage
                                localStorage.setItem("response", httpResponse);
                                
                                // ganti list item dengan hasil ajax
                                sectListCart.innerHTML = httpResponse;    

                                // to fixed all total price
                                let totalPrice = document.querySelector(".totalPriceAllItem span:last-child");
                                let toNumbTotalPrice = Number(totalPrice.innerText).toFixed(2);
                                totalPrice.innerText = toNumbTotalPrice;

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

                                
                                // co now dipencet
                                let coNow = document.querySelector(".buttonCoNow a");
                                coNow.addEventListener("click", function() {
                                    let coKosong = localStorage.getItem("cokosong");
                                    if(coKosong) {
                                        localStorage.removeItem("cokosong");
                                    }
                                })

                                
                            }

                        }

                        http.open("POST", "listcartbaru.php?objekProduk=" + JSON.stringify(objekProduk), true);
                        http.send();

                        // ajax 3 pop up cart added

                        let popadd = new XMLHttpRequest();

                        popadd.onreadystatechange = function() {
                            if( popadd.readyState == 4 && popadd.status == 200 ) {
                                let changeAdded = document.getElementById("addedToCart");

                                changeAdded.innerHTML = popadd.responseText;

                                changeAdded.className = "active";

                                let viewCartAdded = document.querySelector(".viewAndContTrig p:first-child");

                                viewCartAdded.addEventListener("click", 
                                function() {

                                    // sect modal inactive
                                    document.getElementById("sectModal").classList.remove("active");

                                    // ilangin added to cart pop up
                                    changeAdded.classList.remove("active");

                                    // ilangin pop up modal
                                    document.getElementById("sectModal").classList.remove("active");

                                    // munculin list cart
                                    document.querySelector("#sectListCart").className = "active";
                                    document.querySelector(".listCartContainer").classList.add("active");

                                    // ilangin list cart
                                    let closeCart = document.querySelector(".closeYourCart");
        
                                    closeCart.addEventListener("click", function() {
                                        document.querySelector(".listCartContainer").classList.remove("active");
                                        document.getElementById("sectListCart").classList.remove("active");
                                    })

                                    window.addEventListener("click", function(cl) {
                                        let clist = document.getElementById("sectListCart");

                                        if( cl.target == clist ) {
                                            clist.classList.remove("active");
                                            document.querySelector(".listCartContainer").classList.remove("active");
                                        }
                                    })

                                    
                                })

                                let continueShopping = document.querySelector(".viewAndContTrig p:last-child");

                                continueShopping.addEventListener("click", function() {
                                    // ilangin added to cart pop up
                                    document.getElementById("addedToCart").classList.remove("active");

                                    // ilangin pop up modal
                                    document.getElementById("sectModal").classList.remove("active")
                                })

                            }
                        }
                        
                        popadd.open("POST", "ajax3.php?nama=" + nameProd, true);
                        popadd.send();
                        
                    })
                    
                }
            }

            xhr.open("POST", "ajax.php?nameprod=" + dataTrigView, true);
            xhr.send();

        })
    })
          
    
    let response = localStorage.getItem("response");
    if( response ) {

        document.getElementById("sectListCart").innerHTML = response;

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



    // ajax best seller end
    
    // cart icon di klik
    let menuLink = document.querySelector(".menuLink");

    let klikIconCart = document.querySelector(".cartItemHead i");
    klikIconCart.addEventListener("click", function() {
        

        if( menuLink.classList.contains("active") ) {
            menuLink.classList.remove("active");
        }

        let sectListCart = document.getElementById("sectListCart");
        let listCartContainer = document.querySelector(".listCartContainer");

        
        // munculin list cart item

        sectListCart.className = "active";
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
        
        
        
        
        
        
    })
    
    // cart icon klik end
    
    
    
    let loginedBro = document.querySelector(".loginedBro");
    let masihKosongBro = document.querySelector(".masihKosongBro p").innerText;

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


    
    



        
    
    
    
    
    
    
    
    




    


    

 



    

    

    

    

    
    
        
    





    


    











})

