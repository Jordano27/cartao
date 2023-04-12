<?php
require ('verifica_login.php');
require('twig_carregar.php');

echo $twig->render('boasvindas.html',['user' => $_SESSION['nome'],
]);
?>

<a href="logaut.php">Sair</a>
<a href="novo_usuario_gravar.php">novo usuario</a>
