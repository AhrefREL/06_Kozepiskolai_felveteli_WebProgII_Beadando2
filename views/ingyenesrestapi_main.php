<?php
$url = "https://gorest.co.in/public/v1/comments/";
$access_token = "?access-token=e9f167602f628d8f61c93b0516bb458990295c59c70c0a9ac9d2710a51ee451f";

$result = "";
if(isset($_POST['id']))
{
  // Felesleges szóközök eldobása
  $_POST['id'] = trim($_POST['id']);
  //$_POST['post_id'] = trim($_POST['post_id']);
  $_POST['name'] = trim($_POST['name']);
  $_POST['email'] = trim($_POST['email']);
  $_POST['body'] = trim($_POST['body']);
  
  // Ha nincs id és megadtak minden adatot (), akkor beszúrás
  if($_POST['id'] == "" && $_POST['name'] != "" && $_POST['email'] != "" && $_POST['body'] != "" )
  {
      $data = Array("post_id" => "1282", "name" => $_POST["name"], "email" => $_POST["email"],
       "body" => $_POST["body"]);
      $ch = curl_init($url.$access_token);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $post = curl_exec($ch);
      curl_close($ch);
      echo '<h2">A bejegyzett adatok: ' . $post . '</h2>';
  }
  
  // Ha nincs id de nem adtak meg minden adatot
  elseif($_POST['id'] == "")
  {
    $result = "<span style='color: red; font-weight: bold;'>Hiba: Hiányos adatok!</span>";
  }
  
  // Ha van id, amely >= 1, és megadták legalább az egyik adatot (cim, tartalom, datum), akkor módosítás
  elseif($_POST['id'] >= 1 && ($_POST['name'] != "" || $_POST['email'] != "" || $_POST['body'] != ""))
  {
      $data = Array("id" => $_POST["id"], "cim" => $_POST["cim"], "tartalom" => $_POST["tartalom"], "datum" => $_POST["datum"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //$result = curl_exec($ch);
      curl_close($ch);
  }
  
  // Ha van id, amely >=1, de nem adtak meg legalább az egyik adatot
  elseif($_POST['id'] >= 1)
  {
      //$data = Array("id" => $_POST["id"]);
      $urlDelete = $url.$_POST["id"].$access_token;
      echo $urlDelete;
      $ch = curl_init($urlDelete);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
     // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //$result = curl_exec($ch);
      curl_close($ch);
  }
  
  // Ha van id, de rossz az id, akkor a hiba kiírása
  else
  {
    echo "Hiba: Rossz azonosító (Id): ".$_POST['id']."<br>";
  }
}

	$ch = curl_init($url.$access_token);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$tabla = curl_exec($ch);
    $tabla = json_decode($tabla, JSON_PRETTY_PRINT);
    //echo "<pre>";
    //var_dump( curl_getinfo($ch) ) . '<br/>';
   // echo curl_errno($ch) . '<br/>';
  //  echo curl_error($ch) . '<br/>';
	curl_close($ch);
/*
foreach($tabla as $key => $value){
    //echo $value["name"];
}*/



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HIRDETŐFAL</title>
</head>
<body>
    <?= $result ?>
    <h1>Gorest Ingyenes API teszt commentek</h1>
    <?php 
    //create_table($tabla['data'], true);
    //var_dump($tabla);
   var_dump($tabla['data']);
    ?>
    <br>
    <h2>Módosítás / Beszúrás</h2>
    <h3>Használati utasítás</h3>
    <ul>
      <li>Beszúrás: Hagyja üresen a SORSZÁMát és adja meg a többi adatot (cim, tartalom, datum).</li>
      <li>Módosítás: Adja meg a módosítandó sor SORSZÁMát és legalább az egyik adatot (cim, tartalom, datum).</li>
      <li>Törlés: Adja meg a törlni kívánt sor SORSZÁMát és hagyja üresen a többi adatot (cim, tartalom, datum).</li>
    </ul>
    <form method="post">
    Sorszám: <input type="text" name="id"><br><br>
    Név: <input type="text" name="name" maxlength="80"> <br><br>
    E-mail: <input type="email" name="email">  <br><br>
    Komment szövege: <textarea name="body" maxlength="1999"></textarea><br><br>
    
    <input type="submit" value = "Küldés">
    </form>
</body>
</html>
