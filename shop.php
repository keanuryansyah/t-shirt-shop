<?php 

$title = "SHOP";
$style = "css/shop.css";

require "headers.php";


$bestSell = query("SELECT * FROM allkeanu");


?>

<body>
    
<?php include "header.php"; ?>

<section id="kategoriShop">
    <div class="kategoriShopCtnPr container">
        <div class="isiKategoriShop">
            <div class="kategoriShopCtn">
                <button type="button" class="active">all products</button>
                <button type="button">women</button>
                <button type="button">men</button>
                <button type="button">accessories</button>
                <button type="button">shoes</button>
            </div>
            <div class="filterProduk">
                <div class="filter">
                    <span><i class="fa-solid fa-sort"></i></span>
                    <span>filter</span>
                </div>
            </div>
        </div>
        <div class="isiFilter">
            <div class="isiFilterCtn">
            <div class="sortBy globalFilter">
                <h4>Sort by</h4>
                <p>Default</p>
                <p>Popularity</p>
                <p>Average rating</p>
                <p>Newness</p>
                <p>Price: Low to High</p>
                <p>Price: Hight to Low</p>
            </div>
            <div class="priceFilter globalFilter">
                <h4>Price</h4>
                <p>All</p>
                <p>$0.00 - $50.00</p>
                <p>$50.00 - $100.00</p>
                <p>$100.00 - $150.00</p>
                <p>$150.00 - $200.00</p>
                <p>$200.00 - $250.00</p>
            </div>
            <div class="colorFilter globalFilter">
                <h4>Color</h4>
                <ul>
                    <li>
                    <input type="radio" name="radioColor" id="radioColor" checked>
                    <label for="radioColor">Black</label>
                    </li>
                    <li>
                    <input type="radio" name="radioColor" id="radioColor">
                    <label for="radioColor">Black</label>
                    </li>
                    <li>
                    <input type="radio" name="radioColor" id="radioColor">
                    <label for="radioColor">Black</label>
                    </li>
                    <li>
                    <input type="radio" name="radioColor" id="radioColor">
                    <label for="radioColor">Black</label>
                    </li>
                    <li>
                    <input type="radio" name="radioColor" id="radioColor">
                    <label for="radioColor">Black</label>
                    </li>
                    <li>
                    <input type="radio" name="radioColor" id="radioColor">
                    <label for="radioColor">Black</label>
                    </li>
                    
                </ul>
            </div>
            <div class="tagsFilter globalFilter">
                <h4>Tags</h4>
                <div class="gridTags">
                    <p>Fashion</p>
                    <p>Lifestyle</p>
                    <p>Denim</p>
                    <p>Streetstyle</p>
                    <p>Crafts</p>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>


<section id="sectionBestSell">
        <div id="bestSellCtn" class="container">
            
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
    </section>

    <!-- best seller end -->



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







    <!-- modal popup -->


    <section id="sectModal">

    </section>

    <!-- modal pop up end -->

    <!-- added to cart! -->

    <div id="addedToCart">

    </div>



    



<?php 

include "footer.php";




?>


    <script>
        <?php include "js/shop.js"; ?>
        <?php include "js/function.js"; ?> 
    </script>
    
</body>
</html>