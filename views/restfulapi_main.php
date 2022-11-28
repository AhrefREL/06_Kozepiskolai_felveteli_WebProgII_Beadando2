<?php
$url = "http://localhost/06_Kozepiskolai_felveteli_WebProgII_Beadando2/restfulserver/szerver.php";
$result = "";
if(isset($_POST['id']))
{
  // Felesleges szóközök eldobása
  $_POST['id'] = trim($_POST['id']);
  $_POST['cim'] = trim($_POST['cim']);
  $_POST['tartalom'] = trim($_POST['tartalom']);
  $_POST['datum'] = trim($_POST['datum']);
  
  // Ha nincs id és megadtak minden adatot (cim, tartalom, datum), akkor beszúrás
  if($_POST['id'] == "" && $_POST['cim'] != "" && $_POST['tartalom'] != "" && $_POST['datum'] != "" )
  {
      $data = Array("cim" => $_POST["cim"], "tartalom" => $_POST["tartalom"], "datum" => $_POST["datum"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // Ha nincs id de nem adtak meg minden adatot
  elseif($_POST['id'] == "")
  {
    $result = "<span style='color: red; font-weight: bold;'>Hiba: Hiányos adatok!</span>";
  }
  
  // Ha van id, amely >= 1, és megadták legalább az egyik adatot (cim, tartalom, datum), akkor módosítás
  elseif($_POST['id'] >= 1 && ($_POST['cim'] != "" || $_POST['tartalom'] != "" || $_POST['datum'] != ""))
  {
      $data = Array("id" => $_POST["id"], "cim" => $_POST["cim"], "tartalom" => $_POST["tartalom"], "datum" => $_POST["datum"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // Ha van id, amely >=1, de nem adtak meg legalább az egyik adatot
  elseif($_POST['id'] >= 1)
  {
      $data = Array("id" => $_POST["id"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // Ha van id, de rossz az id, akkor a hiba kiírása
  else
  {
    echo "Hiba: Rossz azonosító (Id): ".$_POST['id']."<br>";
  }
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tabla = curl_exec($ch);
curl_close($ch);

?>
<div>
<?= $result ?>
<h1 class="h1">BEJEGYZÉSEK A HIRDETŐFALON:</h1>
<div class="table-responsive m-1">
<?= $tabla ?>

<br>
<h3 class="h3 m-2">Használati utasítás (Módosítás, beszúrás törlés)</h3>
<ul>
  <li><strong>Beszúrás:</strong> Hagyja üresen a SORSZÁMát és adja meg a többi adatot (cim, tartalom, datum).</li>
  <li><strong>Módosítás:</strong> Adja meg a módosítandó sor SORSZÁMát és legalább az egyik adatot (cim, tartalom, datum).</li>
  <li><strong>Törlés:</strong> Adja meg a törlni kívánt sor SORSZÁMát és hagyja üresen a többi adatot (cim, tartalom, datum).</li>
</ul>
</div>
<form action="" method="post">
  <div class="form-group">
    <label>Sorszám:</label>
    <input type="text" name="id" class="form-control">
  </div>
  <div class="form-group">
    <label>Hirdetés címe:</label>
    <input type="text" name="cim" class="form-control" maxlength="80">
  </div>
  <div class="form-group">
    <label>Hirdetés Szövege:</label>
    <textarea rows="6" cols="30" class="form-control" name="tartalom" maxlength="1999"></textarea>
  </div>
  <div class="form-group">
    <label>Dátum:</label>
    <input type="datetime-local" class="form-control" name="datum">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-success btn-lg" value = "Küldés">
  </div>
</form>
</div>
