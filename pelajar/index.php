<?php
require '../conn.php';
if(!isset($_SESSION['idpengguna'])) header('location: ../');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendaftaran Peralatan Elektrik</title>
</head>
<body>
    <ul class="menubar">
        <li class="home"><a href="index.php?menu=home">Home</a></li>

        <li class="product">
            <a href="index.php?menu=pelajar">Senarai Peralatan</a></li>

        <li class="con">
            <a href="../logout.php">Log Out</a></li>
    </ul>
<?php
$menu = 'home'; #default value
if(isset($_GET['menu'])){
    $menu=$_GET['menu'];
}
include "$menu.php";
?>

</body>
</html>