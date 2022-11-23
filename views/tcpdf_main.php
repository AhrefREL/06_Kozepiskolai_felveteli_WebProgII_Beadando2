<?php if ($_SESSION["felhasznaloId"] != "") { ?>
<h1>PDF Generátor lekérdezés szerint</h2>

<h2>Minimumponttal rendelkező jelentkezők lekérése képzés, hallgató neme és jelentkezési sorrend szerint.</h2>
<form action="<?=SITE_ROOT?>tcpdf" method="post">
    <label>Kérem válasszon egy képzést</label>
    <select id="kepzesek" name="kepzes" required>    
    </select>

    <label>Kérem válasszon egy sorrendet</label>
    <select id="sorrend" name="sorrend" required>    
    </select>

    <label>Kérem vásszon egy nemet:</label>
    <select name="nem" required>
        <option value="0">Válasszon...</option>
        <option value="f">Férfi</option>
        <option value="l">Lány</option>
    </select>
    <input type="submit"  value="PDF letöltése">
</form>



<?php
if(isset($viewData['tartalom']))
echo $viewData['tartalom'];
} ?>