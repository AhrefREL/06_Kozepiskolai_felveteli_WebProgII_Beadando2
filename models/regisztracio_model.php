<?php
class Regisztracio_Model{   
    public function regisztracio($vars){
        $retData['eredmeny'] = "";
        $retData['uzenet'] = "";

        try {
            $connection = Database::getConnection();

            // Létezik már a felhasználói név?
            $sqlSelect = "SELECT felhasznalonev from felhasznalok where felhasznalonev = :felhasznalonev";
            $sth = $connection->prepare($sqlSelect);
            $sth->execute(array(':felhasznalonev' => $vars['felhasznalonev']));
            if($sth->fetch(PDO::FETCH_ASSOC)) {
                $retData['uzenet'] = "A felhasználói név már foglalt!";
                $retData['eredmeny'] = "ERROR";
            }
            else {
                // Ha nem létezik, akkor regisztráljuk
                $sqlSelect = "INSERT INTO `felhasznalok`(`csaladNev`, `keresztNev`, `felhasznalonev`, `jelszo`, `jogosultsag`) 
                VALUES (:csaladNev, :keresztNev, :felhasznalonev, :jelszo, :jogosultsag )";

                $sth = $connection ->prepare($sqlSelect);
                $sth->execute(array(':csaladNev' => $vars['csaladNev'], ':keresztNev' =>$vars['keresztNev'],
                ':felhasznalonev' =>$vars['felhasznalonev'], ':jelszo' =>sha1($vars['jelszo']), ':jogosultsag' => "_1_" ));

                if($count = $sth->rowCount()) {
                    $newid = $connection->lastInsertId();
                    $retData['uzenet'] = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";                     
                    $retData['eredmeny'] = "OK";;
                }
                else {
                    $retData['uzenet']  = "A regisztráció nem sikerült.";
                    $retData['eredmeny'] = "ERROR";
                }
            }
            return $retData;

        }
        catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
        }
    }
}
