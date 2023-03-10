<?php
if ($_SERVER['REQUEST_METHOD'] === "POST" && array_key_exists('login', $_POST) && array_key_exists('pswd', $_POST)){
    require_once (PATH_MODELS.'LoginDAO.php');
    $logDAO = new LoginDAO(true);
    $log = $logDAO->verifyUser($_POST['login'], $_POST['pswd']);
    if ($log){
        $_SESSION = array_merge($_SESSION, $log);

        if (isset($router)){
            header('Location: '.$router->generate('accueil'));
        } else {
            header('Location: ./');
        }
    } else {
        $error = "Identifiant ou mot de passe incorrect";
    }
}
    require_once(PATH_VIEWS.'PageConnexion.php');
?>