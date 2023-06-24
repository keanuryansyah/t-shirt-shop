<?php

$title = "SIGN UP";
$style = "css/signup.css";

require "headers.php";

if( isset($_POST["submit"]) ) {
    if( daftar($_POST) > 0 ) {
        $berhasil = true;
    }
}






?>





<body> 

<?php include "header.php"; ?>

<?php if( isset($berhasil) ) : ?>
    <div class="berhasil"></div>
<?php endif; ?>

<section id="signupSect">

    <div id="signupCtn" class="container">

        <div class="signUpText">
            <h4>SIGN UP</h4>
            <div class="enkripsi">
                <p>we will encrypt the data you enter, to maintain your privacy and security.</p>
            </div>
            <i class="fa-solid fa-lock"></i>
        </div>

        <form action="" method="post">
            <ul>
                <li>
                    <label for="gmail">gmail:</label>
                    <input type="text" id="gmail" name="gmail" autocomplete="off" placeholder="example@gmail.com" required>
                </li>
                <li>
                    <label for="username">username:</label>
                    <input type="text" id="username" name="username" autocomplete="off" placeholder="enter your username" required>
                </li>
                <li>
                    <label for="password">password:</label>
                    <input type="password" id="password" name="password" autocomplete="off" placeholder="password must contain numbers!" required>
                </li>
                <li>
                    <label for="confirmpass">confirm password:</label>
                    <input type="password" id="confirmpass" name="confirmpass" autocomplete="off" placeholder="re-enter your password" required>
                </li>
                <li>
                    <label for="gender">gender:</label>
                    <span class="genderOption">

                        <input type="radio" value="women" name="gender" required>
                        <p>women</p>
                        <input type="radio" value="men" name="gender" required>
                        <p>men</p>
                        <input type="radio" value="transgender" name="gender"gender required>
                        <p>transgender</p>
                    </span>
                </li>
                <li>
                    <label for="address">your address:</label>
                    <input type="text" id="address" name="address" autocomplete="off" placeholder="example: JL.almujahiddin 1" required>
                </li>
                <li>
                    <input type="checkbox" value="false" id="acc">
                    <span>if you sign up, it means you accepts all rules of exist in our shop</span>
                </li>
            </ul>
            <button type="submit" name="submit" id="buttonSignUp">SIGN UP!</button>
        </form>
        
    </div>
    

</section>

<div class="popUpSuksesPr">

    <div class="popUpSukses">
        <h4>YOUR ACCOUNT SUCCESFULLY CREATED!</h4>
        <a href="login.php">login now!</a>
        <p>dismiss</p>
    </div>

</div>

<?php require "footer.php"; ?>

<script>
    <?php include "js/signup.js"; ?>
</script>

</body>
</html>