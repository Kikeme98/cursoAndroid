<?php
class database{
    public static function StartUp(){
        $arrOptions = array(
            PDO::ATTR_EMULATE_PREPARES => FALSE, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
        );
        try{
            $pdo = new PDO('mysql:host = localhost:3306;
            dbname=uber_eats;',
            'root',
            '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        }catch(PDOException $e){
            echo "Connection error ".$e->getMessage(); 
            exit;
        }
        
    }
}
?>