
$(document).ready(function () {

  
    $("#btn_login").click(function () {

        user = $("#login").val();
        senha = $("#senha").val();
        if (user !== "") {
            if (senha !== "") {

                $("#frm_login").submit();
            } else {
                alert("Senha em braco");
            }
        } else {
            alert("User em braco");
        }

    });
    
     
});

