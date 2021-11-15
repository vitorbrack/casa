<?php

class Conecta {

    public function conectadb(){
        $pdo = null;
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=l7grifes", 
                    "root", "senac");
        } catch (Exception $ex) {
            echo "<script>alert('Erro na conexão com o "
            . "banco de dados.')</script>";
        }   
        return $pdo;
    }
/*
    public function make_hash($str){
        return sha1(md5($str));
    }	

    public function isLoggedIn(){
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
            return false;
        }
        return true;
    }*/
}
