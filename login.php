<?php 
ob_start();

$title = "LOGIN";
$style = "css/login.css";

include "headers.php";


if( isset($_POST["submit"]) ) {
    global $conn;
    $uname = $_POST["username"];
    if( !login($_POST) ) {
        $gagal = true;
    }
}


?>

<body>

<?php include "header.php"; ?>

<section id="loginSect">
    <div class="loginCtnWr container">
        <div class="loginCtn">

        <?php if( isset($gagal) ) : ?>
        <div class="gagal">
            <p style="color: red; font-style: italic;">username / password yang anda masukkan salah!</p>
        </div>
    <?php endif; ?>

            <div class="loginText">
                <h4>LOGIN</h4>
                <p>login, to continue payment!</p>
            </div>
            <div class="usernameAndPassword">
                <form action="" method="post">
                    <div class="usernamePr">
                        <h4><label for="username">username</label></h4>
                        <p><input id="username" 
                        name ="username" type="text" placeholder="enter your username" autocomplete="off"></p>
                    </div>
                    <div class="passwordPr">
                        <h4><label for="password">password</label></h4>
                        <p><input id="password" name="password" type="password" placeholder="enter your password" autocomplete="off"></p>
                        <p>password is at least 8 characters long, and consists of numbers and uppercase letters</p>
                    </div>
                    <div class="seePasswordAndLogin
                    ">
                        <div class="seePasswordCtn">

                        <input type="checkbox" id="seePassword" value="false">
                        <label for="seePassword">show password</label>
                            
                        </div>
                    </div>
                    <div class="buttonSubmit">
                            <button type="submit" name="submit">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="signUp">
            <h4>SIGN UP</h4>
            <p>if you create an account, you will get benefits such as discounts and notifications about the arrival of new items</p>
            <a href="signup.php">sign up now!</a>
        </div>
    </div>
</section>


<?php 

include "footer.php";

?>

<script>
    <?php include "js/login.js" ?>
</script>
    
</body>
</html>