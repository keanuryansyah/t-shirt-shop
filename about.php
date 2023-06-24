<?php 

$title = "ABOUT";
$style = "css/about.css";

require "headers.php";


?>

<body>

<?php require "header.php"; ?>

<section id="aboutSect">

    <div class="headerAboutCtn">
        <h2>ABOUT</h2>
    </div>

    <div id="aboutCtnPr" class="container">
        <div class="topCtn globalCtn">
            <div class="textTopCtn globalText">
                <h4>our story</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos dicta vel tempora minus laudantium labore perspiciatis eum ipsa? Adipisci voluptatum illo voluptatibus quo vero quod tempore id architecto asperiores repellat, aspernatur cumque aperiam ea eligendi Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores, beatae.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe exercitationem, praesentium amet excepturi illo nobis iste esse itaque optio explicabo placeat ex, est molestiae aut! Officia deleniti quasi velit neque. Quasi soluta nemo unde blanditiis libero ea debitis fuga quos.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita sequi blanditiis non! Quia, explicabo! Eaque.</p>
            </div>
            <div class="imagePr">
                <div class="imageChild">
                    <img src="img/women2.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="bottomCtn globalCtn">
            <div class="imagePr">
                <div class="imageChild">
                    <img src="img/sepatu1.jpg" alt="">
                </div>
            </div>
            <div class="textBottomCtn globalText">
                <h4>our mission</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos dicta vel tempora minus laudantium labore perspiciatis eum ipsa? Adipisci voluptatum illo voluptatibus quo vero quod tempore id architecto asperiores repellat, aspernatur cumque aperiam ea eligendi Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum sunt, rem dignissimos ullam fuga hic.</p>
                <div class="word">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum temporibus, nam quos voluptates dicta in harum veritatis neque, illum cumque ipsam, mollitia iste porro natus alias tempora eligendi corporis quisquam!</p>
                    <p>-kenu</p>
                </div>
            </div>
        </div>
    </div>
</section>

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



<?php require "footer.php"; ?>

<script>
    <?php include "js/function.js"; ?>
    <?php include "js/blog.js"; ?>
</script>
    
</body>
</html>