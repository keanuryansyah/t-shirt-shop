<?php 

// header php start

if( !isset($_SESSION["logined"]) ) {

    $jumlah = query("SELECT SUM(jumlahcart) AS jumlahitem FROM datacart")[0];

    if( $jumlah["jumlahitem"] == NULL ) {
        $jumlah["jumlahitem"] = 0;
    } else {
        $jumlah = query("SELECT SUM(jumlahcart) AS jumlahitem FROM datacart")[0];
    }
    

} else {
    $uname = $_SESSION["logined"];

    $jumlah = query("SELECT SUM(jumlahcart) AS jumlahitem FROM $uname")[0];

    if( $jumlah["jumlahitem"] == NULL ) {
        $jumlah["jumlahitem"] = 0;
    } else {
        $jumlah = query("SELECT SUM(jumlahcart) AS jumlahitem FROM $uname")[0];
    }

}

// header php end

if( $jumlah["jumlahitem"] !== 0 ) {
    $cekCart = "isi";
} else {
    $cekCart = "kosong";
}



?>


<section id="sectHead">
    <div id="containerHead" class="container">
        <div class="logo">
            <a href="index.php">kenu.co</a>
        </div>
        <div class="menu">
            <div class="menuLink">
                <a href="index.php">home</a>
                <a href="shop.php">shop</a>
                <a href="blog.php">blog</a>
                <a href="about.php">about</a>
                <a href="contact.php">contact</a>
                <span>x</span>
            </div>
            <div class="menuSearch">
                <div class="userProfile">
                    <a href="login.php"><i class="fa-solid fa-user"></i></a>
                    <div class="userProfileLogout">
                        <h4>WELCOME!</h4>
                        <p><?php echo $uname; ?></p>
                        <i class="fa-sharp fa-solid fa-heart"></i>
                        <div class="logOutBtn">
                            <a href="logout.php">log out!</a>
                        </div>
                    </div>
                </div>
                <div class="cartItemHead">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <p><?php echo $jumlah["jumlahitem"]; ?></p>
                </div>
                <div class="burgerMenu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if( isset($_SESSION["logined"]) ) : ?>
    <div class="loginedBro"></div>
<?php endif; ?>

<div class="masihKosongBro">
    <p><?php echo $cekCart; ?></p>
</div>
