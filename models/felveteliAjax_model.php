<?php

include($_SERVER['DOCUMENT_ROOT'] . '/06_Kozepiskolai_felveteli_WebProgII_Beadando2/includes/config.inc.php');
include($_SERVER['DOCUMENT_ROOT'] . '/06_Kozepiskolai_felveteli_WebProgII_Beadando2/includes/database.inc.php');
switch($_POST['op']) {
    case 'get_kepzes':
        $eredmeny = array("lista" => array());
        try {
            $connection = Database::getConnection();
            $stmt = $connection->query("SELECT id, nev FROM kepzes");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $eredmeny["lista"][] = array("id" => $row['id'], "nev" => $row['nev']);
            }
        }
        catch(PDOException $e) {
        }
        echo json_encode($eredmeny);
        break;
    case 'get_sorrend':
        $eredmeny = array("lista" => array());
        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT sorrend FROM `jelentkezes` WHERE kepzesid = :kepzesid GROUP by sorrend");
            $stmt->execute(array(':kepzesid' => $_POST['kepzesid']));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $eredmeny["lista"][] = array("sorrend" => $row['sorrend']);
            }
        }
        catch(PDOException $e) {
        }
        echo json_encode($eredmeny);
        break;
    case 'get_jelentkezok':
        $eredmeny = array("lista" => array());
        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT jelentkezo.nev, jelentkezo.nem 
            FROM `jelentkezes` LEFT JOIN jelentkezo ON jelentkezes.jelentkezoid = jelentkezo.id 
            WHERE jelentkezes.sorrend = :sorrend AND jelentkezes.kepzesid = :kepzesid");
            $stmt->execute(array(':sorrend' => $_POST['sorrend'], ':kepzesid' => $_POST['kepzesid']));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $eredmeny["lista"][] = array("nev" => $row['nev'], "nem" => $row['nem']);
            }
        }
        catch(PDOException $e) {
        }
        echo json_encode($eredmeny);
        break;
    case 'get_MinimumPontalRendelkezoJelentkezok':
        $eredmeny = array("lista" => array());
        try {
            $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT jelentkezo.nev, jelentkezo.nem
            , jelentkezes.sorrend, jelentkezes.szerzett 
            FROM ((`jelentkezes` 
            LEFT JOIN kepzes ON jelentkezes.kepzesid = kepzes.id)
            LEFT JOIN jelentkezo ON jelentkezes.jelentkezoid = jelentkezo.id)
            WHERE jelentkezes.szerzett >= kepzes.minimum 
            AND jelentkezes.kepzesid= :kepzesid");
            $stmt->execute(array(':kepzesid' => $_POST['kepzesid']));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $eredmeny["lista"][] = array("nev" => $row['nev'], "nem" => $row['nem'],
                 "sorrend" => $row['sorrend'], "szerzett" => $row['szerzett']);
            }
        }
        catch(PDOException $e) {
        }
        echo json_encode($eredmeny);
        break;



}

?>

