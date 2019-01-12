<body style="background-color:black;">
<?php
include "config.php";
//$_POST["sil"];
$_POST["ekle"];
$user="root";
$pass="";
$db = new PDO('mysql:host=localhost;dbname=motor', $user, $pass);
if(isset($_POST["sil"]))
{
	$adi=$_POST["sil"];
	if($adi=="")
	{

	}
	else
	{
		
		if($db->exec("DELETE FROM dbler WHERE adi='".$adi."'"))
		{
			echo "silme basarili";
		}
		else
		{
			echo "silme patladi";
		}
	}

}
else
{
	echo "veri gelmedi";
}
if(isset($_POST["ekle"]))
{
	$adi1=$_POST["ekle"];
	if($adi1=="")
	{

	}
	else
	{
	$hazir=$db->prepare("INSERT INTO dbler (adi) Values (?)");
	if($hazir->execute(array($adi1)))
	{
		echo "kayit basarili";
	}
	else
	{
		echo "kayit patladi";
	}
	
	}
	
	
}
else
{
	echo "veri gelmedi";
}

?>
<a href="index.php" style="color:darkred;">ANASAYFA</a></body>