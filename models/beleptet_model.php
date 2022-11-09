<?php

class Beleptet_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sqlSelect = "SELECT id, csaladNev, keresztNev, felhasznalonev, jogosultsag from felhasznalok where 
            felhasznalonev=:felhasznalonev and jelszo=:jelszo";

            $sth = $connection ->prepare($sqlSelect);
            $sth->execute(array(':felhasznalonev' => $vars['felhasznalonev'], ':jelszo' =>sha1($vars['jelszo']) ));

			$felhasznalo = $sth->fetch(PDO::FETCH_ASSOC);
            if($felhasznalo){
                $retData['eredmeny'] = "OK";
                $retData['uzenet'] = "Üdvözöljük ".$felhasznalo['csaladNev']." ".$felhasznalo['keresztNev']."<br>";
                $_SESSION['felhasznaloId'] =  $felhasznalo['id'];
                $_SESSION['csaladNev'] =  $felhasznalo['csaladNev'];
                $_SESSION['keresztNev'] =  $felhasznalo['keresztNev'];
                $_SESSION['felhasznalonev'] =  " (".$felhasznalo['felhasznalonev'].")";
                $_SESSION['felhasznaloszint'] =  $felhasznalo['jogosultsag'];
                Menu::setMenu();

            } else {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Helytelen felhasználói név-jelszó pár!";
            }
		}
		catch (PDOException $e) {
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>