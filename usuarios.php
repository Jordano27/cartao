<?php

require('verifica_login.php');
require('twig_carregar.php');


require('models/Model.php');
require('models/Usuario.php');


$usr = new Aluno();
$aluno= $usr->get();

echo $_SESSION['nome'];
echo $twig->render('usuarios.html', ['usuarios' => $aluno]);



