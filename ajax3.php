<?php 

if( isset ($_GET["nama"]) ) {
    $nama = $_GET["nama"];
}



?>

    <div class="boxCtnAdded animate__animated animate__bounceIn">
        <div class="checkIcon">
            <i class="fa-solid fa-check"></i>
        </div>
        <h4><?php echo $nama ?></h4>
        <p>Added to cart!</p>
        <div class="viewAndContTrig">
            <p>View cart</p>
            <p>Continue shopping</p>
        </div>
    </div>
</section>