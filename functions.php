<?php

require_once "config.php";

function genUrlPath()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 65; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function houseKeeping()
{
    $dbLink = DB::getConnectionResource();
    $sql = mysqli_query($dbLink,"Delete from sec_data where DATE(sec_data.validity) < CURDATE() ");
}

function addEntry($data)
{
    $dbLink = DB::getConnectionResource();
    $encryption_class = new Encryption();
    $secretData = $encryption_class->encryptString($data['secret']);    
     $url = genUrlPath();
     $validity = $data['validity'];     
     if (!empty($data["oneTime"])) { $oneTime = $data['oneTime']; } else { $oneTime = "";}      
     if($data['password'] != "")
     {
     $password = $encryption_class->encryptString($data['password']);
     $passUsed = 1;
     $linkPath = $url. "&pass=1";
     }
     else
     {
         $password = "";
         $passUsed = 0;
         $linkPath = $url;
     }
      
     
     $password = mysqli_escape_string($dbLink,$password);
     $oneTime = mysqli_escape_string($dbLink,$oneTime);
     $validity = mysqli_escape_string($dbLink,$validity);
     $url = mysqli_escape_string($dbLink,$url);
     
     $sql = "INSERT INTO sec_data (secData,urlPath,validity,password,oneTime)
     VALUES ('$secretData','$url',NOW()+INTERVAL '$validity' DAY,'$password','$oneTime')";
     if (mysqli_query($dbLink, $sql)) {
     } else {
        echo "Error: " . $sql . "" . mysqli_error($dbLink);
     }
     mysqli_close($dbLink);  
     
     return $linkPath;   
     

}

function checkPW($id,$pass)
{
    $dbLink = DB::getConnectionResource();
    $encryption_class = new Encryption();
    
    $id = mysqli_escape_string($dbLink,$id);
    $pass = mysqli_escape_string($dbLink,$pass);
    
    $sql = "SELECT * FROM sec_data WHERE urlPath = '$id'";

    $result = mysqli_query($dbLink,$sql);
    $data = mysqli_fetch_assoc($result);
    $decrypted = $encryption_class->decryptString($data['password']);
    ($decrypted == $pass ? $res = $data["password"] : $res = "nomatch");
    return $res;
}

function delEntry($id)
{
    $dbLink = DB::getConnectionResource();
    
    $id = mysqli_escape_string($dbLink,$id);
    
    $sql = "DELETE FROM sec_data WHERE urlPath = '$id' LIMIT 1";        
    $result = mysqli_query($dbLink,$sql);    
}

function getData($id, $pass, $method)
{
    
$dbLink = DB::getConnectionResource();
$encryption_class = new Encryption();

$id = mysqli_escape_string($dbLink,$id);
$pass = mysqli_escape_string($dbLink,$pass);
$method = mysqli_escape_string($dbLink,$method);


$sql = "SELECT * FROM sec_data WHERE urlPath = '$id' AND password =''";

if($method == "2") // Daten kamen �ber Password-Formular an, nicht per GET sondern per POST
{    
    
    $storedPass = checkPW($id,$pass);
    if($storedPass != "nomatch")        
    $sql = "SELECT * FROM sec_data WHERE urlPath = '$id' AND password ='$storedPass'";
}


$result = mysqli_query($dbLink,$sql);
$data = mysqli_fetch_assoc($result);
if($data["oneTime"] == "yes")
{
delEntry($id);
$warning = "1";
}
mysqli_close($dbLink);
return $data;
}


class DB {


    private static $link = null;

    public static function getConnectionResource() {
        //In that way we "cache" our $link variable so that creating new connection 
        //for each function call won't be necessary
        if (self::$link === null) {
            //Define your connection parameter here
            self::$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        }
        return self::$link;
    }
}

class Encryption
{
    // Konstante f�r Verschl�sselungsmethode
    const AES_256_CBC = 'aes-256-cbc';
    
    private $_secret_key = SECRET_KEY;
    private $_secret_iv  = SECRET_IV;
    private $_encryption_key;
    private $_iv;
    
    // im Konstruktor werden die Instanzvariablen initialisiert
    public function __construct()
    {
        $this->_encryption_key = hash('sha256', $this->_secret_key);
        $this->_iv             = substr(hash('sha256', $this->_secret_iv), 0, 16);
    }
    
    public function encryptString($data)
    {
        return base64_encode(openssl_encrypt($data, self::AES_256_CBC, $this->_encryption_key, 0, $this->_iv));
    }
    
    public function decryptString($data)
    {
        return openssl_decrypt(base64_decode($data), self::AES_256_CBC, $this->_encryption_key, 0, $this->_iv);
    }
    
    public function setEncryptionKey($key)
    {
        $this->_encryption_key = $key;
    }
    
    public function setInitVector($iv)
    {
        $this->_iv = $iv;
    }
}

?>