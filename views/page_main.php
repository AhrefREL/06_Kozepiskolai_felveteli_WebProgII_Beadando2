<!DOCTYPE html>
<html>
    <head>
        <title><?php echo Menu::setPageTitlebyMenuItem($viewData['selectedItems']);?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=SITE_ROOT?>/assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=SITE_ROOT?>/assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_ROOT?>/assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?=SITE_ROOT?>/assets/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?=SITE_ROOT?>/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
        <script type="text/javascript" src = "<?=SITE_ROOT?>/assets/js/ajax-felveteli.js"></script>
    </head>
    <body>
        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>IT SCHOOL</h1>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">*
            <?php if($_SESSION['felhasznaloId']) {?>Bejelentkezett: </br>
                <strong><?= $_SESSION['csaladNev']." ".$_SESSION['keresztNev']." 
                ".$_SESSION['felhasznalonev']."" ?></strong><?php } ?>
            
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">                
                <?php echo Menu::getMenu($viewData['selectedItems']); ?>
            </div>
        </nav>
        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-sm-12">
                    <?php include($viewData['render']); ?>
                </div>
            </div>
        </div>        
        </section>
        <div class="jumbotron text-center" style="margin-bottom:0">
            &copy; NJE - GAMF - <?= date("Y") ?> - Készítette: Lázár Norbert és Turi Ferenc
        </div>
    </body>
</html>
