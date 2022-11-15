<?php
session_start();


require_once('./config/configuration.php');
require_once('./lib/AltoRouter.php');
require_once('./lib/color.php');

$router = new AltoRouter();

/*$router->map("GET", "/", "home", "home");
$router->map("GET|POST", "/login", "login", "login");
$router->map("GET", "/disconnect", "disconnect", "disconnect");*/


#$router->setBasePath('/~pXXXXXXX/'); Pour le serveur de l'iut;


if (array_key_exists('logged', $_SESSION) && $_SESSION['logged']){
    if ($_SESSION['logged'] === 'etu'){


        ##Routes pour les étudiants
        $router->map("GET", "/", "homeEtu", "home");
        $router->map("GET", "/modules", "moduleEtu", "module");
        $router->map("GET", "/modules/detail-[:ue]", "moduleEtuDetail", "moduleDetail");

        ##Définition des élements dans le menu
        $menu = [
            [ 'href' => $router->generate("module"), 'name' => "Mes Modules" ]
        ];
    } else if ($_SESSION['logged'] === 'prof'){
        ##Routes pour les professeurs
        $router->map("GET", "/", "homeProf", "home");
        //Définition du contenu de la sideBar
        $menu = [
            [ 'href' => "", 'name' => "Contact" ]
        ];
    } else if ($_SESSION['logged'] === 'admin'){
        ##Routes pour les admins
        $router->map("GET", "/", "homeAdmin", "home");
    }
    ##Route test home (temporaire)
    

    ##Route de deconnection
    $router->map("GET", "/disconnect", "disconnect", "disconnect");
} else {
    $router->map("GET|POST", "/", "login", "home");
}

$match = $router->match();
if ($match){
    require_once (PATH_CONTROLLERS.$match['target'].'.php');
} else {
    echo '404'; #A modifier
}
