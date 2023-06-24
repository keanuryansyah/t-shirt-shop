<?php
session_start();



$conn = mysqli_connect("localhost", "root", "", "allkeanu");

function query($data)
{
    global $conn;
    $result = mysqli_query($conn, $data);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data, $manipulation)
{

    global $conn;
    $gambar = $data->gambarproduk;
    $nama = $data->namaproduk;
    $harga = $data->hargaproduk;
    $jumlah = $data->jumlahbeli;
    $hargaawal = $data->hargaawal;
    $sizeproduk = $data->sizeproduk;


    if (!isset($_SESSION["logined"])) {

        $get = query("SELECT sizecart FROM $manipulation WHERE produkcart = '$nama' ");

        foreach ($get as $g) {

            if (in_array($sizeproduk, $g)) {

                $hasil = mysqli_query($conn, "UPDATE $manipulation SET jumlahcart = jumlahcart + '$jumlah', hargacart = hargacart + '$harga' WHERE sizecart = '$sizeproduk' ");

                return $hasil;

            }

        }


    } else {

        $get = query("SELECT sizecart FROM $manipulation WHERE produkcart = '$nama' ");

        foreach ($get as $g) {

            if (in_array($sizeproduk, $g)) {

                $hasil = mysqli_query($conn, "UPDATE $manipulation SET jumlahcart = jumlahcart + '$jumlah', hargacart = hargacart + '$harga' WHERE sizecart = '$sizeproduk' ");

                return $hasil;

            }

        }


    }



    $hasil = mysqli_query($conn, "INSERT INTO $manipulation (idcart, imagecart, produkcart, hargaawal, hargacart, sizecart, jumlahcart) VALUES ('', '$gambar', '$nama', '$hargaawal', '$harga', '$sizeproduk', '$jumlah') ");

    return $hasil;







}


function hapus($data)
{
    global $conn;
    $idcart = $data;

    if (!isset($_SESSION["logined"])) {
        $manipulation = "datacart";

        mysqli_query($conn, "DELETE FROM $manipulation WHERE idcart = '$idcart' ");

    } else {

        $manipulation = $_SESSION["logined"];

        mysqli_query($conn, "DELETE FROM $manipulation WHERE idcart = '$idcart' ");

    }



}


function updateitemplus($data)
{
    global $conn;
    $idproduk = $data->idproduk;
    $hasilprice = $data->hasilprice;
    $manyitem = $data->manyitem;

    if (!isset($_SESSION["logined"])) {

        $manipulation = "datacart";

        mysqli_query($conn, "UPDATE $manipulation SET hargacart = '$hasilprice', jumlahcart = jumlahcart + '$manyitem' WHERE idcart = '$idproduk' ");

    } else {

        $manipulation = $_SESSION["logined"];

        mysqli_query($conn, "UPDATE $manipulation SET hargacart = '$hasilprice', jumlahcart = jumlahcart + '$manyitem' WHERE idcart = '$idproduk' ");
    }


}

function updateitemmin($data)
{
    global $conn;
    $idproduk = $data->idproduk;
    $hasilprice = $data->hasilprice;
    $manyitem = $data->manyitem;

    if (!isset($_SESSION["logined"])) {

        $manipulation = "datacart";

        mysqli_query($conn, "UPDATE $manipulation SET hargacart = '$hasilprice', jumlahcart = jumlahcart - '$manyitem' WHERE idcart = '$idproduk' ");

    } else {

        $manipulation = $_SESSION["logined"];

        mysqli_query($conn, "UPDATE $manipulation SET hargacart = '$hasilprice', jumlahcart = jumlahcart - '$manyitem' WHERE idcart = '$idproduk' ");
    }


}



function daftar($data)
{
    global $conn;
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $confirmpass = htmlspecialchars($data["confirmpass"]);
    $gmail = htmlspecialchars($data["gmail"]);
    $gender = htmlspecialchars($data["gender"]);
    $address = htmlspecialchars($data["address"]);

    $all = mysqli_query($conn, "SELECT username FROM register WHERE username = '$username' ");

    $number = preg_match('@[0-9]@', $password);
    $gmailValidation = '/^\\S+@\\S+\\.\\S+$/';

    $gmailValid = preg_match($gmailValidation, $gmail);



    if (mysqli_num_rows($all) > 0) {
        echo "username yang anda masukkan sudah terdaftar!";
        return false;
    } else if ($password != $confirmpass) {
        echo "password yang anda masukkan tidak sama!";
        return false;
    } else if (strlen($password) < 8) {
        echo "password minimal 8 karakter!";
        return false;
    } else if (!$number) {
        echo "password harus mengandung angka!";
        return false;
    } else if (!$gmailValid) {
        echo "masukkan gmail yang valid!";
        return false;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $passwordHashConfirm = password_hash($confirmpass, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO register VALUES('', '$username', '$passwordHash', '$passwordHashConfirm', '$gmail', '$gender', '$address')");



    return mysqli_affected_rows($conn);

}

function login($dataLogin)
{
    global $conn;
    $username = $dataLogin["username"];
    $password = $dataLogin["password"];

    $all = mysqli_query($conn, "SELECT * FROM register WHERE username = '$username' ");

    $datacart = query("SELECT * FROM datacart");

    if (mysqli_num_rows($all) > 0) {
        $arr = mysqli_fetch_assoc($all);

        if (password_verify($password, $arr["password"])) {

            mysqli_query($conn, "CREATE TABLE $username(
                idcart INT PRIMARY KEY AUTO_INCREMENT,
                imagecart VARCHAR(250),
                produkcart VARCHAR(250),
                hargaawal VARCHAR(250),
                hargacart VARCHAR(250),
                sizecart VARCHAR(250),
                jumlahcart VARCHAR(250)
            )
            ");

            foreach ($datacart as $dc) {
                $imagecartDataCart = $dc["imagecart"];
                $produkcartDataCart = $dc["produkcart"];
                $hargaawalDataCart = $dc["hargaawal"];
                $hargacartDataCart = $dc["hargacart"];
                $sizecartDataCart = $dc["sizecart"];
                $jumlahcartDataCart = $dc["jumlahcart"];

                $all = mysqli_query($conn, "SELECT * FROM $username WHERE produkcart = '$produkcartDataCart' ");

                if (mysqli_num_rows($all) === 1) {

                    $unameDb = mysqli_fetch_assoc($all);

                    mysqli_query($conn, "UPDATE $username SET jumlahcart = jumlahcart + '$jumlahcartDataCart', hargacart = hargacart + '$hargacartDataCart' WHERE produkcart = '$produkcartDataCart' ");

                    if ($sizecartDataCart !== $unameDb["sizecart"]) {

                        mysqli_query($conn, "INSERT INTO $username VALUES('', '$imagecartDataCart', '$produkcartDataCart', '$hargaawalDataCart', '$hargacartDataCart', '$sizecartDataCart', '$jumlahcartDataCart')");
                    }

                } else {

                    mysqli_query($conn, "INSERT INTO $username VALUES('', '$imagecartDataCart', '$produkcartDataCart', '$hargaawalDataCart', '$hargacartDataCart', '$sizecartDataCart', '$jumlahcartDataCart')");
                }


            }

            mysqli_query($conn, "TRUNCATE datacart");


            $_SESSION["logined"] = $username;

            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;

        } else {

            return false;
        }


    } else {

        return false;

    }

    return true;



}








?>