<?php

/**
 * Description of main
 *
 * @author carlos
 */
class main {

    function __construct() {

        include_once 'app.ado/conector.class.php';
        include_once 'app.modelos/view.class.php';
        include_once 'app.modelos/modelo.class.php';
    }

    /**
     * Chama a view para a página principal
     * view::index()
     */
    public function index() {

        $view = new view();
        $view->index();
    }

    /**
     * 
     * @param type $erro
     * verifica se ja foi realizado a tentativa de conexao e repassa para a view
     * view::login()
     */
    public function login($erro = NULL) {

        $view = new view();
        if ($erro !== NULL) {
            $view->login("erro");
        } else {
            $view->login();
        }
    }

    /**
     * 
     * @param type $user
     * @param type $senha
     * @return type
     * Autenticado MAIN realiza solicitação de autenticação para modelo::auth()
     * 
     */
    public function auth($user, $senha) {

        $modelo = new modelo();
        return $modelo->auth($user, $senha);
    }

}
