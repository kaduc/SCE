<?php include_once dirname(__DIR__) . "/../app.includes/config.php"; ?>
<?php include_once BASEPATH . "/app.includes/app.modelos/modelo.class.php"; ?>
<script type="text/javascript" src="app.js/funcoes_sce.js"></script>

<div class="panel panel-primary">
    <div class="panel-heading">
        Cadastro de produtos
    </div>
    <div class="panel-body">

        <form id="form_cadastrar_produto" class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-1 control-label">Nome:</label>
                <div class="col-sm-3">
                    <input id="produto_nome" class="form-control" id="focusedInput" type="text" placeholder="ex: computador, mouse , teclado ..." required>
                </div>
                <br />
                <br />
                <label class="col-sm-1 control-label">Tipo:</label>
                <div class="col-sm-3">
                    <?php $modelo = new modelo(); ?>
                     <?php $tipos = $modelo->getTipos(); ?>

                <?php
                if($tipos !== "Nenhum produdo encontrado!")
                if($tipos){
                $tipos_array[] = "";

                foreach ($tipos as $valor) {

                    $tipos_array[] = $valor['tipo'];
                }

                $tipos_array = array_unique($tipos_array);
                ?>

                <select id="produto_tipo_select" class="input form-control" style="color: #000000;">

                    <?php foreach ($tipos_array as $valor): ?>

                        <option name="<?php echo $valor; ?>" style="color: #000000;"><?php echo $valor ?> </option>

                    <?php endforeach; 

                }else{

                    echo "Não foram encontrado tipos";
                    }?>
                </select>

                    <input id="produto_tipo" class="form-control" id="focusedInput" type="text" placeholder="Digite aqui para criar um tipo.">         
                   

                </div>
                <br />
                <br />
                <label class="col-sm-1 control-label">Quantidade:</label>
                <div class="col-sm-3">
                    <input id="produto_quantidade" class="form-control" id="focusedInput" type="number" placeholder="ex: 1, 100 ..." required>
                </div>
                <br />
                <br />
                <label class="col-sm-1 control-label">Preço:</label>
                <div class="col-sm-3">
                    <input id="preco_produto" class="form-control" id="focusedInput" type="number" placeholder="ex: 10, 100 ,19.50. não use (R$)" required>
                </div>
                <br />
                <br />
                <div class="col-sm-3 control-label">
                    <button id="produto_cadastrar_enviar" class="btn btn-success"> Criar Produto</button>
                    <button id="close" class="btn btn-default" onclick="location.reload();"> Cancelar </button>
                </div>
            </div>


        </form>


    </div>
    <div class="panel-footer">
        SCE - Version: <?php echo SYS_VERSION; ?>
    </div>
</div>
