<?php

require_once '../.env.php';

class Database {

    private $bdd;

    private function openDatabase(){       
        global $db_server, $db_name, $db_username, $db_password;

        $this->bdd = new PDO("mysql:host=$db_server;dbname=$db_name;charset=utf8", $db_username, $db_password);
        $this->bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }

    public function InsertDonnee($date, $temperature, $humidite){
    
        if($this->bdd == null){
            $this->openDatabase();
        }
        $sql = "INSERT INTO donnees (date, temp, humi) VALUES (?,?,?)";
        $stmt= $this->bdd->prepare($sql);
        $stmt->execute([$date, $temperature, $humidite]);
    }

    public function LireDonnee($from, $to){
    
        if($this->bdd == null){
            $this->openDatabase();
        }
        $sql = "SELECT date, temp, humi, FROM donnees WHERE (date >= ? AND date <= ?)";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$from, $to]);
    
        return $stmt;
    }

    /* Future évolution avec plusieurs sondes
    function getSondes(){

        ///
        return $stmt->fecth();
    }
    */
}