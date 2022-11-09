<form action="<?= SITE_ROOT ?>regisztracio" method="post">
    <div class="row">
        <div class="ml-2 text-center">
            <fieldset>
                <legend>Regisztráció</legend>
                <br>
                <input type="text" name="csaladNev" class="form-control" placeholder="vezetéknév" required><br><br>
                <input type="text" name="keresztNev" class="form-control" placeholder="utónév" required><br><br>
                <input type="text" name="felhasznalonev" class="form-control" placeholder="felhasználói név" required><br><br>
                <input type="password" name="jelszo" class="form-control" placeholder="jelszó" required><br><br>
                <input type="submit" name="regisztracio" class="btn btn-success" value="Regisztráció">
                <br>&nbsp;
            </fieldset>
        </div>
    </div>
</form>

<?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br>