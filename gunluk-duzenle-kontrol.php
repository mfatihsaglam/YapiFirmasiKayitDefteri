<?php
session_start(); 
if(!isset($_SESSION["login"])){
?>
<meta http-equiv="refresh" content="0;URL=giris.php">
<?php
} else
{
?>
<!-- GİRİŞ KONTROL -->
<?php include("kafa.php") ?>
<?php include("menu.php") ?>
<?php include("kontrol/veritabani.php") ?>

<section id="content">
<?php
$id=$_POST['id'];
$tarih=$_POST['tarih'];
$aciklama=$connection->quote($_POST['aciklama']);
$gelir_nakit=$_POST['gelir_nakit'];
$gelir_cek=$_POST['gelir_cek'];
$gider_nakit=$_POST['gider_nakit'];
$gider_cek=$_POST['gider_cek'];

$ayarguncelle=$connection->query("UPDATE gunluk set aciklama=".$aciklama.",tarih='$tarih',gelir_nakit='$gelir_nakit',gelir_cek='$gelir_cek',gider_nakit='$gider_nakit',gider_cek='$gider_cek' where id='$id'") or die ("Bir Hata Oluştu");


if($ayarguncelle){
	$durum="<h2>İşlem Başarılı</h2>";
}else{
	$durum="<h2>Bir hata oluştu</h2>";
	}
echo"$durum";
echo" <meta http-equiv=\"refresh\" content=\"0;url=gunluk.php\"> ";
?>

</section>

<!-- GİRİŞ KONTROL -->          
<?php include("ayak.php"); ?>
<?php	} ?>