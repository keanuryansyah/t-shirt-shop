<?php 

require "functions.php";

session_destroy();

mysqli_query($conn, "TRUNCATE datacart");

header("Location: index.php");
exit;



?>