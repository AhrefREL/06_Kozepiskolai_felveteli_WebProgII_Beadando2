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
      $data = Array("post_id" => "1318", "name" => $_POST["name"], "email" => $_POST["email"],
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
      echo '<h2 class="h2 text-success">Sikeres hozzáadás!</h2>';
  }
 
  // Ha nincs id de nem adtak meg minden adatot
  elseif($_POST['id'] == "")
  {
    $result = "<span style='color: red; font-weight: bold;'>Hiba: Hiányos adatok!</span>";
  }
  
  // Ha van id, amely >= 1, és megadták legalább az egyik adatot (cim, tartalom, datum), akkor módosítás
  elseif($_POST['id'] >= 1 && ($_POST['name'] != "" || $_POST['email'] != "" || $_POST['body'] != ""))
  {
      $data = Array("name" => $_POST["name"], "email" => $_POST["email"], "body" => $_POST["body"]);
      $ch = curl_init($url.$_POST["id"].$access_token);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $post = curl_exec($ch);
      $result = "<h2 class='h2 text-success'>Sikeresen módosította a ".$_POST['id']." ID-val rendelkező sort. MI törént: ".$post."</h2>";
      curl_close($ch);
  }
  
  // Ha van id, amely >=1, de nem adtak meg legalább az egyik adatot
  elseif($_POST['id'] >= 1)
  {
      
      $urlDelete = $url.$_POST["id"].$access_token;
      //echo $urlDelete;
      $ch = curl_init($urlDelete);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //curl_setopt($ch, CURLOPT_ENCODING, '');
      //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      //curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
      $post = curl_exec($ch);
      $result = "<h2 class='h2 text-success'>Sikeres törlés!</h2>";
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

<?= $result ?>
<h1 class="h1">Gorest Ingyenes API teszt commentek</h1>
<?php 
//create_table($tabla['data'], true);
//var_dump($tabla);

$html = "<div class= 'table-responsive'><table class='table'>
<tr>
<th>id</th>
<th>post_id</th>
<th>name</th>
<th>email</th>
<th>body</th>
</tr>";

foreach($tabla["data"] as $key => $value){
  $html .= "<tr>";
  $html .= "<td>".$value["id"]."</td>";
  $html .= "<td>".$value["post_id"]."</td>";
  $html .= "<td>".$value["name"]."</td>";
  $html .= "<td>".$value["email"]."</td>";
  $html .= "<td>".$value["body"]."</td>";
  $html .= "</tr>";
}

$html .= "</table></div>";
//var_dump($tabla['data']);
echo $html;
?>
<br>

<h3 class="h3">Használati utasítás (Módosítás, Beszúrás, Törlés)</h3>
<ul>
  <li><strong>Beszúrás:</strong> Hagyja üresen a SORSZÁMát és adja meg a többi adatot (név, e-mail, komment szöveg).</li>
  <li><strong>Módosítás:</strong> Adja meg a módosítandó sor SORSZÁMát és a többi adatot (név, e-mail, komment szöveg).</li>
  <li><strong>Törlés:</strong> Adja meg a törlni kívánt sor SORSZÁMát és hagyja üresen a többi adatot (név, e-mail, komment szöveg).</li>
</ul>

<form method="post">
  <div class="form-group">
    <label>Sorszám(id): </label>
    <input class="form-control" type="text" name="id">
  </div>
  <div class="form-group">
    <label>Név(name): </label>
    <input class="form-control" type="text" name="name" maxlength="80">
  </div>
  <div class="form-group">
    <label>E-mail(email): </label>
    <input class="form-control" type="email" name="email">
  </div>
  <div class="form-group">
    <label>Komment szövege(body): </label>
    <textarea class="form-control" colls="6" rows="20" name="body" maxlength="1999"></textarea>
  </div>
  <div class="form-group">

  <input class="btn btn-success btn-lg" type="submit" value = "Küldés">
  </div>

</form>
