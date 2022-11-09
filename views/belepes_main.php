<form action="<?= SITE_ROOT ?>beleptet" method="post">
    <div class="row">
        <div class="ml-2 text-center">
            <fieldset>
                <legend>Bejelentkezés</legend>
                <br>
                <input type="text" name="felhasznalonev" class="form-control" placeholder="felhasználó" required><br><br>
                <input type="password" name="jelszo" class="form-control" placeholder="jelszó" required><br><br>
                <input type="submit" name="belepes" class="btn btn-success" value="Belépés">
                <a href="<?php echo SITE_ROOT . "regisztracio" ?>" class="btn btn-info" role="button">Regisztráció</a>


                <br>&nbsp;
            </fieldset>
        </div>
    </div>
</form>