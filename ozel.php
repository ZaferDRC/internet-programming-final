<?php

session_start();
if(isset($_SESSION["kullaniciad"])){
    echo "<h2>".$_SESSION["kullaniciad"]."HOŞ GELDİN </h3>";
    echo "<a href = 'cikis.php' style = 'color:red; background-color:yellow; border 1px solid red;
    padding:5px 5px;'>ÇIKIŞ YAP</a>";
}

else {
    echo "<h1>Bu Sayfayı Görüntüleme Yetkiniz Yoktur!</h1>";
}

?>