<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <?php
    include_once dirname(__DIR__) . '/app.includes/config.php';

    include_once "loaders.class.php";

    $load = new loaders();



    $load->loadJS();
    $load->loadCSS();
    ?>
    <body>