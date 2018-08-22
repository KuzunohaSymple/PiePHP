<?php

class Database {
     function connexion() {
         try {
             $bdd = new PDO("mysql:host=127.0.0.1;dbname=raf_le_raton;charset=utf8" , 'root', 'root');
             $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             echo "Connected successfuly";
             $GLOBALS['bdd'] = $bdd;
             return $GLOBALS['bdd'];

         }
         catch(PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
         }
     }
}


 $zouzou = new Database();
 $zouzou->connexion();