<?php 

require "functions.php";

if( isset($_GET["nameprod"]) ) {
    $value = $_GET["nameprod"];
    $isi = query("SELECT * FROM allkeanu where nameprod = '$value' ");
}




?>

    <div class="sectCtn">

                <?php foreach( $isi as $is ): ?>

                <div class="leftCtnModal">
                    <img src="img/<?php echo $is["imageprod"]; ?>" alt="">
                    <img src="img/women1.jpg" alt="">
                    <img src="img/women2.jpg" alt="">
                </div>
                
                <div class="middleCtnModal">
                    <img src="img/<?php echo $is["imageprod"]; ?>" alt="">
                </div>

                <div class="rightCtnModal">

                    <div class="keteranganProduk">
                    <p><?php echo $is["nameprod"]; ?></p>
                    <div class="dolar">
                        <span>$</span>
                        <span><?php echo $is["priceprod"]; ?></span>
                    </div>
                    <p><?php echo $is["descprod"]; ?></p>
                    </div>

                <?php endforeach; ?>

                    <div class="size">
                        <label for="size" id="size">size</label>
                        <select name="selectSize" id="selectSize">
                            <option value="null" selected>Choose an option</option>
                            <option value="L">L</option>
                            <option value="S">S</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                    </div>
                    
                    <div class="color">
                        <label for="color" id="color">color</label>
                        <select name="selectColor" id="selectColor">
                            <option value="Blue navy" selected>Blue navy</option>
                            <option value="Light green">Light green</option>
                            <option value="Dark grey">Dark grey</option>
                            <option value="Maroon">Maroon</option>
                        </select>
                    </div>

                    <div class="manyProd">
                        <p>-</p>
                        <p>1</p>
                        <p>+</p>
                    </div>

                    <div class="addToCart">
                        <span>ADD TO CART</span>
                    </div>

                    <div class="logoSosmed">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-square-instagram"></i>
                    </div>

                    <div class="closeModal">
                        <p>X</p>
                    </div>

                </div>

            

    </div>

    

</div>


