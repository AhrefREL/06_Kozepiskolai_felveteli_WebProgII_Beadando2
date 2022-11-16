<?php

$eredmeny = "";
try {
	$dbh = new PDO('mysql:host=localhost;dbname=kozepiskolaiFelveteli', 'root', '',
				  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
	switch($_SERVER['REQUEST_METHOD']) {
		case "GET":
				$sql = "SELECT * FROM hirdetofal";     
				$sth = $dbh->query($sql);
				$eredmeny .= "<table style=\"border-collapse: collapse;\">
                <tr><th>Sorszám</th><th>Cím</th><th>Tartalom</th><th>Dátum</th></tr>";
				while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
					$eredmeny .= "<tr>";
					foreach($row as $column)
						$eredmeny .= "<td style=\"border: 1px solid black; padding: 3px;\">".$column."</td>";
					$eredmeny .= "</tr>";
				}
				$eredmeny .= "</table>";
			break;
		case "POST":
				$sql = "INSERT INTO hirdetofal VALUES (0, :cim, :tartalom, :datum)";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute(Array(":cim"=>$_POST["cim"], ":tartalom"=>$_POST["tartalom"], ":datum"=>$_POST["datum"]));
				$newid = $dbh->lastInsertId();
				$eredmeny .= $count." beszúrt sor: ".$newid;
			break;
		case "PUT":
				$data = array();
				$incoming = file_get_contents("php://input");
				parse_str($incoming, $data);
				$modositando = "id = :id"; 
				$params = Array("id"=>$data["id"]);
				
				if($data['cim'] != "") {$modositando .= ", cim = :cim"; $params[":cim"] = $data["cim"];}
				if($data['tartalom'] != "") {$modositando .= ", tartalom = :tartalom"; $params[":tartalom"] = $data["tartalom"];}
				if($data['datum'] != "") {$modositando .= ", datum = :datum"; $params[":datum"] = $data["datum"];}
				
				$sql = "UPDATE hirdetofal SET ".$modositando." WHERE id=:id";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute($params);
				$eredmeny .= $count." módositott sor. Azonosítója:".$data["id"];
			break;
		case "DELETE":
				$data = array();
				$incoming = file_get_contents("php://input");
				parse_str($incoming, $data);
				$sql = "DELETE FROM hirdetofal WHERE id=:id";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute(Array(":id" => $data["id"]));
				$eredmeny .= $count." sor törölve. Azonosítója:".$data["id"];
			break;
	}
}
catch (PDOException $e) {
	$eredmeny = $e->getMessage();
}
echo $eredmeny;

?>