<?php include_once dirname(__DIR__) . "/../app.includes/config.php"; ?>
<?php include_once BASEPATH . "/app.includes/app.modelos/modelo.class.php";
header('Access-Control-Allow-Origin: http://10.96.205.212/SCE/index.php');

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
  
}else{
    return "error";
}
$modelo = new modelo(); 
$result = $modelo->getFilterProdutos("tipo='{$tipo}'"); ?>

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
                    </tbody>
                </table>
            </div>
