<?php

include_once dirname(__DIR__) . '/config.php';

/**
 * Description of modelo
 *
 * @author carlos
 */
class modelo {

    //put your code here

    function __construct() {

        include_once BASEPATH . "/app.includes/app.ado/conector.class.php";
    }

    /**
     * Autentica no banco de dados 
     * @param type $user
     * @param type $senha
     * @return boolean
     * @result pega resultado do SELECT feito no banco
     */
    public function auth($user, $senha) {

        $conector = new conector();
        $result = $conector->select("sce_users", " login='{$user}' and senha='{$senha}'", "tipo");
        if ($result->num_rows !== 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Retorno os Produtos do banco
     * @return string
     */
    public function getProdutos() {
        $conector = new conector();
        $result = $conector->select("sce_produtos", " status=1");
        if($result)
        if ($result->num_rows !== 0) {
            return $result;
        } else {
            return "Nenhum produdo encontrado!";
        }
    }
    /**
     * pega produtos do banco por filtro
     * @param type $where
     * @return string
     */
    public function getFilterProdutos($where) {
        $conector = new conector();
        $result = $conector->select("sce_produtos", $where);

        if ($result->num_rows !== 0) {
            return $result;
        } else {
            return "Nenhum produdo encontrado!";
        }
    }
    /**
     * Insere {DADOS PRODUTOS} no banco
     * @param type $nome
     * @param type $tipo
     * @param type $quantidade
     * @return string
     */
    public function setProdutos($nome, $tipo, $quantidade, $preco) {

        //O INSERT QUE É FEITO NO NOSSO CONECTOR.
        //INSERT INTO `sce_produtos`(`nome`, `tipo`, `quantidade`) VALUES ($nome, $tipo, $quantidade)


        $conector = new conector();
        $table = "sce_produtos";

        $campos = "`nome`, `tipo`, `quantidade`,`preco`";
        $valores = "'{$nome}','{$tipo}','{$quantidade}', '{$preco}'";


        $result = $conector->insert($table, $campos, $valores);
        if ($result == true) {
            return "adicionado";
        } else {
            return "erro";
        }
    }

    public function getTipos() {
        $conector = new conector();
        $table = "`sce_produtos`";
        $where = " STATUS =1";
        $id = "tipo";

        $result = $conector->select($table, $where, $id);
        if($result)
         if ($result->num_rows !== 0) {
            return $result;
         } else {
            return "Nenhum produdo encontrado!";
         }
    }

}
