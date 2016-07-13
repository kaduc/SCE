<?php

/**
 * Description of loaders
 * Classe que chama as bibliotecas
 * BOOTSTRAP e JQUERY
 * @author carlos
 */

class loaders {

    /**
     * Le os diretorios dos CSS e os inclui no sistema.
     * faz autoLoad do CSS e Bootstrap
     */
    function loadCSS() {

        $dir_LIBS = BASEPATH . '/app.css/css.lib/';

        $files_LIB = scandir($dir_LIBS);


        foreach ($files_LIB as $file) {
            if (!($file == "." or $file == "..")) {

                echo '<link rel="stylesheet" href="' . BASEURL . "app.css/css.lib/" . $file . '">';
            }
        }

        $dir_CSS = BASEPATH . '/app.css/';

        $files_CSS = scandir($dir_CSS);

        foreach ($files_CSS as $file) {
            if (!($file == "." or $file == ".." or $file == "fonts" or $file == "css.lib")) {

                echo '<link rel="stylesheet" href="' . BASEURL . "app.css/" . $file . '">';
            }
        }
    }

    /**
     * Le os diretorios dos JS e os inclui no sistema.
     * faz autoLoad do JS e Jquery
     */
    function loadJS() {
        $dir_LIB = BASEPATH . '/app.js/js.lib/';

        $files_LIB = scandir($dir_LIB);


        foreach ($files_LIB as $file) {
            if (!($file == "." or $file == "..")) {

                echo '<script src="' . BASEURL . "app.js/js.lib/" . $file . '"></script>';
            }
        }
        $dir_js = BASEPATH . '/app.js/';

        $files_js = scandir($dir_js);


        foreach ($files_js as $file) {
            if (!($file == "." or $file == ".." or $file == "js.lib")) {

                echo '<script src="' . BASEURL . "app.js/" . $file . '"></script>';
            }
        }
    }

}
