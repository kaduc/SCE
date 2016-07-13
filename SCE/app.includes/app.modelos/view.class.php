<?php

include_once dirname(__DIR__) . '/config.php';

/**
 * Description of view
 * classe responsavel pelo front-end do sistema
 * @author carlos
 */
class view {

    function __construct() {

        include_once BASEPATH . "/app.view/head.php";
    }
    /**
     * INDEX()
     * Abre a página principal
     */
    function index() {


        include_once BASEPATH . '/app.view/index.php';
        include_once BASEPATH . '/app.view/footer.php';
    }
    /**
     * Verifica se ja foi realizado tentativa de acesso
     * se sim inclui login_erro se não abre tela de login normal
     * @param type $erro
     */
    function login($erro = NULL) {
        if ($erro !== NULL) {
            include_once BASEPATH . '/app.view/login_erro.php';
            $_SESSION['error'] = 0;
        } else {
            include_once BASEPATH . '/app.view/login.php';
        }
    }

}
