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
<body>
<form  method = "post" action = "sonuc.php">
	<div class="col-md-11 col-lg-11" style="margin-left:10%; ">
              <a href="index.php"> <img   src="images/1.png" title="Hoşgeldiniz" class="logoresim1"  style="width:10%; margin-left:-10.5%;" ></a>
                <input class="aramakutusu1" type = "text" name = "arama" placeholder = "Buna Bakmıştım..." style=" border-radius:6px; width:50%;" >
                <input style="border-radius:100px; border-color:darkred; background-color:darkred; color:yellow;" type="submit" value="ARA">
    </div  >       
<div style="padding-left:4%;">
<div style="color:red; " >
	<i><a href="">Sonuclar</a></i>
</div>
</div>
<div class="col-md-12 col-lg-12 col-xs-12">

<?php
$user="root";
$pass="";
$db[0] = new PDO('mysql:host=localhost;dbname=motor', $user, $pass);
$degis=1;
$arama=$_POST["arama"];
$deger;$deger2;
foreach ($db[0]->query("SELECT * FROM dbler") as $key) 
{
  $dbname=$key["adi"];
  $db[$degis] = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
  foreach($db[$degis]->query('SHOW TABLES FROM '.$dbname.'') as $row)
  {
     // echo '<p style="color:red;">'.$row[0] . '</p><br/>';
     $deger=$row[0];//tablo
    foreach($db[$degis]->query("SHOW COLUMNS  FROM $deger  FROM ".$dbname."") as $alan)
    {
      // echo $alan[0] . '<br/>';
      $deger2=$alan[0];//kolon
      foreach($db[$degis]->query(" SELECT * FROM $deger WHERE $deger2 LIKE '%$arama%' ") as $icerik)
      {
         // print_r($icerik);
         echo "<p style='color:red'>//DB->$dbname"." //TaBlo->".$deger." //Kolon->".$deger2." -_- ".$icerik[$deger2] . '</p>';
         $sayisi=count($icerik)/2;
         

         $i=0;
         foreach($db[$degis]->query("SHOW COLUMNS  FROM $deger  FROM ".$dbname."") as $alancek)
        {
          echo "<p style='color:white;'>".$alancek[0]." = ".$icerik[$i] ."<br/></p>";
          $i++;
        }
      }

    }

  }

  $degis++;
}
$saydir=$db[0]->query("SELECT COUNT(*) as saydir FROM dbler LIMIT 1")->fetch();
for ($i=0; $i <$saydir["saydir"] ; $i++) 
{ 
  $db[$i]=null;
}

//include "config.php";

//$liste = DB::query('SHOW TABLES FROM kaospazar');
//echo $liste;
// while($bilgi=mysql_fetch_array($liste))
 // {   echo $bilgi[0] . "<br>";}




 //$sql= $db->prepare("SHOW COLUMNS  FROM deger  FROM kaospazar > $deger ");


?>
</div>
</body>