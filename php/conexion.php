<?php

class Conexion{
    
    public static function Conectar(){
        define('servidor','127.0.0.1:3306');
        define('nombre_bd','proyecto');
        define('user','root');
        define('password','');
        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND);
        //$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf-8");
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=" .nombre_bd,user,password,$opciones);
            return $conexion;
        }catch (Exception $e){
            die("Error de conexion".$e->getMessage());
        }
    }
    
}