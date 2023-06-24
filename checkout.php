<?php 

ob_start();

$title = "CHECKOUT";
$style = "css/checkout.css";

require "headers.php";

    if( !isset($_SESSION["logined"]) ) {

        $manipulation = "datacart";

        $all = query("SELECT * FROM $manipulation");
        $subTotal = query("SELECT SUM(hargacart) AS alltotals FROM $manipulation ")[0];

        // remove item
        if( isset($_GET["dataid"]) ) {

            $hasil = $_GET["dataid"];
            hapus($hasil);

            $all = query("SELECT * FROM $manipulation");
            $subTotal = query("SELECT SUM(hargacart) AS alltotals FROM $manipulation ")[0];

        }

        // plus item update
        if( isset($_GET["updateDataPlus"]) ) {

            $hasil = json_decode( $_GET["updateDataPlus"]);
            updateitemplus($hasil);

            $all = query("SELECT * FROM $manipulation");
            $subTotal = query("SELECT SUM(hargacart) AS alltotals FROM $manipulation ")[0];

        }

        // min item update
        if( isset($_GET["updateDataMin"]) ) {

            $hasil = json_decode( $_GET["updateDataMin"]);
            updateitemmin($hasil);

            $all = query("SELECT * FROM $manipulation");
            $subTotal = query("SELECT SUM(hargacart) AS alltotals FROM $manipulation ")[0];

        }

    } else {
        $manipulation = $_SESSION["logined"];

        $all = query("SELECT * FROM $manipulation");
        $subTotal = query("SELECT SUM(hargacart) AS alltotals FROM $manipulation ")[0];

        // remove item
        if( isset($_GET["dataid"]) ) {

            $hasil = $_GET["dataid"];
            hapus($hasil);

            $all = query("SELECT * FROM $manipulation");
            $subTotal = query("SELECT SUM(hargacart) AS alltotals FROM $manipulation ")[0];

        }

        // plus item update
        if( isset($_GET["updateDataPlus"]) ) {

            $hasil = json_decode( $_GET["updateDataPlus"]);
            updateitemplus($hasil);

            $all = query("SELECT * FROM $manipulation");
            $subTotal = query("SELECT SUM(hargacart) AS alltotals FROM $manipulation ")[0];

        }

        // min item update
        if( isset($_GET["updateDataMin"]) ) {

            $hasil = json_decode( $_GET["updateDataMin"]);
            updateitemmin($hasil);

            $all = query("SELECT * FROM $manipulation");
            $subTotal = query("SELECT SUM(hargacart) AS alltotals FROM $manipulation ")[0];

        }

        
        
    }
    
    
    if( $all == [] ) {
        header("Location: index.php");
    }





?>


<body>

<?php include "header.php"; ?>


<section id="sectionTable">
    <div class="tableCo container">
        <div class="flex">
            <table cellspacing = "0">
                <tr class="tableJudul">
                    <th>
                        <p>PRODUCT</p>
                    </th>
                    <th></th>
                    <th>
                        <p>PRICE</p>
                    </th>
                    <th>
                        <p>QUANTITY</p>
                    </th>
                    <th>
                        <p>REMOVE</p>
                    </th>
                    <th>
                        <p>TOTAL</p>
                    </th>
                </tr>

                <?php foreach( $all as $a ) : ?>
                <tr class="tableData">
                    <td>
                        <img src="<?php echo $a["imagecart"]; ?>" alt=""> 
                    </td>
                    <td>
                        <p><?php echo $a["produkcart"]; ?></p>
                    </td>
                    <td>
                        <div class="hargaAwal">
                            <span>
                                <p>$</p>
                            </span>
                            <span>
                                <p><?php echo $a["hargaawal"]; ?></p>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="plusMinItem">
                            <span data-id="<?php echo $a["idcart"]; ?>">-</span>
                            <span><?php echo $a["jumlahcart"]; ?></span>
                            <span data-id="<?php echo $a["idcart"]; ?>">+</span>
                        </div>
                    </td>
                    <td>
                        <p><i class="fa-solid fa-trash" data-id="<?php echo $a["idcart"]; ?>"></i></p>
                    </td>
                    <td>
                        <div class="totalTableData">
                            <span class="dolarr">
                                $
                            </span>
                            <span class="harganya">
                                <?php echo $a["hargacart"]; ?>
                            </span>
                        </div>
                    </td>
                </tr>

                    <?php endforeach; ?>
                

            </table>

            <div class="coupon">
                <div class="isiCoupon">
                    <input type="text" id="inputCoupon" placeholder="coupon code">
                    <p>APPLY COUPON</p>
                </div>
            </div>

            </div>
            
            <div class="checkOutBox">
                <div class="isiCheckOutBox">
                    <div class="cartTotals">
                        <h4>CART TOTALS</h4>
                        <div class="subTotalWr">
                            <span class="subTotal">subtotal : </span>
                            <span class="spanDolar">$</span>
                            <span class="isiDolar"><?php echo $subTotal["alltotals"]; ?></span>
                        </div>
                    </div>
                    <div class="shipping">
                        <div class="shippingText">
                            <p>shipping:</p>
                        </div>
                        <div class="isiShippingText">
                            <p>there are no shipping methods available. please double check your address, or contact us if you need any help.</p>
                            <p>CALCULATE SHIPPING</p>
                            <div class="countrySelect">
                                <select name="selectCountry" id="selectCountry">
                                    <option value="">select a country</option>
                                    <option value="">IND</option>
                                    <option value="">USA</option>
                                    <option value="">UK</option>
                                </select>
                            </div>
                            <div class="inputCity">
                                <input type="text" name="" id="city" placeholder="city / town">
                            </div>
                            <div class="inputPostCode">
                                <input type="text" name="" id="postcode" placeholder="poscode / zip">
                            </div>
                        </div>
                    </div>
                    <div class="totalCo">
                        <div class="totalCoWr">
                            <span class="totalAkhirCo">total : </span>
                            <span class="dolarTotal">$</span>
                            <span class="hasilTotal"><?php echo $subTotal["alltotals"]; ?></span>
                        </div>
                        <div class="coNow">
                            <p>CHECKOUT NOW!</p>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>
</section>


<?php 


require "footer.php";



?>

<script>
    <?php include "js/checkout.js"; ?>
</script>
    
</body>
</html>