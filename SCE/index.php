<?php header("Access-Control-Allow-Origin: *"); ?>
<?php

//Este arquivo vai chamar o main do SCE

session_start();

include_once 'app.includes/main.class.php';

if (isset($_GET['logout'])) {

    $_SESSION['auth'] = "";
    header("location: index.php");
}
$main = new main();


if (isset($_POST['acao'])) {

    $acao = $_POST['acao'];


    if ($acao == "autenticar") {
        $user = $_POST['login'];
        $senha = $_POST['senha'];

        if ($main->auth($user, $senha)) {

            $_SESSION['auth'] = $user;

            $main->index();
            
          
            
        } else {
            $_SESSION['admin'] = $main->auth($user, $senha);
            $_SESSION['error'] = "001";

            header("location: index.php");
        }
    } else {
        return "false";
    }
}



if (isset($_SESSION['auth']) and $_SESSION['auth'] !== "") {


    $main->index();
} else {
    if (isset($_SESSION['error']) and $_SESSION['error'] == "001") {
        $main->login("erro");
    } else {
        $main->login();
    }
}




