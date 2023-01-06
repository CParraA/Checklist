<?php
define('DB_HOST','127.0.0.1:3306');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','proyecto');

$con=@mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
mysqli_set_charset($con, 'utf8');
if(!$con){
        die("imposible conectar".mysqli_error($con));
}
if(@mysqli_connect_errno()){
    die("conexion fallo".mysqli_connect_errno()." : ". mysqli_connect_errno()."");
}