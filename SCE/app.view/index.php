<script>

    $(document).ready(function () {
        $("#produto_cadastrar").click(function () {

            call_func(this.id);
        });
        $("#produto_editar").click(function () {

            call_func(this.id);
        });
        $("#produto_deletar").click(function () {

            call_func(this.id);
        });

        $("#inicio_").click(function () {
            console.log('reload SCE');
            location.reload();
        });


        $('#tipo').on('change', function () {

            tipo = $(this).find('option:selected').attr("name");
            if(tipo !== "")
            $.ajax({
                type: 'POST',
                url: "app.view/funcoes/produto_list.php",
                data: {
                    tipo: tipo
                },
                beforeSend: function () {

                    OpenLoader(1);

                },
                success: function (data) {
                    //newAlert("info", data);
                    $("#corpo_painel").empty();
                    $("#corpo_painel").html(data);

                },
                error: function (xhr) { // if error occured
                    newAlert("danger", xhr);

                },
                complete: function () {
                    OpenLoader(0);
                    OpenLoader(0);

                },
                dataType: 'html'
            });

        });





    });
    function call_func(id) {

        $.get("app.view/funcoes/" + id + ".php", function (data) {
            $("#container-dashboard").html(data);

        });

        console.log("CARREGAR: " + id);
    }
    function OpenLoader(close) {
        if (close === 1) {
            BootstrapDialog.show({
                title: "Carrengando...",
                message: "<center> <img src='app.src/ajax-loader.gif'> </center>"
            });

        } else {

            BootstrapDialog.closeAll();

        }

    }
    function newAlert(type, message) {

        $("#alerts").css("display", "block");

        $("#alerts").empty();

        $("#alerts").append($("<div class='alert alert-" + type + " fade in' data-alert><p> " + message + " </p></div>"));

        $("#alerts").delay(2500).fadeOut("slow", function () {
            $(this).css("display", "none");
        });
        console.log("ALERT: " + message);

    }
</script>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">SCE</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SCE</a>
        </div>


        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a id="inicio_" href="#">Inicio</a></li>
                <li><a href="#">Estoque Atual</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produto <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a id="produto_cadastrar" href="#"><span class="glyphicon glyphicon-plus-sign"></span> Cadastrar</a></li>
                        <li><a id="produto_editar" href="#"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                        <li><a id="produto_deletar" href="#"><span class="glyphicon glyphicon-minus-sign"></span> Excluir</a></li>

                    </ul>
                </li>
                <li><a href="#">OC (Ordem de Compra)</a></li> 
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?logout="><span class="glyphicon glyphicon-user"></span> Sair [<?php echo $_SESSION['auth']; ?>] </a></li>

            </ul>	

        </div>
    </div>
</nav>
<div id="alerts"></div>

<?php include_once BASEPATH . "/app.includes/app.modelos/modelo.class.php"; ?>

<?php $modelo = new modelo(); ?>

<div id="container-dashboard">

    <div class="panel panel-primary">
        <div class="panel-heading">
            Seus Produtos
            <div class="text-right">
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

                Separar por: <select id="tipo" class="input-sm" style="color: #000000;">

                    <?php foreach ($tipos_array as $valor): ?>

                        <option name="<?php echo $valor; ?>" style="color: #000000;"><?php echo $valor ?> </option>

                    <?php endforeach; 

                }else{

                    echo "Não foram encontrado tipos";
                    }?>
                </select>
            </div>
        </div>

        <div id="corpo_painel" class="panel-body">

            <?php $result = $modelo->getProdutos(); ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($result): ?>
                        <?php if($result !== "Nenhum produdo encontrado!"): ?>
                        <?php foreach ($result as $value): ?>

                            <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['nome'] ?></td>
                                <td><?php
                                    if ($value['quantidade'] < 5) {
                                        echo "<a class='text-danger'>{$value['quantidade']}</a>";
                                    } elseif ($value['quantidade'] < 20) {

                                        echo "<a class='text-alert'>{$value['quantidade']}</a>";
                                    } else {
                                        echo "<a class='text-success'>{$value['quantidade']}</a>";
                                    }
                                    ?>

                                </td>
                                <td>R$ <?php echo $value['preco'] ?></td>
                            </tr>

                        <?php endforeach; ?>
                    <?php endif; ?>
                 <?php endif; ?>
   
                    </tbody>
                </table>
            </div>

        </div>
        <div class="panel-footer">
            SCE - Version: <?php echo SYS_VERSION; ?>
        </div>
    </div>

</div>
<script>
    $(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>
