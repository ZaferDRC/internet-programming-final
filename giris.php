<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Madencilik Nedir, Madencilik">
    <meta name="keywords" content="Madencilik, Mining Maden,">
    <meta name="author" content="Zafer Yiğithan Dereci">
    <title>Giriş Yap</title>
</head>

<body>

    <?php
    require("veritabani.php"); // Veri tabanına bağlandığımız dosyayı dahil ettik


    if (isset($_POST["giris"])) { // Giris butonuna basıldıysa..

        $kullaniciad = $_POST["kullaniciad"]; // POST ile gelen değişken atamaları yapıldı.
        $sifre = $_POST["sifre"];

        $kullanici_sor = $baglandb->prepare("SELECT * FROM uye WHERE kullanici_adi = ? AND sifre = ?"); // SQL sorgusu hazırlandı
        $kullanici_sor->execute([$kullaniciad, md5($sifre)]); // Sorgu çalıştırıldı ve "?" Yazan yerlere sırasıyla buradaki değişkenler gidecek. kayıt eklenirken md5 ile şifrelendiği için burada da şifreyi md5 olarak gönderdik.

        $say = $kullanici_sor->rowCount(); // Sorgudan Bir tam sayı değeri dönecek, 1 veya 0 

        if ($say > 0) { // Dönen Sonuç 1 ise ...
            session_start();
            $_SESSION["kullaniciad"] = $kullaniciad;
            echo "<h2> BAŞARIYLA GİRDİNİZ </h2> ";
            header("Refresh:1; url = ozel.php");
        } else {
            echo "<h2> HATA OLUŞTU! </h2> ";
        }
    }



    ?>

    <style>
        body {
            background-color: grey;
        }

        .form {

            width: 300px;
            padding: 20px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            overflow: hidden;
            background: radial-gradient(circle at -8.9% 51.2%, rgb(255, 124, 0) 0%, rgb(255, 124, 0) 15.9%, rgb(255, 163, 77) 15.9%, rgb(255, 163, 77) 24.4%, rgb(19, 30, 37) 24.5%, rgb(19, 30, 37) 66%);
        }

        .form h1 {

            margin-top: 50px;
            color: wheat;

        }


        .form input {

            display: block;
            width: 100%;
            text-align: center;
            box-sizing: border-box;
            height: 44px;
            border: none;
            margin-top: 20px;
            border-radius: 10px;
        }


        #buton {

            margin-top: 40px;
            background-color: cornflowerblue;
            color: white;
            font-size: 16px;
        }

        #buton:hover {

            background-color: white;
            transition: 0.5s;
            transform: scale(0.90);
            cursor: pointer;
        }


        #temizle {

            background-color: cornflowerblue;
            color: red;
            font-size: 16px;

        }

        #temizle:hover {

            background-color: white;
            transition: 0.5s;
            transform: scale(0.90);
            cursor: pointer;
        }

        form a {
            text-decoration: none;
            margin-top: 20px;
            color: white;
            display: block;
        }

        form a:hover {
            transition: .5s;
            color: orange;
            transform: scale(1.15);
        }
    </style>

    <body>

        <div class="form">

            <form action="" method="post">
                <h1>Giriş Yap</h1>
                <input type="text" name="kullaniciad" maxlength="15" placeholder="Kullanıcı Adı">
                <input type="password" name="sifre" maxlength="10" placeholder="Şifre">
                <input button type="submit" name="giris" value="Giris Yap" id="buton">
                <input type="reset" value="Temizle" id="temizle">
                <a href="kayitol.php">Hesabın Yok Mu ? Tıkla.</a>
            </form>
        </div>



    </body>

</html>


</body>

</html>