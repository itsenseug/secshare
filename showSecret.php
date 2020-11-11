<?php 
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

require_once "config.php";
houseKeeping();

if( !empty ( $_GET["id"] ) ) { $id = $_GET['id']; }
$pass = "";
$method = "1";
$warning = "";

if ( !isset ( $id ) )
{    
    $id = $_POST['id'];
    $pass = $_POST['password'];
    $method = "2";
}

$data = getData($id, $pass, $method);
$encryption_class = new Encryption();
$decrypted = $encryption_class->decryptString($data['secData']);
$showDate =  date("d.m.Y", strtotime($data['validity']));

include("content/header.php");
include("content/showData_showSecret.php");
include("content/footer.php");
?>