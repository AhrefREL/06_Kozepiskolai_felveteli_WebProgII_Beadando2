<?php if ($_SESSION["felhasznaloId"] != "") { ?>
<div class="row m-1">
<h1 class="h1">PDF Generátor lekérdezés szerint</h2>

<h2 class="h2">Minimumponttal rendelkező jelentkezők lekérése képzés, hallgató neme és jelentkezési sorrend szerint.</h2>
<form action="<?=SITE_ROOT?>tcpdf" method="post">
    <div class="form-group">
        <label>Kérem válasszon egy képzést</label>
        <select id="kepzesek" name="kepzes" class="form-control" required>    
        </select>
    </div>
        <div class="form-group">
        <label >Kérem válasszon egy sorrendet</label>
        <select id="sorrend" name="sorrend" class="form-control" required>    
        </select>
    </div>
    <div class="form-group">
        <label>Kérem vásszon egy nemet:</label>
        <select name="nem" class="form-control" required>
            <option value="0">Válasszon...</option>
            <option value="f">Férfi</option>
            <option value="l">Lány</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info btn-lg" value="PDF letöltése">
    </div>
</form>

</div>

<?php
if(isset($viewData['tartalom']))
echo $viewData['tartalom'];
} ?>