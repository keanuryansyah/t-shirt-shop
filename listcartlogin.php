<?php 

require "functions.php";


    if( isset($_GET["username"]) ) {

        $interested = query("SELECT * FROM allkeanu ORDER BY RAND() LIMIT 4");


        $unames = $_GET["username"];
        $isiCartBaru = query("SELECT * FROM $unames");
        $hasil = query("SELECT SUM(hargacart) AS totalsemua FROM $unames ")[0];  
    }





?>

<div class="listCartContainer">
<div class="transparentBg"></div>
            <div class="yourCartAndClose">
                <div class="yourCartItem">
                    <h4>your cart</h4>
                </div>
                <div class="closeYourCart">
                    <p>X</p>
                </div>
            </div>
            <div class="listCartItemPr">
    
                <div class="yourCartItemPr">

                <?php foreach($isiCartBaru as $is) : ?>
                    <div class="itemCartChild">
                        <div class="imageItemCart">
                            <img src="<?php echo $is["imagecart"] ?>" alt="">
                        </div>
                        <div class="itemDetail">
                            <div class="topItemDetail">
                                <div class="nameAndProductCode">
                                    <p><?php echo $is["produkcart"]; ?></p>
                                    <p>kode produk</p>
                                </div>
                                <div class="deleteIcon">
                                    <i class="fa-solid fa-trash" data-id="<?php echo $is["idcart"]; ?>"></i>
                                </div>
                            </div>
                            <div class="bottomItemDetail">
                                <div class="numberItemAndSizePr">
    
                                    <span class="sizeChild"><?php echo $is["sizecart"]; ?></span>
                                    <div class="numberItem">
                                        <span price-awal="<?php echo $is["hargaawal"]; ?>" data-id="<?php echo $is["idcart"]; ?>">-</span>
                                        <span><?php echo $is["jumlahcart"]; ?></span>
                                        <span price-awal="<?php echo $is["hargaawal"]; ?>" data-id="<?php echo $is["idcart"]; ?>">+</span>
                                    </div>
    
                                </div>
                                <div class="priceProductItem">
                                    <span>$</span>
                                    <span><?php echo $is["hargacart"] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="checkOutNowPr">
                <div class="totalCoItem">
                    <div class="totalItemText">
                        <p>TOTAL</p>
                    </div>
                    <div class="totalPriceAllItem">
                        <span>$</span>
                        <span><?php echo $hasil["totalsemua"]; ?></span>
                    </div>
                </div>
                <div class="buttonCoNow">
                   <a href="checkout.php">CHECKOUT NOW</a>
                </div>
            </div>
    
        </div>

