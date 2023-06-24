<?php 

$title = "HOMEPAGE";
$style = "css/index.css";

include "headers.php";

$latest = query("SELECT * FROM allkeanu ORDER BY nameprod DESC LIMIT 8");

$bestSell = query("SELECT * FROM allkeanu ORDER BY RAND() LIMIT 8");





?>

<body>

    <?php include "header.php"; ?>

    <!-- main hero -->

    <section id="mainHero">
        <div id="mainCtn" class="container">
            <p class="animate__animated animate__rotateInDownLeft">Western culture style</p>
            <h2 class="animate__animated animate__rotateInUpRight animate__delay-1s">New collection with contemporary style</h2>
            <a class="animate__animated animate__rotateIn animate__delay-2s" href="">Shop Now</a>
        </div>
    </section>

    <!-- end main hero -->

    <!-- after main hero -->



    
    
    <section id="sectionAfm">
        <div id="afmCtn" class="container">
            <div class="menCat cat">
                <h2>Men</h2>
                <p>Cool</p>
                <a href="shop.php"></a>
                <div class="shopNow">
                    <p>Shop Now</p>
                </div>
            </div>

            <div class="womenCat cat">
                <h2>Women</h2>
                <p>Beauty</p>
                <a href="shop.php"></a>
                <div class="shopNow">
                    <p>Shop Now</p>
                </div>
            </div>
            <div class="accCat cat">
                <h2>Accecories</h2>
                <p>Accecories</p>
                <a href="shop.php"></a>
                <div class="shopNow">
                    <p>Shop Now</p>
                </div>
            </div>
        </div>
    </section>
    
    
    
    
    <!-- end after main -->
    
    
    
    <!-- latest prod -->
    
    
    <section id="sectionLatestProd">
        <div id="latestProdCtn" class="container">
            <div class="textLatest">
                <h2>The latest and most recent products</h2>
                <div class="shopNowLatest">
                    <a href="">Shop Now</a>
                </div>
            </div>

            <div class="sliderLatest">
                
                <div class="prevLatest">
                        <p>❮</p>
                    </div>
                    
                    <div class="sliderCtn">
                        
                    <?php foreach( $latest as $lat ) : ?>
                        <!-- <img src="img/<?php // echo $lat["imageprod"] ?>" alt=""> -->
                        <?php var_dump($lat); ?>
                        <?php endforeach; ?>
                        
                        
                    </div>
                    
                    <div class="nextLatest">
                        <p>❯</p>
                    </div>
                    
                </div>

            </div>
        </section>
        
        
        <!-- latest prod end -->
        
        <!-- best seller -->
        
        <section id="sectionBestSell">
            <div id="bestSellCtn" class="container">
                
                <div class="textBestSell">
                    <p>Best seller</p>
                </div>
                
                <div class="bestSellCardPr">
                    
                <?php foreach( $bestSell as $bs ) : ?>   
                    
                <div class="bestSellCard">
                    <div class="imageBestSell">
                        <img src="img/<?php echo $bs ["imageprod"] ?>" alt="">
                        <div class="viewDetPr">
                            <div class="viewChild">
                                <a data-view ="<?php echo $bs["nameprod"]; ?>" data-price-awal="<?php echo $bs["priceprod"]; ?>">view detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="priceBestSell">
                        <div class="wrapper">
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
                </div>
                
                <?php endforeach; ?>

            </div>

            <div class="loadMoreBtn">
                <a href="shop.php">LOAD MORE</a>
            </div>


            
        </div>
    </section>

    <!-- best seller end -->


    <!-- list cart start -->

    <section id="sectListCart">
        <div class="listCartContainer">

            <div class="yourCartAndClose">
                <div class="yourCartItem">
                    <h4>your cart</h4>
                </div>
                <div class="closeYourCart">
                    <p>X</p>
                </div>
            </div>

            <div style="display: flex; align-items: center; font-family: 'roboto', sans-serif; font-size: 18px;" class="listCartItemPr">
                <h2>Your shopping cart is empty(0), please shop first.</h2>
            </div>

        </div>
    </section>

    <!-- list cart end -->


    <!-- modal popup -->

    <section id="sectModal">

    </section>

    <!-- modal pop up end -->

    <!-- added to cart! -->

    <div id="addedToCart">

    </div>

    <!-- added to cart end -->







    



<?php

require "footer.php";

?>
 

    
<script>
    <?php include "js/js.js"; ?>
    <?php include "js/function.js"; ?>
</script>
    
</body>
</html>
