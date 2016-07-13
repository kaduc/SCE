<?php

include_once dirname(__DIR__) . '/app.includes/config.php';

if (isset($_POST['acao'])) {
    
    if (!(empty($_POST['nome_produto']) and empty($_POST['tipo_produto']) and empty($_POST['quantidade_produto']) and empty($_POST['preco_produto']) and empty($_POST['produto_tipo_select']))) {
        
        include_once BASEPATH . "/app.includes/app.modelos/modelo.class.php";

  $produto_tipo_select = ""; 
  $nome_produto = "";
  $quantidade_produto = "";
  $preco_produto = "";
  $tipo_produto = "";


        if(isset($_POST['nome_produto'])) $nome_produto = $_POST['nome_produto'];
        if(isset($_POST['tipo_produto'])) $tipo_produto = $_POST['tipo_produto'];
        if(isset($_POST['quantidade_produto'])) $quantidade_produto = $_POST['quantidade_produto'];
        if(isset($_POST['preco_produto'])) $preco_produto = $_POST['preco_produto'];
        if(isset($_POST['produto_tipo_select'])) $produto_tipo_select = $_POST['produto_tipo_select'];

        if($produto_tipo_select !== "" and $tipo_produto !== ""){
          
             echo "Selecione o Tipo ou digite, não os dois!";

        }else{
            if($produto_tipo_select == ""){
                $tipo = $tipo_produto;
            }else{
                $tipo = $produto_tipo_select;
            } 


        $modelo = new modelo();
        $result = $modelo->setProdutos($nome_produto, $tipo, $quantidade_produto, $preco_produto);
        
        if($result == "adicionado"){
            echo "O produto foi adicionado ao catálogo";
        }else{
            echo "Ops!, Não foi possivel adicionar.";
            
        }
    }
}
    
} else {
    return "opcao invalida";
}