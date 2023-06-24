<?php 

require "functions.php";

if( isset ($_GET["nameprod"]) ) {
    $hasil = $_GET["nameprod"];

    $bestSell = query("SELECT * FROM allkeanu WHERE categoriesprod = '$hasil' ");

    if( $hasil == "all products" ) {
        $bestSell = query("SELECT * FROM allkeanu");
    }

}






?>

        <div id="bestSellCtn" class="container">

            <div class="bestSellCardPr">
                    
                <?php foreach( $bestSell as $bs ) : ?>   

                <div class="bestSellCard animate__animated animate__fadeIn">
                    <div class="imageBestSell">
                        <img src="img/<?php echo $bs ["imageprod"] ?>" alt="">
                        <div class="viewDetPr">
                            <div class="viewChild">
                                <a data-view ="<?php echo $bs["nameprod"]; ?>" data-price-awal="<?php echo $bs["priceprod"]; ?>">view detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="priceBestSell">
                        <div class="namaHarga">
                            <a href=""><?php echo $bs ["nameprod"] ?></a>
                            <p>$<?php echo $bs ["priceprod"] ?></p>
                        </div>
                        <div class="loveProd">
                        <i class="fa-regular fa-heart"></i>
                        <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                </div>
                
                <?php endforeach; ?>

            </div>

            <div class="loadMoreBtn">
                <a href="shop.php">LOAD MORE</a>
            </div>


            
        </div>


    <!-- best seller end -->

    