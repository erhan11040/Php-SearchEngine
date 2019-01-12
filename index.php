<!DOCTYPE html>
<html lang="tr">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>KaosPazar</title>
      <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">	
	  <!-- ek stiller -->
       <link href="css/style.css" rel="stylesheet">
   
  
     <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
   
     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</head>

<?php
include "config.php";
?>
<body align="center" >
    <div align="center" style="margin-left:9%;">
<div class="col-md-12 col-lg-12 col-xs-12">
 

  <div style="width:2000px;">
	<div class="col-md-12 col-lg-12" style="margin-left:-20%;">
    <form  method = "post" action = "sonuc.php">
               <img   src="images/1.png" style="margin-left:15%; " title="Hoşgeldiniz" class="logoresim"  ></br>
                <input class="aramakutusu" type = "text" name= "arama" placeholder = "Buna Bakmıştım..." style=" width:900px; border-radius:6px; " >
                <input style="border-radius:100px; border-color:darkred; background-color:darkred; color:yellow;" type="submit" value="ARA">
              </br>
            </br>
            </form>
            <form action="dbekle.php" style="margin-left:9%;"method = "post">
                <input class="" type = "text" name= "ekle" placeholder = "Yeni DB EKLE DB'nin İsmini giriniz" style=" width:300px; border-radius:6px; " >
                <input class="" type = "text" name= "sil" placeholder = "Silmek istediginiz Db nin ismini giriniz" style=" width:300px; border-radius:6px; " >
                <input style="border-radius:100px; border-color:darkred; background-color:darkred; color:yellow; width:70px;" type="submit" value="ekle/sil">
            </form>

            <?php
            $user="root";
            $pass="";
            $db = new PDO('mysql:host=localhost;dbname=motor', $user, $pass);
            echo "mevcut dbler:</br>";
            foreach ($db->query("SELECT * FROM dbler") as $key) 
            {
              echo $key["adi"];
            }
            $db=null;
            ?>
                   
    </div  >       
            
         
            </div>
          </div>

        </div>
</body>