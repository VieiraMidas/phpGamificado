<?php
if (!isset($_SERVER["PATH_INFO"])) {
    require "login.php";
    exit();
}
switch ($_SERVER["PATH_INFO"]) {
    case "/usuarios":
        require "usuarios.php";
        break;
    case "/questoes":
        require "quiz.php";
        break;
    case "/alternativas";
        require "alternativas.php";
        break;
    default:
        echo "Error 404 - Seu PC vai explodir...e a página não foi encontrada.";
        break;
}
