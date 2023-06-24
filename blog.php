<?php

$title = "BLOG";
$style = "css/blog.css";

require "headers.php";

$isi = query("SELECT * FROM allkeanu ORDER BY RAND() LIMIT 3");



?>


<body>

<?php include "header.php"; ?>

<section id="blogBanner">
    <div class="bannerCtn">
        <h2>BLOG</h2>
    </div>
</section>

<section id="sectionBlogWr">
    <div class="sectionBlogCtn container">
        <div class="blogLeftCtn">
            <div class="ctn">
                <div class="imageCtn">
                    <img src="img/blogImage1.jpg" alt="">
                </div>
                <div class="kalender">
                    <h5>3</h5>
                    <p>mei 2023</p>
                </div>
                <div class="textBlogCtn">
                    <a href="detailblog.php">4 cool styles for going to the mall</a>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae aliquam amet pariatur illum facere voluptatibus enim nobis rerum tempore? Ab corporis nostrum omnis aliquid totam!</p>
                    <span class="author">
                        <div class="textAuthor">
                            <span>by admin</span>
                            <span>street style, fashion, couple</span>
                            <span>14 comments</span>
                        </div>
                        <div class="linkAuthor">
                        <a href="">continue reading</a>
                        </div>
                    </span>
                </div>
            </div>

            <div class="ctn">
                <div class="imageCtn">
                    <img src="img/blogImage2.jpg" alt="">
                </div>
                <div class="kalender">
                    <h5>3</h5>
                    <p>mei 2023</p>
                </div>
                <div class="textBlogCtn">
                    <a href="detailblog.php">4 cool styles for going to the mall</a>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae aliquam amet pariatur illum facere voluptatibus enim nobis rerum tempore? Ab corporis nostrum omnis aliquid totam!</p>
                    <span class="author">
                        <div class="textAuthor">
                            <span>by admin</span>
                            <span>street style, fashion, couple</span>
                            <span>14 comments</span>
                        </div>
                        <div class="linkAuthor">
                        <a href="">continue reading</a>
                        </div>
                    </span>
                </div>
            </div>

            <div class="ctn">
                <div class="imageCtn">
                    <img src="img/blogImage3.jpg" alt="">
                </div>
                <div class="kalender">
                    <h5>3</h5>
                    <p>mei 2023</p>
                </div>
                <div class="textBlogCtn">
                    <a href="detailblog.php">4 cool styles for going to the mall</a>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae aliquam amet pariatur illum facere voluptatibus enim nobis rerum tempore? Ab corporis nostrum omnis aliquid totam!</p>
                    <span class="author">
                        <div class="textAuthor">
                            <span>by admin</span>
                            <span>street style, fashion, couple</span>
                            <span>14 comments</span>
                        </div>
                        <div class="linkAuthor">
                        <a href="">continue reading</a>
                        </div>
                    </span>
                </div>
            </div>
        </div>

        <div class="blogRightCtn">
            <div class="search">
                <input type="text" placeholder="Search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="categoriesBlog">
                <h4>categories</h4>
                <ul>
                    <li>
                        <a href="">fashion</a>
                    </li>
                    <li>
                        <a href="">beauty</a>
                    </li>
                    <li>
                        <a href="">street style</a>
                    </li>
                    <li>
                        <a href="">life style</a>
                    </li>
                    <li>
                        <a href="">DIY & crafts</a>
                    </li>
                </ul>
            </div>
            <div class="newStuff">
                <h4>new stuff</h4>

                <?php foreach( $isi as $is ) : ?>
                <div class="newStuffCtn">
                    <img src="img/<?php echo $is["imageprod"]; ?>" alt="">
                    <div class="nameAndPrices">
                        <p><?php echo $is["nameprod"]; ?></p>
                        <p>$ <?php echo $is["priceprod"] ?></p>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
            <div class="archiveBlog">
                <h4>archive</h4>
                <div class="archiveCtn">
                    <ul>
                        <li>
                            <a href="">
                                <span>july 2018</span>
                                <span>(12)</span>
                            </a>
                        </li>
                        <li>   
                            <a href="">
                                <span>june 2018</span>
                                <span>(16)</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span>may 2018</span>
                                <span>(29)</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span>april 2018</span>
                                <span>(54)</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span>march 2018</span>
                                <span>(24)</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span>february 2018</span>
                                <span>(33)</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span>january 2018</span>
                                <span>(62)</span>
                            </a>
                        </li>
                        <li>    
                            <a href="">
                                <span>december 2018</span>
                                <span>(56)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tagsBlog">
            <h4>tags</h4>
            <div class="tagsCtn">
                <p>fashion</p>
                <p>lifestyle</p>
                <p>beauty</p>
                <p>street style</p>
                <p>crafts</p>
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

<?php

require "footer.php";

?>

<script>
    <?php include "js/function.js"; ?>
    <?php include "js/blog.js"; ?>
</script>
    
</body>
</html>