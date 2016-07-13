  $(document).ready(function () {
var produto_tipo_select;

         $('#produto_tipo_select').on('change', function () {

            produto_tipo_select = $(this).find('option:selected').attr("name");
        });

        $("#produto_cadastrar_enviar").click(function () {

            nome_produto = $("#produto_nome").val();
            tipo_produto = $("#produto_tipo").val();
            quantidade_produto = $("#produto_quantidade").val();        
            preco_produto = $("#preco_produto").val();

            if(validar_campos(nome_produto,tipo_produto,quantidade_produto,preco_produto,produto_tipo_select)){
        alert(produto_tipo_select);
                  $.ajax({
                                type: 'POST',
                                url: "app.view/sender.php",
                                data: {
                                    acao: "form",
                                    preco_produto: preco_produto,
                                    nome_produto: nome_produto,
                                    tipo_produto: tipo_produto,
                                    quantidade_produto: quantidade_produto,
                                    produto_tipo_select: produto_tipo_select
                                },
                                beforeSend: function () {

                                    OpenLoader(1);

                                },
                                success: function (data) {
                                    newAlert("info", data);

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
            }
        });

       
         $('.dropdown-toggle').dropdown();
    });

function validar_campos(nome_produto,tipo_produto,quantidade_produto,preco_produto,produto_tipo_select){
                

            if (nome_produto !== "") {
                if (tipo_produto !== "" || produto_tipo_select !== "") {
                    if (quantidade_produto !== "") {
                        if (preco_produto !== "") {
                          return true;
                        } else  {
                            newAlert("danger", "Campo preço em braco");
                            return false;
                        }
                    } else {
                        newAlert("danger", "Campo quantidade em braco");
                        return false;
                    }
                } else {
                    newAlert("danger", "Campo tipo em braco");
                    return false;

                }
            } else {
                newAlert("danger", "Campo nome em braco");
                return false;

            }



}