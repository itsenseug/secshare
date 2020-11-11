<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("content/header.php");

require_once "config.php";
houseKeeping();
     if (!empty($_GET["pass"]) && $_GET["pass"] == "1") { 
        $query = http_build_query($_GET);
        header('location: enterPass.php'."?".$query);
        exit;
      }
    if( !empty ( $_GET["id"] ) ) 
      { 
        $query = http_build_query($_GET);
        header('location: showSecret.php'."?".$query);
        exit; 
      }      
    if (!empty($_POST["action"]) && $_POST["action"] == "addEntry")       
      {   
        $linkPath = addEntry($_POST);
        include("content/insertResult.php");
      }
else
{
       include("content/index_mainContent.php");    
?>
<?php } 
      include("content/footer.php");
?>
