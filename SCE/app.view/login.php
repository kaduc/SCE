<!DOCTYPE html>
<!--
SCE { SISTEMA DE CONTROLE DE ESTOQUE}
version 1.0
licenciado para: 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="main">
            <center>
                <div id="form_container">

                    <form id="frm_login" action="index.php" method="post" name="frm_login">
                        <input type="hidden" name="acao" value="autenticar" />


                        <legend>Efetuar login:</legend>
                        Login: <input class="input" type="text" name="login" id="login" />

                        <br />
                        <br />

                        Senha: <input class="input" type="password" name="senha" id="senha" /><br />  <br />


                        <button class="btn btn-primary" type="button" name="btn_login" id="btn_login">Entrar</button>


                    </form>

                </div>
                <br />
                <br />
                <div id="resultado">

                </div>

            </center>

        </div>
    </body>
</html>
