<?php

Class Menu {
    public static $menu = array();

    public static function setMenu() {
        self::$menu = array();
        $connection = Database::getConnection();
        $stmt = $connection->query('SELECT slug, oldalcim, szuloId, jogosultsag FROM menuk WHERE jogosultsag LIKE "'.$_SESSION['felhasznaloszint'].'"');//;'".$_SESSION['felhasznaloszint']."'");
        while($menuitem = $stmt->fetch(PDO::FETCH_ASSOC)) {
            self::$menu[$menuitem['slug']] = array($menuitem['oldalcim'], $menuitem['szuloId'], $menuitem['jogosultsag']);
        }
    }

    public static function getMenu($sItems) {

        $submenu = "";
        
        $menu = '<ul class="navbar-nav">';
        foreach(self::$menu as $menuindex => $menuitem)       
        {
            
            if($menuitem[1] == "0")
            { $menu.= '<li class="nav-item"><a class="nav-link" href="'.SITE_ROOT.$menuindex.'"'.($menuindex==$sItems[0] ? 'class="active"':'').'>'.$menuitem[0].'</a></li>'; }
            else if($menuitem[1] == $sItems[0])
            { $submenu .= '<li class="nav-item"><a class="nav-link '.($menuindex==$sItems[0] ? 'class="active"':'').' " href="'.SITE_ROOT.$menuindex.'>'.$menuitem[0].'</a></li>'; }

        }
        $menu.="</ul>";
        
        if($submenu != "")
            $submenu = '<ul class="navbar-nav">'.$submenu.'</ul>';
        
        return $menu;

    }

    public static function setPageTitlebyMenuItem($sItems) {
        return self::$menu[$sItems[0]][0];
    }

}

Menu::setMenu();
?>
